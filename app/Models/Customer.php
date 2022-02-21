<?php

namespace App\Models;

use App\Traits\FillModelWithRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, FillModelWithRequest;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'address',
        'email',
        'created_at',
        'updated_at',
    ];

    protected $updatable = [
        'name',
        'first_name',
        'last_name',
        'address',
        'email'
    ];

    public function borrows() {
        return $this->hasMany(Borrow::class);
    }
}
