<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngo extends Model
{
    protected $table = "ngo";
    protected $fillable = [
    'organization_name',
    'address_1',
    'address_2',
    'city',
    'region',
    'postal_code', 
    'country',
    'phone',
    'mission_statement',
    'organizational_description',
    'intrest',
    'image',    
    ];
    use HasFactory;
}
