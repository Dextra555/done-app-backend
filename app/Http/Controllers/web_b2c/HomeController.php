<?php

namespace App\Http\Controllers\web_b2c;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $apiService;

    // Inject ApiService into the controller
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index() {
        // Fetch getFlashSaleProducts using the ApiService
        $flashSaleProducts = $this->apiService->getFlashSaleProducts(3); // Assuming 3 is the ID for flash sale category

        // Fetch getPopularProducts using the ApiService
        $popularProducts = $this->apiService->getPopularProducts(3); // Assuming 3 is the ID for popular products category

        return view('user.index', compact('flashSaleProducts', 'popularProducts'));
    }
}
