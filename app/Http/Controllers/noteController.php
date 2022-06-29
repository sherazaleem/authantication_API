<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\note;
class noteController extends Controller
{
     public function show()
    {
         $add=note::all();
         return["result"=>$add];

    }
    public function Add(Request $request)
    {   
         
        $user = $request->user();
        // $upload=$request->audio->store('public/audio/');
        // ->audio->hashName()
        $add= new note;
        $add->user_id=$user->id;
        $add->title=$request->title;
        $add->description=$request->description;
        $add->voice_note=$request->voice_note;
        $img =$request->file('video_note');
        $add->video_note=$img;
        $add->is_text_note=$request->is_text_note;
        $add->is_voice_note=$request->is_voice_note;
        $add->is_video_note=$request->is_video_note;
        $add->status=$request->status;
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
        $add=note::find($id);
        $add->user_id=$request->user_id;
        $add->title=$request->title;
        $add->description=$request->description;
        $add->voice_note=$request->voice_note;
        $add->video_note=$request->video_note;
        $add->is_text_note=$request->is_text_note;
        $add->is_voice_note=$request->is_voice_note;
        $add->is_video_note=$request->is_video_note;
        $add->status=$request->status;
        $add->status=$request->status;
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
        $add=note::find($id);
        $result=$add->delete();
        if ($result) {
            
            return["result"=>"delete permanaty"];
        }else
        {
            return["result"=>"not any opration accur"];
        }   

    }
}
