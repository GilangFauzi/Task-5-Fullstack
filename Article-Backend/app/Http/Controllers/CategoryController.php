<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListCategoryResource;
use App\Models\Categories;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Categories::all()->loadMissing(['user']);
        $response = [
            'message' => 'List Categories',
            'data' => $categories
        ];
        return response()->json($response, response::HTTP_OK);

        // return response()->json(['List All Category!', ListCategoryResource::collection($categories)], 200);
        // return ListCategoryResource::collection($response);
        // $response = [
        //     'message' => 'List Categories',
        //     'data' => $categories
        // ];
        // return response()->json($response, response::HTTP_OK);
        // return ListCategoryResource::collection($categories);
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
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), response::HTTP_OK);
        }
        try {
            $category = Categories::create($request->all());
            $response = [
                'message' => 'Category created!',
                'data' => $category
            ];
            return response()->json($response, response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed!' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        $response = [
            'message' => 'Detail category',
            'data' => $category
        ];
        return response()->json($response, response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), response::HTTP_OK);
        }

        try {
            $category->update($request->all());
            $response = [
                'message' => 'Category Success Updated!',
                'data' => $category
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        try {
            $category->delete();
            $response = [
                'message' => 'Category Deleted!'
            ];
            return response()->json($response, response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }
}
