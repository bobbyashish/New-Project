<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'item_name',
        'item_price',
        'item_detail',
        'warranty_period'
    ];
    

}
