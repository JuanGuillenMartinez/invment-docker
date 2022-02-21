<?php

namespace App\Traits;

/**
 * Fill the model with the array received
 *
 * @param  Array  $arrayRequest
 * @param  Model  $model
 * @return \Illuminate\Database\Eloquent\Model
 */
trait HandlerJsonResponse
{
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
            'message' => $message,
            'data'    => $result,
        ];

        return response()->json($response, $code);
    }


    /**
     * Return a error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($errorMessage = 'An error has occurred', $code = 202, $errors = [])
    {
        $response = [
            'success' => false,
            'message' => $errorMessage,
            'data' => [
                'errors' => $errors
            ],
        ];

        return response()->json($response, $code);
    }
}
