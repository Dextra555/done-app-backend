<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    protected $baseUrl;
    protected $token;

    // Constructor to initialize baseUrl and token
    public function __construct()
    {
        $this->baseUrl = config('app.api_base_url'); // Fetch from .env or config
        $this->token = env('API_TOKEN'); // Fetch token from .env
    }

    // Method to get categories
    public function getCategories()
    {
        $response = Http::withToken($this->token)
            ->get($this->baseUrl . '/api/b2c/categories');

        if ($response->successful()) {
            return $response->json('data.categories') ?? [];
        } else {
            // Handle error if API call fails
            return [];
        }
    }

    public function getFlashSaleProducts($categoryId)
    {
        // Replace with the actual endpoint for flash sale products
        // Assuming the endpoint is something like /api/b2c/categories/{categoryId}/flash_sale_products
        $response = Http::withToken($this->token)
            ->get($this->baseUrl . "/api/b2c/categories/{$categoryId}");

        if ($response->successful()) {
            return $response->json('data.category') ?? [];
        } else {
            // Handle error if API call fails
            return [];
        }
    }

    public function getPopularProducts($categoryId)
    {
        // Replace with the actual endpoint for popular products
        // Assuming the endpoint is something like /api/b2c/categories/{categoryId}/popular_products
        $response = Http::withToken($this->token)
            ->get($this->baseUrl . "/api/b2c/categories/{$categoryId}");

        if ($response->successful()) {
            return $response->json('data.category') ?? [];
        } else {
            // Handle error if API call fails
            return [];
        }
    }

    // Method to get products by category ID
    public function getProductsByCategory($categoryId)
    {
        // $response = Http::withToken($this->token)
        $response = Http::withToken($this->token)
            ->get($this->baseUrl . "/api/b2c/categories/{$categoryId}");

        if ($response->successful()) {
            return $response->json('data.category') ?? [];
        } else {
            // Handle error if API call fails
            return [];
        }
    }

    // Example method to get product details by ID
    public function getProductDetails($productId)
    {
        $response = Http::withToken($this->token)
            ->get($this->baseUrl . "/api/b2c/products/{$productId}");

        if ($response->successful()) {
            return $response->json('data.product') ?? [];
        } else {
            return [];
        }
    }
}
