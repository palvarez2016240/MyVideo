<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function show(Video $video){

        $categorias =  Video::find($video->id)->categories;

        $videos = Video::where('user_id', $video->user_id)->get();

        return view('videos.show', compact('video', 'videos', 'categorias'));
    }

    public function update(Request $request, Video $videos){

        $videos->update($request->all());

        return redirect()->route('home', $videos)->with('cursoEditado', 'Curso edtitado satisfactoriamente');
    }
}
