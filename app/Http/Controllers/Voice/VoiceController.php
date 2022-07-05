<?php

namespace App\Http\Controllers\Voice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\note;
class VoiceController extends Controller
{

    //  show voice table 

    public function show()
    { 

    $voice=note::where("is_voice_note",1)->paginate(4);
    return view("dashboard.Voice.Voice",compact('voice'));
    }
    
    // show post voice html form

    public function add()
    { 
    
    return view("dashboard.Voice.add_voice");
    }

    // show update html form

    public function update()
    { 
    return view("dashboard.Voice.update_voice");
    }

    // delete function 

    public function deleted($id){

        $voice=note::find($id);
        $voice->delete();
        return redirect()->back();
    }


}
