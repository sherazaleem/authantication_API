<?php

namespace App\Http\Controllers\recipients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\recipients;
class recipientsController extends Controller
{


  // show recipients table


    public function show()

    {   
      $recipients=recipients::paginate(4);
     
        return view('dashboard.recipients.recipients',compact('recipients'));
    }



  // show recipients add form

    public function add()
    {   
        
        return view("dashboard.recipients.add_recipients");
    }



  //recipients form submit functionlty

    public function added(Request $request)
    {

      $recipients= new recipients;
      $recipients->name=$request->name;
      $recipients->email=$request->email;
      $recipients->save();
      return redirect()->back();
    }

  // Delete recipients from  table

    public function update($id)
    {   
        $recipients=recipients::find($id);
        return view("dashboard.recipients.update_recipients",compact('recipients'));
    }
  
  // update recipients table record

    public function updated(Request $request,$id)
    {
      $recipients=recipients::find($id);
      $recipients->name=$request->name;
      $recipients->email=$request->email;
      $recipients->save();
      return redirect()->back();


    }
   // delete recipients table record

    public function deleted($id)
    {
      $recipients=recipients::find($id);
      $recipients->delete();
      return redirect()->back();
    }
}
