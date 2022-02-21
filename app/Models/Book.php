<?php

namespace App\Models;

use App\Traits\FillModelWithRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, FillModelWithRequest;

    protected $fillable = [
        'title',
        'description',
        'author',
        'quantity',
        'price',
        'created_at',
        'updated_at'
    ];

    protected $updatable = [
        'title',
        'description',
        'author',
        'quantity',
        'price'
    ];
}
