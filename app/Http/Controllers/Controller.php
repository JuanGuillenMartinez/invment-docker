<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Estos métodos nos sirven para retornar las respuestas HTTP

    /**
     * Make a successfully response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message = 'Request successfully completed', $code = 200)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }


    /**
     * Return a error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($errorMessage = 'An error has occurred', $code = 202)
    {
    	$response = [
            'success' => false,
            'data' => [
                'error' => $errorMessage
            ],
        ];

        return response()->json($response, $code);
    }
    
}
