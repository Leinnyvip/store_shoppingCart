<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategories()
	{
		$categories = Category::get();
		return view('category', compact('categories'));
    }

    public function getCategories()
	{
		$categories = Category::get();
		return response()->json(['categories' => $categories], 200);
	}

}
