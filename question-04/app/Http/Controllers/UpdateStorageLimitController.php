<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStorageLimitRequest;
use Illuminate\Support\Facades\Http;

class UpdateStorageLimitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdateStorageLimitRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(UpdateStorageLimitRequest $request)
    {
        $storage_limit = (int) $request->get('storage_limit');
        $url = config('go.url') . '/update-memory-limit';
        try {
            $response = Http::asForm()->post($url, compact('storage_limit'));

            return response()->json(
                [
                    'message' => $response->successful() ?
                        'Storage limit has been updated successfully.' : 'Unable to update storage limit.'
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
