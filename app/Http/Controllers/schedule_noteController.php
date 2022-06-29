<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule_notes;
class schedule_noteController extends Controller
{
    public function show(){

        $add=schedule_notes::all();
         return["result"=>$add];
    }

    public function Add(Request $request)
    {
        $add= new schedule_notes;
        $add->notes_id=$request->notes_id;
        $add->access_code=$request->access_code;
        $add->is_scheduled=$request->is_scheduled;
        $add->scheduled_at=$request->scheduled_at;
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
        $add=schedule_notes::find($id);
        $add->notes_id=$request->notes_id;
        $add->access_code=$request->access_code;
        $add->is_scheduled=$request->is_scheduled;
        $add->scheduled_at=$request->scheduled_at;
        $result=$add->save();
        if ($result) {
            
            return["result"=>"update the value permanaty"];
        }else
        {
            return["result"=>"somthing wrong"];
        }


    }
    public function delete($id)
    {
        $add=schedule_notes::find($id);
        $result=$add->delete();
        if ($result) {
            
            return["result"=>"delete permanaty"];
        }else
        {
            return["result"=>"not any opration accur"];
        }
        

    }
    
}
