<?php

namespace App\Http\Controllers\Text;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\note;
use App\Models\user;
class TextController extends Controller
{
    // show the text table

    public function show()
    {   
        $text=note::where('is_text_note',1)->paginate(4);
        return view("dashboard.Text.Text",compact('text'));
    }
    
    // show the text create form

    public function add()
    {
        return view("dashboard.Text.add_text");
    }

    // add text function

    public function added(Request $request)
    {   
        $user = $request->user();
        $text= new note;
        $text->user_id =$user->id;
        $text->title=$request->title;
        $text->description=$request->description;
        $text->is_text_note = 1;
        $text->status=1;
        $text->save();
        return redirect()->back();
    }
    // show the text update form

    public function update($id)
    {   $text=note::find($id);
        return view("dashboard.Text.update_text",compact('text'));
    }
    public function updated(Request $request,$id)
    {   
        $user = $request->user();
        $text=note::find($id);
        $text->user_id =$user->id;
        $text->title=$request->title;
        $text->description=$request->description;
        $text->is_text_note = 1;
        $text->status=1;
        $text->save();
        return redirect()->back();
    }
    public function deleted($id)
    {   $text=note::find($id);
        $text->delete();
        return redirect()->back();
    }
}
