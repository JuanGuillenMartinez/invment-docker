<?php

namespace App\Http\Controllers;

use App\Http\Requests\Borrow\BorrowRequest;
use App\Models\Borrow;
use App\Http\Resources\Borrow\BorrowResource;

class BorrowController extends Controller
{
    protected $model = Borrow::class;
    protected $modelResource = BorrowResource::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fetchAllRecords();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowRequest $request)
    {
        $properties = $request->all();
        return $this->saveRecord($properties);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
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
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Int $id, BorrowRequest $request)
    {
        $properties = $request->all();
        return $this->updateRecord($id, $properties);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        return $this->deleteRecordById($id);
    }
}
