<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function EditProfile($id){
        $userInfo=User::find($id);


    if($userInfo){
        return response()->json([
            'status'=>"200",
            'data'=>$userInfo,

        ]);
    }

    else{
        return response()->json([
            'status'=>"400"
        ]);
    }
    }

    public function updateProfile(Request $request,$id){

        $update = User::UpdateProfile($request,$id);

        $requestData = $request->all();

        // return response()->json([
        //     'status'=>"200",
        //      'update'=>$requestData
        //  ]);

        if($update){
            return response()->json([
               'status'=>"200",
                'update'=>$update
            ]);
        }
        else{
            return response()->json([
                'status'=>"400"
            ]);
        }
    }
}
