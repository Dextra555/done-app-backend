# Furniture E-commerce Seeder Flow Documentation

## Overview
This document outlines the complete seeder flow for the furniture e-commerce application. All seeders are designed to work with furniture-related data and follow proper table dependencies.

## Seeder Execution Order

### 1. Core Seeders
- **AdminUserSeeder**: Creates admin user for system management
  - Email: admin@example.com
  - Password: password

### 2. Category & Subcategory Seeders
- **CategorySeeder**: Creates 8 main furniture categories
  - Living Room, Bedroom, Dining Room, Kitchen, Office, Outdoor, Bathroom, Kids Room

### 3. Product Attribute System
- **ProductAttributeSeeder**: Creates 20+ furniture attributes
  - Material, Color, Size, Style, Finish, Brand, Weight Capacity, etc.

- **AttributeSubAttributeSeeder**: Creates detailed attribute values
  - Material: Wood, Metal, Fabric, Leather, Plastic, Glass, Marble, Granite
  - Color: Brown, Black, White, Gray, Beige, Blue, Red, Green
  - Style: Modern, Traditional, Contemporary, Industrial, Rustic, etc.
  - Brand: IKEA, Ashley Furniture, Pottery Barn, West Elm, etc.

### 4. Tag System
- **TagSeeder**: Creates 60+ furniture-related tags
  - Eco-Friendly, Handcrafted, Vintage, Luxury, Budget-Friendly, Space-Saving, etc.

### 5. Product System
- **ProductSeeder**: Creates 15+ furniture products across all categories
  - Modern 3-Seater Fabric Sofa, Rustic Wood Coffee Table, Queen Size Platform Bed, etc.
  - Each product includes: name, description, key features, pricing, stock, ratings

- **ProductVariantSeeder**: Creates multiple variants for each product
  - Different colors, materials, sizes
  - Unique SKUs for inventory management
  - Variant-specific pricing and stock levels

- **ProductReviewSeeder**: Creates realistic reviews and comments
  - 5-star and 4-star reviews with detailed feedback
  - Customer questions and comments
  - Product-specific feedback

### 6. Service System
- **ServiceSeeder**: Creates 8 furniture-related services
  - Furniture Assembly Service, Custom Furniture Design, Delivery & Installation, etc.

- **ServiceVideoSeeder**: Creates service demonstration videos
  - Video URLs and thumbnails
  - View counts and engagement metrics

- **ServiceCommentSeeder**: Creates service video comments
  - Customer feedback on service videos
  - Positive testimonials and questions

## Data Structure

### Categories
```
Living Room
├── Sofas & Couches
├── Coffee Tables
├── TV Stands
├── Accent Chairs
├── Bookshelves
└── Side Tables

Bedroom
├── Beds & Bed Frames
├── Mattresses
├── Dressers & Chests
├── Nightstands
├── Wardrobes
└── Bedside Tables

Dining Room
├── Dining Tables
├── Dining Chairs
├── Buffets & Sideboards
└── China Cabinets

Kitchen
├── Kitchen Islands
├── Bar Stools
├── Kitchen Carts
└── Pantry Cabinets

Office
├── Desks
├── Office Chairs
├── Filing Cabinets
├── Bookcases
└── Conference Tables

Outdoor
├── Patio Furniture
├── Garden Benches
├── Outdoor Tables
└── Hammocks

Bathroom
├── Vanities
├── Medicine Cabinets
└── Bathroom Shelves

Kids Room
├── Kids Beds
├── Study Desks
├── Toy Storage
└── Kids Chairs
```

### Product Examples
1. **Modern 3-Seater Fabric Sofa**
   - Category: Living Room
   - Subcategory: Sofas & Couches
   - Price: $699.99
   - Variants: Blue, Gray, Beige
   - Features: Premium fabric, High-density foam, Sturdy wooden frame

2. **Queen Size Platform Bed**
   - Category: Bedroom
   - Subcategory: Beds & Bed Frames
   - Price: $499.99
   - Variants: Walnut, Oak
   - Features: Upholstered headboard, Platform design, No box spring needed

3. **L-Shaped Computer Desk**
   - Category: Office
   - Subcategory: Desks
   - Price: $349.99
   - Variants: Black, White
   - Features: L-shaped design, Cable management, Keyboard tray

### Services Examples
1. **Furniture Assembly Service**
   - Related to: Living Room products
   - Video views: 1,250
   - Comments: 45

2. **Custom Furniture Design**
   - Related to: Bedroom products
   - Video views: 890
   - Comments: 32

3. **Furniture Delivery & Installation**
   - Related to: Dining Room products
   - Video views: 2,100
   - Comments: 67

## Usage Instructions

### Running All Seeders
```bash
php artisan db:seed
```

### Running Individual Seeders
```bash
# Run only category seeders
php artisan db:seed --class=CategorySeeder

# Run only product seeders
php artisan db:seed --class=ProductSeeder

# Run only service seeders
php artisan db:seed --class=ServiceSeeder
```

### Fresh Database with Seeders
```bash
php artisan migrate:fresh --seed
```

## Key Features

### 1. Realistic Data
- All product names, descriptions, and features are furniture-specific
- Pricing follows realistic furniture market ranges
- Reviews and comments are authentic and relevant

### 2. Proper Relationships
- All foreign key relationships are maintained
- Products link to categories
- Variants link to products
- Services link to categories and products

### 3. Comprehensive Coverage
- 8 main categories
- 15+ products with variants
- 8 services with videos and comments
- 60+ tags for product categorization
- 20+ product attributes with detailed values

### 4. Scalable Structure
- Easy to add new categories, products, or services
- Flexible attribute system for different product types
- Tag system for advanced filtering and search

## Database Tables Populated

1. **admins** - Admin user
2. **categories** - 8 main furniture categories
4. **product_attributes** - 20+ furniture attributes
5. **attribute_sub_attributes** - Detailed attribute values
6. **tags** - 60+ furniture-related tags
7. **products** - 15+ furniture products
8. **product_variants** - Multiple variants per product
9. **product_reviews** - Reviews and comments for products
10. **services** - 8 furniture-related services
11. **service_videos** - Service demonstration videos
12. **service_comments** - Comments on service videos

## Notes
- All seeders use realistic furniture industry data
- Proper error handling for missing relationships
- Timestamps are set to recent dates for realistic data
- Stock levels and pricing reflect typical furniture market values
- Reviews and ratings follow realistic customer feedback patterns 