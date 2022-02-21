<?php

namespace App\Models;

use App\Traits\FillModelWithRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory, FillModelWithRequest;

    protected $fillable = [
        'customer_id',
        'price',
        'discount',
        'final_price',
        'created_at',
        'updated_at'
    ];

    protected $updatable = [
        'customer_id',
        'price',
        'discount',
        'final_price'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
