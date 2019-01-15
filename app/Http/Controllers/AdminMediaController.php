<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
class AdminMediaController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function edit(){
        
    }

    public function upload(){
    }

    public function show($id)
    {
        //
    }
}
