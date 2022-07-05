<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\recipients;
use App\Models\note;
use App\Models\user;

class VideoController extends Controller
{  
    // show video table

    public function show()
    { 
    $video=note::where('is_video_note',1)->paginate(4);
    return view("dashboard.Video.Video",compact('video'));
    }
    // show html of add video

    public function add()
    { 
    return view("dashboard.Video.add_video");
    }

    // post data function 

    public function added(Request $request)
    {   


            $user = $request->user();
            $note = new note;
            $note->user_id =$user->id;
            $note->title='null';
            $note->description='null';
            $file = $request->video_note;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->move('video',$filename);
            $note->video_note = $path;
            $note->is_video_note = 1;
            $note->status=1;
            $note->save();
            return redirect()->back()->with("message","successfuly uploaded");

    }

    // show html of udate video

    public function update()
    { 
    return view("dashboard.Video.update_video");
    }

    // delete function

    public function deleted($id)
    {  
        $video=note::find($id);
        $video->delete();
        return redirect()->back();
    }
}
