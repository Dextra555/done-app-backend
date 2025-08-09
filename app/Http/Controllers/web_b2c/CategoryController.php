<?php

namespace App\Http\Controllers\web_b2c;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        // Logic to fetch categories and pass them to the view
        // $categories = Category::select('id', 'name', 'image_url')->where('status', 1)->get();
        // return view('user.index', compact('categories'));
        return view('user.index'); // Assuming the view is set up to display categories
    }
    public function show($slug) {
        // Logic to fetch products by category slug
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('user.category_products', compact('category'));
    }
}
