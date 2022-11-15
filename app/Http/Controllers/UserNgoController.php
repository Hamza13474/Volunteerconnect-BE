<?php

namespace App\Http\Controllers;

use App\Models\UserNgo;
use Illuminate\Http\Request;
use Validator;
use DB;

class UserNgoController extends Controller
{
    public function index()
    {
       $ngo = UserNgo::orderBy('id', 'DESC')->get();
        return response()->json([
        'status' => 200,
        'User' => $ngo,
    ]);
    }

    public function store(Request $request)
    {  
        $user = new UserNgo;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->save();
        return response()->json([
            'status' => 200,
            'Role' => $user->role,
            'message' => 'User Added Successfully'
        ]);
    }

    public function edit($id)
    {
        $user = DB::table('user_ngo')->where('id', $id)->first();
        if($user){
        return response()->json([
            'status' => 200,
            'User' => $user,
        ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Page Not Found',
            ]);
        }
    }
    public function login(Request $request){
        $user_login = UserNgo::where('email',$request->email)->where('password',$request->password)->first();
        if($user_login){
        return response()->json([
            'status' => 200,
            'user_id' => $user_login->id,
            'user_role' => $user_login->role, 
            'user_name' => $user_login->name,   
            'message' => 'login successfully'
        ]);
    }
    return response()->json([
        'status' => 300,
        'message' => 'not SUccess'
    ]);
    }

    public function update(Request $request, $id)
    {
        $user = UserNgo::where('id', $id)->limit(1);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->update(
            [
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'password' => $user->password,
            ]
        );
        return response()->json([
            'status' => 200,
            'message' => 'User Updated Successfully',
        ]);      
    }

    public function destroy($id)
    {
        $user = DB::table('user_ngo')->where('id', $id);
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'NGO Deleted Successfully'
        ]);
    }
}
