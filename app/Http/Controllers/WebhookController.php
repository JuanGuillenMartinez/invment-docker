<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info($request);
        $customer = new Customer(array('name' => 'test', 'first_name' => 'John', 'last_name' => 'test', 'email' => 'test@example.com', 'address' => 'test'));
        $customer->save();
    }
}
