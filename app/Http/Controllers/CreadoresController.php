<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class CreadoresController extends Controller
{
    public function index(){
        $creators = User::all();

        return view('creators.index', compact('creators'));
    }

    public function store(Request $request){

        $request->validate([
            'username' => '|unique:users',
            'email' => '|unique:users'
        ]);

        $creador = User::create($request->all());

        return redirect()->route('creators.show', $creador);
    }

    public function show(User $creator){

      $videos = Video::where('user_id', $creator->id)->get();

       return view('creators.show', compact('creator', 'videos'));
    }

    public function update(Request $request, User $creator){

        $request->validate([
            'username' => "|unique:Users,username,$creator->id",
            'email' => "|unique:Users,email,$creator->id"
        ]);

        $creator->update($request->all());

        return redirect()->route('creators.show', $creator);
    }
}
