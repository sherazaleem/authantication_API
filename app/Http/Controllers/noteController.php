<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\note;
use App\Models\user;
use Validator;
use Illuminate\Support\Facades\Hash;
class noteController extends Controller
{
     public function show()
    {
         $add=note::all();
         return["result"=>$add];

         // // $img =$request->file('video_note');
        // $img = base64_encode(file_get_contents($request->file('video_note')->path()));
        // $add->video_note=$img;

      //   $image = $request->file('video_note');
      // $new_name = rand() . '.' . $image->getClientOriginalExtension();
      // $image->move(public_path('images'), $new_name);
      // $add->video_note=$new_name;

    }
    public function Add(Request $request)
    {   
        $user = $request->user();
        $note = new note;
        

        if($request->is_text_note == 1)
        {   $note->user_id =$user->id;
            $note->title=$request->title;
            $note->description=$request->description;
            $note->is_text_note = $request->is_text_note;
            $note->is_voice_note = 0;
            $note->is_video_note = 0;
        }

        if($request->is_voice_note == 1)
        {   
            $note->user_id =$user->id;
            $note->title='null';
            $note->description='null';
            $file = $request->voice_note;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->move('audio',$filename);
            $note->voice_note = $path;
            $note->is_text_note = 0;
            $note->is_voice_note = $request->is_voice_note;
            $note->is_video_note = 0;
        }
         
        if($request->is_video_note == 1)
        {   $note->user_id =$user->id;
            $note->title='null';
            $note->description='null';
            $file = $request->video_note;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->move('video',$filename);
            $note->video_note = $path;
            $note->is_text_note = 0;
            $note->is_voice_note = 0;
            $note->is_video_note = $request->is_video_note;
        }

        $note->status=$request->status;
        
        if ($note->save()) {
            return["result"=>"successfuly uploaded"];
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
     
public function change_password(Request $request){

     $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|min:8',
        ]);

     if($validator->fails()){
            return response()->json([
                'message'=>'validator fails',
                'errors'=>$validator->errors()],422);       
        }

        $user=$request->user();
        
        // return response()->json($r); 
        if (Hash::check($request->old_password,$user->password)) 
        {  
            $user->update([
                'password'=>Hash::make($request->password)
            ]);

            return response()->json([
                'message'=>'congratulations your old password has been successfully updated'],200);
        
        }
        else{

            return response()->json([
                'message'=>'old password not matched '],400);


        }
        
        
     
  }


}
