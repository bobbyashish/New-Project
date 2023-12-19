<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'address1',
    'address2',
    'city',
    'state',
    'country',
    'pincode',
    'type',
    'terms_accepted'
   ];
}
