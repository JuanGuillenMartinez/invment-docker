<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Resources\Customer\CustomerResource;

class CustomerController extends Controller
{

    protected $model = Customer::class;
    protected $modelResource = CustomerResource::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fetchAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $requestProperties = $request->all();
        return $this->saveRecord($requestProperties);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        return $this->fetchRecordById($id);
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
        if ($customer) {
            $customer->fillModel($request->all());
            return ($customer->save()) ? $this->sendResponse(new CustomerResource($customer)) : $this->sendError('Un error ocurrió mientras se guardaba');
        }
        return $this->sendError("El cliente no existe");
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
