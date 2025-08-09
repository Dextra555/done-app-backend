<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update product_images table
        DB::statement("ALTER TABLE product_images MODIFY COLUMN type ENUM('main', 'gallery', 'thumbnail', 'other') DEFAULT 'gallery'");
        
        // Update product_variant_images table
        DB::statement("ALTER TABLE product_variant_images MODIFY COLUMN type ENUM('main', 'gallery', 'other') DEFAULT 'main'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert product_images table
        DB::statement("ALTER TABLE product_images MODIFY COLUMN type ENUM('main', 'gallery', 'thumbnail') DEFAULT 'gallery'");
        
        // Revert product_variant_images table
        DB::statement("ALTER TABLE product_variant_images MODIFY COLUMN type ENUM('main', 'gallery') DEFAULT 'main'");
    }
};
