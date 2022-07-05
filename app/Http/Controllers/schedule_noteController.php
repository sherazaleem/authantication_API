<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule_notes;
use App\Models\note;
use Carbon\Carbon;
class schedule_noteController extends Controller
{
    public function show(){

        $add=schedule_notes::all();
         return["result"=>$add];
    }

    public function Add(Request $request)
    {   
        $add= new schedule_notes;
        if (note::where("id",$request->notes_id))
         {  
        $id=note::where("id",$request->notes_id)->get();
        $add->notes_id=$request->notes_id;
        $add->access_code=$request->access_code;
        $add->is_scheduled=1;

        foreach($id as $date){

            $add->scheduled_at=$date->created_at;
        }
        
        $result=$add->save();
        if ($result) {
            
            return["result"=>"saved"];
        }else
        {
            return["result"=>"somthing wrong"];
        }
        }
        // $id=note::whereDate('created_at',"=", Carbon::now()->format('Y-m-d'));
        // die($id);
        

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
