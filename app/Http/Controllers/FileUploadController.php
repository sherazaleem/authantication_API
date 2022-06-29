<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function FileUpload(Request $request)
    {

        $upload=$request->file->store('public/uploads/');
        return ['result'=>$upload];

    }
}
