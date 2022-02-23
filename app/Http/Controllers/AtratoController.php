<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AtratoController extends Controller
{
    public function receive(Request $request)
    {
        Log::info($request->all()['event_data']['status']);
        return response()->json([
            'respuesta' => 'El usuario se consulto correctamente',
            'petición' => $request->all()
        ], 200);
    }
}
