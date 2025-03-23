<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return response()->json($data, 200);
    }

    // read api tampilkan data berdasarkan id
    public function show($id)
    {
        $data = Post::find($id);
        return response()->json($data, 200);
    }
}
