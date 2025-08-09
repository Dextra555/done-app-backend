# Attribute and Variant Assignment Flow Documentation

## Overview
This document explains the complete flow for managing product attributes and assigning them to product variants in the Done App API.

## Database Structure

### 1. Core Tables

#### `product_attributes`
- **Purpose**: Defines the main attributes for products (e.g., Color, Size, Material)
- **Key Fields**: `id`, `name`
- **Example**: Color, Size, Material, Style, Brand, etc.

#### `attribute_sub_attributes`
- **Purpose**: Defines specific options for each attribute (e.g., Red, Blue, Green for Color)
- **Key Fields**: `id`, `attribute_id`, `name`
- **Example**: For Color attribute → Red, Blue, Green, Black, White

#### `attribute_values`
- **Purpose**: Links attributes with their sub-attributes and provides actual values
- **Key Fields**: `id`, `attribute_id`, `sub_attribute_id`, `value`
- **Example**: Links Color attribute with Red sub-attribute, value = "Red"

#### `product_variants`
- **Purpose**: Individual product variants with specific characteristics
- **Key Fields**: `id`, `product_id`, `sku`, `price`, `stock`, `image_url`

#### `variant_attribute_values` (Pivot Table)
- **Purpose**: Links variants to their attribute values
- **Key Fields**: `variant_id`, `attribute_value_id`
- **Example**: Links a specific variant to multiple attribute values

## Complete Flow

### Step 1: Database Seeding
```bash
php artisan db:seed
```

**Seeder Order:**
1. `ProductAttributeSeeder` - Creates main attributes
2. `AttributeSubAttributeSeeder` - Creates sub-attributes for each main attribute
3. `AttributeValueSeeder` - Creates attribute values linking attributes and sub-attributes

### Step 2: Creating Product Variants

#### A. Load Attributes in Controller
```php
// ProductVariantController@create
$attributes = ProductAttribute::with(['subAttributes', 'values'])->get();
```

#### B. Display in View
```blade
@foreach($attributes as $attribute)
    <div class="attribute-group">
        <h4>{{ $attribute->name }}</h4>
        @foreach($attribute->values as $attrValue)
            <label>
                <input type="checkbox" 
                       name="attribute_values[]" 
                       value="{{ $attrValue->id }}">
                {{ $attrValue->value ?? $attrValue->subAttribute->name }}
            </label>
        @endforeach
    </div>
@endforeach
```

#### C. Store Variant with Attributes
```php
// ProductVariantController@store
$variant = $product->variants()->create([
    'sku' => $request->sku,
    'stock' => $request->stock,
    'price' => $request->price,
    'image_url' => $request->image_url,
]);

// Attach selected attribute values
if ($request->has('attribute_values')) {
    $variant->attributeValues()->attach($request->attribute_values);
}
```

## Example Flow

### 1. Product: "Modern Dining Chair"

**Attributes Available:**
- Color: Red, Blue, Black, White
- Material: Wood, Metal, Plastic
- Size: Small, Medium, Large

### 2. Creating Variant: "Red Wooden Medium Chair"

**User Selection:**
- SKU: CHAIR-RED-WOOD-M
- Price: $199.99
- Stock: 25
- Attributes: [Color: Red, Material: Wood, Size: Medium]

**Database Records:**
```sql
-- product_variants
INSERT INTO product_variants (product_id, sku, price, stock) 
VALUES (1, 'CHAIR-RED-WOOD-M', 199.99, 25);

-- variant_attribute_values (pivot table)
INSERT INTO variant_attribute_values (variant_id, attribute_value_id) VALUES
(1, 1), -- Red color
(1, 5), -- Wood material  
(1, 9); -- Medium size
```

### 3. Retrieving Variant with Attributes

```php
$variant = ProductVariant::with(['attributeValues.attribute', 'attributeValues.subAttribute'])->find(1);

// Access attributes
foreach ($variant->attributeValues as $attrValue) {
    echo $attrValue->attribute->name . ': ' . 
         ($attrValue->value ?? $attrValue->subAttribute->name);
}
// Output: Color: Red, Material: Wood, Size: Medium
```

## Key Relationships

### ProductAttribute Model
```php
public function subAttributes(): HasMany
{
    return $this->hasMany(AttributeSubAttribute::class, 'attribute_id');
}

public function values(): HasMany
{
    return $this->hasMany(AttributeValue::class, 'attribute_id');
}
```

### AttributeValue Model
```php
public function attribute(): BelongsTo
{
    return $this->belongsTo(ProductAttribute::class, 'attribute_id');
}

public function subAttribute(): BelongsTo
{
    return $this->belongsTo(AttributeSubAttribute::class, 'sub_attribute_id');
}
```

### ProductVariant Model
```php
public function attributeValues(): BelongsToMany
{
    return $this->belongsToMany(AttributeValue::class, 'variant_attribute_values', 'variant_id', 'attribute_value_id');
}
```

## Validation Rules

### Creating/Updating Variants
```php
$request->validate([
    'sku' => 'required|string|max:100|unique:product_variants,sku',
    'stock' => 'required|integer|min:0',
    'price' => 'required|numeric|min:0',
    'image_url' => 'nullable|string',
    'attribute_values' => 'nullable|array',
    'attribute_values.*' => 'exists:attribute_values,id',
]);
```

## Best Practices

### 1. Attribute Organization
- Use descriptive attribute names (e.g., "Color" not "col")
- Group related attributes logically
- Keep sub-attributes consistent across similar products

### 2. Variant Creation
- Always validate attribute combinations
- Generate unique SKUs automatically when possible
- Provide clear preview of variant before creation

### 3. Data Integrity
- Use foreign key constraints
- Implement proper validation
- Handle orphaned attribute values

## Troubleshooting

### Common Issues

1. **"Call to undefined relationship [attributeValues]"**
   - **Solution**: Use `values` instead of `attributeValues` for ProductAttribute model

2. **No attribute values showing**
   - **Solution**: Run `php artisan db:seed --class=AttributeValueSeeder`

3. **Variant not saving attributes**
   - **Solution**: Check if `attribute_values` array is being passed correctly

4. **Duplicate attribute assignments**
   - **Solution**: Use `sync()` instead of `attach()` for updates

### Debugging Commands
```bash
# Check if attributes exist
php artisan tinker
>>> App\Models\ProductAttribute::with('values')->get()

# Check if attribute values exist
>>> App\Models\AttributeValue::with('attribute')->get()

# Check variant attributes
>>> App\Models\ProductVariant::with('attributeValues.attribute')->first()
```

## API Endpoints

### Variant Management
- `GET /admin/products/{product}/variants/create` - Show create form
- `POST /admin/products/{product}/variants` - Store new variant
- `GET /admin/products/{product}/variants/{variant}/edit` - Show edit form
- `PUT /admin/products/{product}/variants/{variant}` - Update variant
- `DELETE /admin/products/{product}/variants/{variant}` - Delete variant

### Attribute Management
- `GET /admin/products/{product}/variants/attribute-values` - Get attribute values (AJAX)
- `GET /admin/products/{product}/variants/generate-sku` - Generate SKU (AJAX) 