<?php

namespace App\Http\Controllers\notes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\note;

class notesController extends Controller
{
    public function show()
    {
        $text=note::paginate(4);
        $video=note::all();
        $voice=note::all();
        // die($text);

        return view("dashboard.notes.notes",compact('text','video','voice'));
    }
}
