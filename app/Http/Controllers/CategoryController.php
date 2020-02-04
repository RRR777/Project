<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', '0')
            ->with('childrenCategories')
            ->get();
        return view('categories', compact('categories'));
    }
}
