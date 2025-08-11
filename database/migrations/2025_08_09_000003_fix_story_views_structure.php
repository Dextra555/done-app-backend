<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Check if story_views table exists
        if (!Schema::hasTable('story_views')) {
            Schema::create('story_views', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('story_id');
                $table->string('story_type'); // e.g., 'App\\Models\\ProductStory'
                $table->timestamp('viewed_at');
                $table->timestamps();
                
                // Add composite unique index
                $table->unique(['user_id', 'story_id', 'story_type']);
                
                // Add foreign key to b2c_users
                $table->foreign('user_id')
                      ->references('id')
                      ->on('b2c_users')
                      ->onDelete('cascade');
                      
                // Add index for better performance
                $table->index(['story_id', 'story_type']);
            });
            
            return;
        }
        
        // If table exists, modify it
        Schema::table('story_views', function (Blueprint $table) {
            // Drop existing foreign key constraints if they exist
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $foreignKeys = $sm->listTableForeignKeys('story_views');
            
            foreach ($foreignKeys as $foreignKey) {
                if (in_array('user_id', $foreignKey->getLocalColumns())) {
                    $table->dropForeign([$foreignKey->getLocalColumns()[0]]);
                }
            }
            
            // Add/Modify columns if needed
            if (!Schema::hasColumn('story_views', 'story_type')) {
                $table->string('story_type')->after('user_id');
            }
            
            if (Schema::hasColumn('story_views', 'service_video_id')) {
                $table->renameColumn('service_video_id', 'story_id');
            }
            
            // Add/Update foreign key to b2c_users
            $table->foreign('user_id')
                  ->references('id')
                  ->on('b2c_users')
                  ->onDelete('cascade');
                  
            // Add/Update indexes
            $indexes = $sm->listTableIndexes('story_views');
            
            if (!isset($indexes['story_views_story_id_story_type_index'])) {
                $table->index(['story_id', 'story_type']);
            }
            
            if (!isset($indexes['story_views_user_id_story_id_story_type_unique'])) {
                // Drop old unique constraints if they exist
                if (isset($indexes['story_views_user_id_service_video_id_unique'])) {
                    $table->dropUnique('story_views_user_id_service_video_id_unique');
                }
                if (isset($indexes['story_views_user_id_story_id_unique'])) {
                    $table->dropUnique('story_views_user_id_story_id_unique');
                }
                
                // Add new unique constraint
                $table->unique(['user_id', 'story_id', 'story_type']);
            }
        });
    }

    public function down()
    {
        // We'll keep the table but remove the foreign key to b2c_users
        Schema::table('story_views', function (Blueprint $table) {
            // Drop foreign key to b2c_users if it exists
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $foreignKeys = $sm->listTableForeignKeys('story_views');
            
            foreach ($foreignKeys as $foreignKey) {
                if (in_array('user_id', $foreignKey->getLocalColumns())) {
                    $table->dropForeign([$foreignKey->getLocalColumns()[0]]);
                }
            }
            
            // Add back foreign key to users table if needed
            if (Schema::hasTable('users')) {
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
            }
        });
    }
};
