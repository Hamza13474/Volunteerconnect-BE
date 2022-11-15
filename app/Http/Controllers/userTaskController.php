<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userTask;


class userTaskController extends Controller
{
    public function store(Request $request)
    {  
        $userTask = new userTask;
        $userTask->user_id = $request->user_id;
        $userTask->task_id = $request->task_id;
        $userTask->save();
        return response()->json([
            'status' => 200,
            'response' =>'Successfully applied as a volunteer',
        ]);
    }
    public function index($id)
    {
       $userTask = userTask::where('user_id',$id)->get();
        return response()->json([
        'status' => 200,
        'Task' => $userTask,
    ]);
    }
}
