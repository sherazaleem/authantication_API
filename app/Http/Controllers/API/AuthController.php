<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Password;
// use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Support\Facades\Validator;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

   public function change_password(Request $request){

     $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'confirm_password' => 'required|same:password|min:6'
        ]);
           if($validator->fails()){
            return response()->json([
                'message'=>'validator fails',
                'errors'=>$validator->errors()],422);       
        }
        $user=$request->user();
        if (Hash::check($request->old_password,$user->password )) 
           {  $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'message'=>'OLD password successfully update'],200);
        
        }
        else{

            return response()->json([
                'message'=>'OLD password not matched'],400);


        }

  }



} 