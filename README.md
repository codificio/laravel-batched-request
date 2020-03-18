This package is based on https://github.com/dvanderburg/lumen-batched-request.

## Middleware

In addition to that package, there is also a middleware which override the base `ThrottleRequests` middleware.
It is used to avoid API rate limit for the requests inside the batch.

Replace the default middleware:

``` php
Illuminate\Routing\Middleware\ThrottleRequests
``` 

with:

``` php
Codificio\BatchedRequest\ThrottleRequests
``` 

in the `app\Http\Kernel.php` file.