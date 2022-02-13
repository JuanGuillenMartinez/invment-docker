<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Resources\Customer\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = CustomerResource::collection(Customer::all());
        return ($customers) ? $this->sendResponse($customers) : $this->sendError();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = [
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'email' => $request->email,
        ];
        $customer = new Customer($attributes);
        return ($customer->save($attributes)) ? $this->sendResponse(new CustomerResource($customer)) : $this->sendError();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = new CustomerResource(Customer::find($id));
        return ($customer) ? $this->sendResponse($customer) : $this->sendError();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        //
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        return ($customer->save()) ? $this->sendResponse(new CustomerResource($customer)) : $this->sendError();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        return ($customer->delete()) ? $this->sendResponse('Eliminado correctamente') : $this->sendError();
    }
}
