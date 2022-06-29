<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\recipients;

class recipientsController extends Controller
{
     public function Add(Request $request)
    {
        $add= new recipients;
        $add->name=$request->name;
        $add->email=$request->email;
        $result=$add->save();
        if ($result) {
            
            return["result"=>"saved"];
        }else
        {
            return["result"=>"somthing wrong"];
        }

    }
     public function show(Request $request)
    {
         $add=recipients::all();
         return["result"=>$add];

    }

     public function delete($id)
    {
        $add=recipients::find($id);
        $result=$add->delete();
        if ($result) {
            
            return["result"=>"delete permanaty"];
        }else
        {
            return["result"=>"not any opration accur"];
        }   

    }

    public function update(Request $request,$id)
    {
        $add=recipients::find($id);
        $add->name=$request->name;
        $add->email=$request->email;
        $result=$add->save();
        if ($result) {
            
            return["result"=>"update the value permanaty"];
        }else
        {
            return["result"=>"somthing wrong"];
        }


    }
    
}
  