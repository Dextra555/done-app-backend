<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use App\Models\B2CUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test data
        $this->category = Category::factory()->create([
            'name' => 'Electronics',
            'description' => 'Electronic products'
        ]);

        $this->product = Product::factory()->create([
            'category_id' => $this->category->id,
            'name' => 'Test Product',
            'description' => 'Test product description',
            'selling_price' => 99.99,
            'cost_price' => 80.00,
            'stock' => 50,
            'status' => 'active'
        ]);

        $this->attribute = ProductAttribute::factory()->create([
            'name' => 'Color',
            'type' => 'select'
        ]);

        $this->attributeValue = AttributeValue::factory()->create([
            'attribute_id' => $this->attribute->id,
            'value' => 'Red'
        ]);

        $this->variant = ProductVariant::factory()->create([
            'product_id' => $this->product->id,
            'sku' => 'TEST-001-RED',
            'price' => 99.99,
            'stock' => 25
        ]);

        $this->variant->attributeValues()->attach($this->attributeValue->id);
    }

    /** @test */
    public function it_can_get_all_products()
    {
        $response = $this->getJson('/api/b2c/products');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'products' => [
                            '*' => [
                                'id',
                                'name',
                                'description',
                                'selling_price',
                                'image_url',
                                'average_rating',
                                'review_count',
                                'stock',
                                'is_on_sale',
                                'discount_percentage',
                                'category',
                                'main_variant'
                            ]
                        ],
                        'pagination'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_featured_products()
    {
        $response = $this->getJson('/api/b2c/products/featured');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'products'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_products_on_sale()
    {
        $response = $this->getJson('/api/b2c/products/on-sale');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'products',
                        'pagination'
                    ]
                ]);
    }

    /** @test */
    public function it_can_search_products()
    {
        $response = $this->getJson('/api/b2c/products/search?query=Test');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'query',
                        'products',
                        'pagination'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_product_by_id()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'product' => [
                            'id',
                            'name',
                            'description',
                            'key_features',
                            'selling_price',
                            'cost_price',
                            'image_url',
                            'average_rating',
                            'review_count',
                            'stock',
                            'is_on_sale',
                            'discount_percentage',
                            'category',
                            'variants',
                            'reviews'
                        ]
                    ]
                ]);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_product()
    {
        $response = $this->getJson('/api/b2c/products/99999');

        $response->assertStatus(404)
                ->assertJson([
                    'status' => false,
                    'message' => 'Product not found'
                ]);
    }

    /** @test */
    public function it_can_get_related_products()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/related");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'products'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_products_by_category()
    {
        $response = $this->getJson("/api/b2c/products/category/{$this->category->id}");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'category_id',
                        'products',
                        'pagination'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_products_by_price_range()
    {
        $response = $this->getJson('/api/b2c/products/price-range?min_price=50&max_price=100');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'filters',
                        'products',
                        'pagination'
                    ]
                ]);
    }

    /** @test */
    public function it_validates_price_range_parameters()
    {
        $response = $this->getJson('/api/b2c/products/price-range');

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'errors'
                ]);
    }

    /** @test */
    public function it_can_get_products_by_rating()
    {
        $response = $this->getJson('/api/b2c/products/by-rating?rating=4');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'filters',
                        'products',
                        'pagination'
                    ]
                ]);
    }

    /** @test */
    public function it_validates_rating_parameter()
    {
        $response = $this->getJson('/api/b2c/products/by-rating');

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'errors'
                ]);
    }

    /** @test */
    public function it_can_get_product_statistics()
    {
        $response = $this->getJson('/api/b2c/products/statistics');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'overview',
                        'price_ranges',
                        'rating_ranges'
                    ]
                ]);
    }

    /** @test */
    public function it_can_add_product_review_when_authenticated()
    {
        $user = B2CUser::factory()->create();
        
        $response = $this->actingAs($user, 'sanctum')
                        ->postJson("/api/b2c/products/{$this->product->id}/reviews", [
                            'rating' => 5,
                            'content' => 'Great product!',
                            'type' => 'review'
                        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'review' => [
                            'id',
                            'rating',
                            'content',
                            'type',
                            'created_at'
                        ]
                    ]
                ]);
    }

    /** @test */
    public function it_requires_authentication_for_adding_reviews()
    {
        $response = $this->postJson("/api/b2c/products/{$this->product->id}/reviews", [
            'rating' => 5,
            'content' => 'Great product!'
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function it_validates_review_data()
    {
        $user = B2CUser::factory()->create();
        
        $response = $this->actingAs($user, 'sanctum')
                        ->postJson("/api/b2c/products/{$this->product->id}/reviews", [
                            'rating' => 6, // Invalid rating
                            'content' => 'Short' // Too short
                        ]);

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'errors'
                ]);
    }
}

class ProductVariantApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test data
        $this->category = Category::factory()->create();
        $this->product = Product::factory()->create([
            'category_id' => $this->category->id,
            'status' => 'active'
        ]);

        $this->attribute = ProductAttribute::factory()->create([
            'name' => 'Color',
            'type' => 'select'
        ]);

        $this->attributeValue = AttributeValue::factory()->create([
            'attribute_id' => $this->attribute->id,
            'value' => 'Red'
        ]);

        $this->variant = ProductVariant::factory()->create([
            'product_id' => $this->product->id,
            'sku' => 'TEST-001-RED',
            'price' => 99.99,
            'stock' => 25
        ]);

        $this->variant->attributeValues()->attach($this->attributeValue->id);
    }

    /** @test */
    public function it_can_get_product_variants()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'product',
                        'variants' => [
                            '*' => [
                                'id',
                                'sku',
                                'price',
                                'stock',
                                'is_in_stock',
                                'image_url',
                                'attributes'
                            ]
                        ]
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_specific_variant()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/{$this->variant->id}");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'product',
                        'variant' => [
                            'id',
                            'sku',
                            'price',
                            'stock',
                            'is_in_stock',
                            'image_url',
                            'attributes',
                            'images'
                        ]
                    ]
                ]);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_variant()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/99999");

        $response->assertStatus(404)
                ->assertJson([
                    'status' => false,
                    'message' => 'Product variant not found'
                ]);
    }

    /** @test */
    public function it_can_get_variants_by_attributes()
    {
        $response = $this->postJson("/api/b2c/products/{$this->product->id}/variants/by-attributes", [
            'attributes' => [
                [
                    'attribute_id' => $this->attribute->id,
                    'value_id' => $this->attributeValue->id
                ]
            ]
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'product',
                        'variants'
                    ]
                ]);
    }

    /** @test */
    public function it_validates_attribute_parameters()
    {
        $response = $this->postJson("/api/b2c/products/{$this->product->id}/variants/by-attributes", [
            'attributes' => [
                [
                    'attribute_id' => 99999, // Invalid attribute
                    'value_id' => 99999 // Invalid value
                ]
            ]
        ]);

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'errors'
                ]);
    }

    /** @test */
    public function it_can_get_attribute_combinations()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/attribute-combinations");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'product',
                        'attributes',
                        'combinations'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_variants_by_price_range()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/by-price-range?min_price=50&max_price=100");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'product',
                        'filters',
                        'variants'
                    ]
                ]);
    }

    /** @test */
    public function it_can_get_variant_stock_status()
    {
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/{$this->variant->id}/stock-status");

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'status',
                    'message',
                    'data' => [
                        'variant_id',
                        'sku',
                        'stock',
                        'is_in_stock',
                        'stock_status'
                    ]
                ]);
    }

    /** @test */
    public function it_returns_correct_stock_status()
    {
        // Test in stock
        $this->variant->update(['stock' => 10]);
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/{$this->variant->id}/stock-status");
        $response->assertStatus(200);
        $this->assertEquals('in_stock', $response->json('data.stock_status'));

        // Test low stock
        $this->variant->update(['stock' => 3]);
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/{$this->variant->id}/stock-status");
        $response->assertStatus(200);
        $this->assertEquals('low_stock', $response->json('data.stock_status'));

        // Test out of stock
        $this->variant->update(['stock' => 0]);
        $response = $this->getJson("/api/b2c/products/{$this->product->id}/variants/{$this->variant->id}/stock-status");
        $response->assertStatus(200);
        $this->assertEquals('out_of_stock', $response->json('data.stock_status'));
    }
} 