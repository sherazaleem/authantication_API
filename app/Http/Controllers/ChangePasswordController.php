<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;

use App\Mail\TestMail;

use Mail;

use App\Models\User;

use Validator;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
{
   public function profile($id)
   {
      $user=user::find($id);
      return view('profile.profile',compact('user'));
   }

   public function profile_update(Request $request)

   {
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
        if (Hash::check($request->old_password,$user->password)) 
        {  
            $user->update([
                'password'=>Hash::make($request->password)
            ]);

            return redirect()->back()->with('message', 'Reset Password Successfully');
        
        }
        else{

            return redirect()->back()->with('message','Please Try Again');


        }
        
    }

    public function reset_send_link($token)
    {
        return view('profile.reset_send_link');
    }

    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        // return view('profile.reset_send_link');
        return redirect()->back();
        
    }





    public function set_password(Request $request)
    {   
        $user= new user();
        $user->remember_token=$request->remember_token;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->update();
        return redirect()->back();
      }

        
    
   
  
    


}

