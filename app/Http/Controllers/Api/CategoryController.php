<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        // return response()->json($categories);
        return CategoryResource::collection($categories);
    }

    public function category($slug)
    {
        $category = Category::where("slug", $slug)->first();
        // return response()->json($categories);
        return new CategoryResource($category);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|string|unique:categories,title|max:255",
            "slug" => "required|string|unique:categories,title|max:255",
            "meta_title" => "required",
            "meta_description" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }


        Category::create([
            "title" => $request->title,
            "slug" => $request->slug,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Category created successfully."
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|string|unique:categories,title,$id|max:255",
            "slug" => "required|string|unique:categories,title,$id|max:255",
            "meta_title" => "required",
            "meta_description" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        $category = Category::find($id);
        $category->update([
            "title" => $request->title,
            "slug" => $request->slug,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Category updated successfully."
        ]);
    }
}
