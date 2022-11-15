<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Task extends Model
{
    protected $table = "task";

    public static function joinuser(){
        $taskjoin = DB::table('user_ngo');
        $taskjoin->rightJoin('task','task.get_user_id','=','user_ngo.id');
        $taskjoin->select(['*','user_ngo.id as user_id']);
        return $taskjoin->get();
    }

    protected $fillable = [
        'title',
        'contact',
        'address_1',
        'address_2',
        'city',
        'zip', 
        'no_of_volunteer',
        'task_desc',
        'st_date',
        'ed_date',
        'image',
    ];
    use HasFactory;
}
