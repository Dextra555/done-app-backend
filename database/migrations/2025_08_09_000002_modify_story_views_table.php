<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('story_views', function (Blueprint $table) {
            // Drop existing foreign key constraints
            if (Schema::hasColumn('story_views', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

            // Rename columns for polymorphic relationship
            if (Schema::hasColumn('story_views', 'service_video_id')) {
                $table->dropForeign(['service_video_id']);
                $table->renameColumn('service_video_id', 'story_id');
            }
            
            if (!Schema::hasColumn('story_views', 'story_type')) {
                $table->string('story_type')->after('user_id');
            }
            
            // Add index for better performance
            $table->index(['story_id', 'story_type']);
            
            // Drop the old unique constraint if it exists
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexes = $sm->listTableIndexes('story_views');
            if (array_key_exists('story_views_user_id_story_id_unique', $indexes)) {
                $table->dropUnique('story_views_user_id_story_id_unique');
            }
            
            // Add new unique constraint with story_type
            $table->unique(['user_id', 'story_id', 'story_type']);
            
            // Add foreign key to b2c_users
            $table->foreign('user_id')
                  ->references('id')
                  ->on('b2c_users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('story_views', function (Blueprint $table) {
            // Drop foreign key to b2c_users
            $table->dropForeign(['user_id']);
            
            // Drop the new unique constraint
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexes = $sm->listTableIndexes('story_views');
            if (array_key_exists('story_views_user_id_story_id_story_type_unique', $indexes)) {
                $table->dropUnique('story_views_user_id_story_id_story_type_unique');
            }
            
            // Revert to original columns
            $table->renameColumn('story_id', 'service_video_id');
            $table->dropColumn('story_type');
            
            // Add back original foreign key
            $table->foreign('service_video_id')
                  ->references('id')
                  ->on('service_videos')
                  ->onDelete('cascade');
                  
            // Add back original unique constraint
            $table->unique(['user_id', 'service_video_id']);
            
            // Add back original foreign key to users table
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
};