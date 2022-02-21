<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $model = Book::class;
    protected $modelResource = BookResource::class;

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
    public function store(BookRequest $request)
    {
        $properties = $request->all();
        return $this->saveRecord($properties);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
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
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Int $id, BookRequest $request)
    {
        $properties = $request->all();
        return $this->updateRecord($id, $properties);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        return $this->deleteRecordById($id);
    }
}
