<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // browse semua data
    public function index()
    {
        $data = Post::all();

        // validasi dan response
        $validator = Validator::make($data, [
            'title' => ['require', 'min:5']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }
        return response()->json($data, 200);
    }

    // read api tampilkan data berdasarkan id
    public function show($id)
    {
        $data = Post::find($id);


        // ketika data kosong tidak ada response
        if (is_null($data)) {
            return response()->json([
                'message' => 'Resource not found!'
            ], 404);
        }
        return response()->json($data, 200);
    }

    // tambah data -> add api endpoint
    public function store(Request $request)
    {
        $data = $request->all();
        $response = Post::create($data);
        return response()->json($response, 201);
    }

    // edit data -> edit api endpoint
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json($post, 200);
    }

    // delete data -> delete api endpoinnt
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 200);
    }
}
