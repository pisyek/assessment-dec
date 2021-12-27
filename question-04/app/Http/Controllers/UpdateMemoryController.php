<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMemoryRequest;
use Illuminate\Support\Facades\Http;

class UpdateMemoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateMemoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(UpdateMemoryRequest $request)
    {
        $memory_limit = (int) $request->get('memory_limit');
        $url = config('go.url') . '/update-memory-limit';
        try {
            $response = Http::asForm()->post($url, compact('memory_limit'));

            return response()->json(
                [
                    'message' => $response->successful() ?
                        'Memory limit has been updated successfully.' : 'Unable to update memory limit.'
                ],
                $response->status()
            );
        } catch (\Exception $exception) {
            // todo: log $exception->getMessage()
            return response()->json(
                [
                    'message' => 'Unable to process the request.'
                ],
                500
            );
        }
    }
}
