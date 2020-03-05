<?php

namespace Codificio\BatchedRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

use Codificio\BatchedRequest\BatchedRequest;

class BatchedRequestServiceProvider extends ServiceProvider
{

    /**
     * Attaches the route "batch" to handle batched requests
     * Any HTTP POST requests to /batch will execute as a batched request
     * @return null
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

}
