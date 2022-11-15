<?php

namespace App\Http\Controllers;

use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;

class NgoController extends Controller
{
    public function index()
    {
       $ngo = Ngo::orderBy('id', 'DESC')->get();
        return response()->json([
        'status' => 200,
        'Ngo' => $ngo,
    ]);
    }

    public function ngo_detail($id)
    {
       $ngo = DB::table('ngo')->where('id',$id)->first();
        return response()->json([
        'status' => 2020,
        'Ngo' => $ngo,
    ]);
    }
    public function store(Request $request)
    {  
        $ngo = new Ngo;
        $ngo->organization_name = $request->organization_name;
        $ngo->address_1 = $request->address_1;
        $ngo->address_2 = $request->address_2;
        $ngo->city = $request->city;
        $ngo->region = $request->region;
        $ngo->postal_code = $request->postal_code;
        $ngo->country = $request->country;
        $ngo->phone = $request->phone;
        $ngo->mission_statement = $request->mission_statement;
        $ngo->organizational_description = $request->organizational_description;
        if($request->file('image')){
            $image = $request->file('image'); $image->storeas('public/ngoImage/',$image->getClientOriginalName());
            $image = $_FILES['image']['name']; 
        }else{ 
            $image = NULL;
        };
        $ngo->image = $image;

        $ngo->save();

        // $ngo = Ngo::create([
        //     'organization_name' => $request->organization_name,
        //     'address_1' => $request->address_1,
        //     'address_2' => $request->address_2,
        //     'city' =>  $request->city,
        //     'region' => $request->region,
        //     'postal_code' => $request->postal_code,
        //     'country' => $request->country,
        //     'phone' => $request->phone,
        //     'mission_statement' => $request->mission_statement,
        //     'organizational_description' => $request->organizational_description,
        //     'image' => $image,
        // ]);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit($id)
    {
        $ngo = DB::table('ngo')->where('id', $id)->first();
        if($ngo){
        return response()->json([
            'status' => 200,
            'Ngo' => $ngo,
        ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Page Not Found',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $npo = Ngo::where('vid', $id)->limit(1);
        $ngo->organization_name = $request->organization_name;
        $ngo->address_1 = $request->address_1;
        $ngo->address_2 = $request->address_2;
        $ngo->city = $request->city;
        $ngo->region = $request->region;
        $ngo->postal_code = $request->postal_code;
        $ngo->country = $request->country;
        $ngo->phone = $request->phone;
        $ngo->mission_statement = $request->mission_statement;
        $ngo->organizational_description =$request->organizational_description;
        // $ngo->intrest = $request->intrest;
        $ngo->image = $request->image;
        $ngo->update(
            [
                'organization_name' => $ngo->organization_name,
                'address_1' => $ngo->address_1,
                'address_2' => $ngo->address_2,
                'city' => $ngo->city,
                'region' => $ngo->region,
                'postal_code' => $ngo->postal_code,
                'country' => $ngo->country,
                'phone' => $ngo->phone,
                'mission_statement' => $ngo->mission_statement,
                'organizational_description' => $ngo->organizational_description,
                // 'intrest' => $intrest,
                'image' => $image,
            ]
        );
        return response()->json([
            'status' => 200,
            'message' => 'NGO Updated Successfully',
        ]);      
    }

    public function destroy($id)
    {
        $ngo = DB::table('ngo')->where('id', $id);
        $ngo->delete();
        return response()->json([
            'status' => 200,
            'message' => 'NGO Deleted Successfully'
        ]);
    }

}
