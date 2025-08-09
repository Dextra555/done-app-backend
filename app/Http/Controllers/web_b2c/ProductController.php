<?php

namespace App\Http\Controllers\web_b2c;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    protected $apiService;

    // Inject ApiService into the controller
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        return view('user.index'); // Assuming the view is set up to display categories
    }

    // public function getFlashSaleProducts()
    // {
    //     $flashSaleProducts = $this->apiService->getFlashSaleProducts(1); // Assuming 1 is the ID for flash sale category
    //     return view('user.index', compact('flashSaleProducts'));
    // }

    public function getProductsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail(); // This will throw a 404 if not found

        $categoryId = $category->id;

        $categoryProducts = $this->apiService->getProductsByCategory($categoryId);

        // $categoryProducts = $response->json('data.category') ?? [];
        return view('user.category_products', compact('categoryProducts'));
    }

    public function getInspirationByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryId = $category->id;

        $categoryData = $this->apiService->getProductsByCategory($categoryId);

        return response()->json([
            'status' => true,
            'data' => [
                'products' => $categoryData['products'] ?? []
            ]
        ]);
    }
}
