<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_name',
        'amount',
        'address1',
        'state',
        'city',
        'customer_id'
    ];
    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }
}
