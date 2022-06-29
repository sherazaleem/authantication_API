<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
class DocumentContoller extends Controller
{
     public function update(Request $request)
    {
        $request->validate([
            'file' => 'mimes:jpeg,bmp,png,pdf,jpg',
            'name' => 'required|max:255',
        ]);
        if ($request->hasFile('file')) {           
            $path = $request->file('file')->getRealPath();
            $ext = $request->file->extension();
            $doc = file_get_contents($path);
            $base64 = base64_encode($doc);
            $mime = $request->file('file')->getClientMimeType();
            Document::create([
                'name'=> $request->name .'.'.$ext,
                'file' => $base64,
                'mime'=> $mime,
            ]);
            return ["result"=>"successfuly run"];
        }
    }
}
