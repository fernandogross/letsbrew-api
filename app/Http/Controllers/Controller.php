<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function httpErrorResponse($error = null, $message = null, $status = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        if (!empty($error)) {
            Log::error($error);
        }

        $message = $message ?: lang_by_key('common.errorOperation');
        return Response()->json(['success' => false, 'message' => $message])
            ->setStatusCode(
                $status,
                Response::$statusTexts[$status]
            );
    }

    public static function httpResponse($data = null, $status = Response::HTTP_OK)
    {
        return Response()->json(['success' => true, 'data' => $data])
            ->setStatusCode(
                $status,
                Response::$statusTexts[$status]
            );
    }
}
