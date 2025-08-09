<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the ApiService class to the service container
        // $this->app->singleton(ApiService::class, function ($app) {
        //     return new ApiService();
        // });
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        $baseUrl = config('app.api_base_url');
        Product::observe(ProductObserver::class);

        View::composer('*', function ($view) use ($baseUrl) {

            // Prepare the token for the request
            $token = '4|fKPbhakBRSKiu1Z61dW6sGZCANBIiuEJpPHY284R9b67e616';

            // Make the API request using the Http facade
            $response = Http::withToken($token)
                ->get($baseUrl . '/api/b2c/categories');

            // Check if the request was successful
            if ($response->successful()) {
                // Get categories from the response
                $categories = $response->json('data.categories') ?? [];
            } else {
                // Handle failure (e.g., log the error or use an empty array)
                $categories = [];
            }

            // Pass categories to the view
            $view->with('categories', $categories);
        });
    }
}
