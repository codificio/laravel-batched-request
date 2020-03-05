<?php

namespace Codificio\BatchedRequest;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HandleBatchedRequest extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(Request $request)
    {
        $batch = $request->get('batch', []);
        $batchedRequest = new BatchedRequest($batch, $request);
        $batchedRequest->execute();
        return $batchedRequest->getResponses();
    }

}
