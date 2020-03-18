This package is based on https://github.com/dvanderburg/lumen-batched-request.

## Middleware

In addition to that package, there is also a middleware which override the base `ThrottleRequests` middleware.
It is used to avoid API rate limit for the requests inside the batch.

Replace the default middleware into the `$routeMiddleware` variable, inside the file `app\Http\Kernel.php`:

``` php
'throttle' => \Codificio\BatchedRequest\ThrottleRequests::class,
```