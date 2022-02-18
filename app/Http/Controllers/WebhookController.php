<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('Esta es una nueva entrada de webhook');
        Log::info('Este es el sha256 generado por el webhook de git');
        Log::info($request->headers->get('x-hub-signature-256'));
        Log::info('Este es el sha256 generado por mi');
        Log::info(hash_hmac('sha256', $request->getContent(), 'hola'));
        // $customer = new Customer(array('name' => 'test', 'first_name' => 'John', 'last_name' => 'test', 'email' => 'test@example.com', 'address' => 'test'));
        // $customer->save();
    }
}
