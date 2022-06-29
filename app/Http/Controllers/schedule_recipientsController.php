<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule_recipients;
class schedule_recipientsController extends Controller
{
     public function show(){

        $add=schedule_recipients::all();
         return["result"=>$add];
    }
    
     public function Add(Request $request)
    {
        $add= new schedule_recipients;
        $add->schedule_notes_id=$request->schedule_notes_id;
        $add->recipients_id=$request->recipients_id;
        $result=$add->save();
        if ($result) {
            
            return["result"=>"saved"];
        }else
        {
            return["result"=>"somthing wrong"];
        }

    }
    public function update(Request $request,$id)
    {
        $add=schedule_recipients::find($id);
        $add->schedule_notes_id=$request->schedule_notes_id;
        $add->recipients_id=$request->recipients_id;
        $result=$add->save();
        if ($result){
            
            return["result"=>"update the value permanaty"];
        }else
        {
            return["result"=>"somthing wrong"];
        }


    }
     public function delete($id)
    {
        $add=schedule_recipients::find($id);
        $result=$add->delete();
        if ($result) {
            
            return["result"=>"delete permanaty"];
        }else
        {
            return["result"=>"not any opration accur"];
        }   

    }
}
 