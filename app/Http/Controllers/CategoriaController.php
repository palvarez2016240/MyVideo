<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Category::all();

        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => '|unique:categories'
        ]);

        $categoria = Category::create($request->all());

        return redirect()->route('categorias.show', $categoria);
    }

    public function show(Category $categoria){

        $videos = Category::find($categoria->id)->videos;

        return view('categorias.show', compact('videos', 'categoria'));
    }
}
