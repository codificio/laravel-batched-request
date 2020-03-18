<?php

namespace Codificio\BatchedRequest;

use Illuminate\Routing\Middleware\ThrottleRequests as ParentMiddleware;

class ThrottleRequests extends ParentMiddleware
{
    /**
     * @inheritDoc
     */
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        $key = $prefix.$this->resolveRequestSignature($request);

        $maxAttempts = $this->resolveMaxAttempts($request, $maxAttempts);

        if (!BatchedRequest::isInternalRequest($request)) {
            if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
                throw $this->buildException($key, $maxAttempts);
            }

            $this->limiter->hit($key, $decayMinutes * 60);
        }

        $response = $next($request);

        return $this->addHeaders(
            $response, $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts)
        );
    }
}