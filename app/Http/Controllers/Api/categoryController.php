<?php

namespace App\Http\Controllers\api;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function index()
    {
        $category=category::all();
        return response()->json($category);
    }
    public function create(Request $request)
    {
        $category = new category();
        $category->name = "book";
        $category->save();
        return response()->json($category);
    }
}
