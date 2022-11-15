<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNgo extends Model
{
    protected $table = "user_ngo";
    protected $fillable = [
        'name',
        'email',
        'role',
        'password'
    ];
    use HasFactory;
}
