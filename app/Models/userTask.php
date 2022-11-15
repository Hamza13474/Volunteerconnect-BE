<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTask extends Model
{
    protected $table = "user_task";
    protected $fillable = [
    'user_id',
    'task_id',
    ];
    use HasFactory;
}
