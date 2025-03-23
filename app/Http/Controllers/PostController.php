<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // browse semua data
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

    // tambah data -> add api endpoint
    public function store(Request $request)
    {
        $data = $request->all();
        $response = Post::create($data);
        return response()->json($response, 201);
    }
}
