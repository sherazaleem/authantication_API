<?php

namespace App\Http\Controllers\Trash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\note;

class TrashController extends Controller
{
    public function show()
    {    
        $note_data=note::onlyTrashed()->paginate(3);
        return view("dashboard.Trash.Trash",compact('note_data'));
    }


    public function restore($id)
    {   
        note::onlyTrashed()->whereId($id)->restore();
        return redirect()->back();
    }

    public function permanently_delete($id)
    {

        note::whereId($id)->forceDelete();
        return redirect()->back();

    }
}
