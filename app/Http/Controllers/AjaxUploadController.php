<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;


class AjaxUploadController extends Controller
{
    function audio_action()
    {
     return view('ajax_upload');
    }
    
    function video_action()
    {
        return view('video_upload');
    }
    
}
