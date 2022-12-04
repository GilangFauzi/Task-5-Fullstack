<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::all();
        $post = Post::all()->loadMissing(['categories']);
        // $post =   Post::orderBy('id', 'desc')->paginate(3);

        // $categories = Categories::all();
        $response = [
            'message' => 'List All Post!',
            'data' => $post
            // 'category' => $categories
        ];

        return response()->json($response, response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), response::HTTP_OK);
        }
        try {
            $post = Post::create($request->all());
            $response = [
                'message' => 'Post created!',
                'data' => $post
            ];
            return response()->json($response, response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id)->loadMissing(['categories', 'user']);
        $response = [
            'message' => 'Detail Post',
            'data' => $post
        ];
        return response()->json($response, response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), response::HTTP_OK);
        }

        try {
            $post->update($request->all());
            $response = [
                'message' => 'Post Updated!',
                'data' => $post
            ];
            return response()->json($response, response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed!' . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        try {
            $post->delete();
            $response = [
                'message' => 'Post Deleted!'
            ];
            return response()->json($response, response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }
}
