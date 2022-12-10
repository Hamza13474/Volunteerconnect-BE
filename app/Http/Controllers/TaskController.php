<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  
    public function index()
    {
       $task = Task::joinuser();
        return response()->json([
        'status' => 200,
        'Task' => $task,
    ]);
    }
    public function task_detail($id)
    {
        $task = DB::table('task')->where('id',$id)->first();
        // $taskdetails = $task->($task,'task.get_user_id','=','user_ngo.id');
        // $taskdetails->select(['*','user_ngo.id as user_id']); 
        $taskdetails = DB::table('user_ngo')->where('id',$task->get_user_id)->get();
        return response()->json([
        'status' => 2020,
        'Task' => $task,
        'task_details' => $taskdetails, 
    ]);
    }
    public function apply_as_volunteer()
    {
        $task = DB::table('task')->where('id',$id)->first();
        // $taskdetails = $task->($task,'task.get_user_id','=','user_ngo.id');
        // $taskdetails->select(['*','user_ngo.id as user_id']); 
        $taskdetails = DB::table('user_ngo')->where('id',$task->get_user_id)->get();
        return response()->json([
        'status' => 2020,
        'Task' => $task,
        'task_details' => $taskdetails, 
    ]);
    }

    public function store(Request $request)
    {  
        $task = new Task;
        $task->title = $request->title;
        $task->contact = $request->contact;
        $task->address_1 = $request->address_1;
        $task->address_2 = $request->address_2;
        $task->city = $request->city;
        $task->zip = $request->zip;
        $task->no_of_volunteer = $request->no_of_volunteer;
        $task->task_desc = $request->task_desc;
        $task->st_date = $request->st_date;
        $task->ed_date = $request->ed_date;
        $task->get_user_id = $request->user_id;
        $task->thearticle = $request->thearticle;
        
        if($request->file('image')){
            $image = $request->file('image'); $image->storeas('public/ngoImage/',$image->getClientOriginalName());
            $image = $_FILES['image']['name']; 
        }else{ $image = NULL;}
        $task->image = $image;
        $task->save();
        return response()->json([
            'status' => 200,
            'Task' => $task->id,
            'message' => 'Task Added Successfully'
        ]);
    }

}
