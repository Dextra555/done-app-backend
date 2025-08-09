<?php

namespace Database\Seeders;

use App\Models\ServiceVideo;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'service_name' => 'Furniture Assembly Service',
                'video_url' => 'https://example.com/videos/furniture-assembly.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/assembly-thumb.jpg',
                'views' => 1250,
                'comments_count' => 45,
            ],
            [
                'service_name' => 'Custom Furniture Design',
                'video_url' => 'https://example.com/videos/custom-design.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/design-thumb.jpg',
                'views' => 890,
                'comments_count' => 32,
            ],
            [
                'service_name' => 'Furniture Delivery & Installation',
                'video_url' => 'https://example.com/videos/delivery-installation.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/delivery-thumb.jpg',
                'views' => 2100,
                'comments_count' => 67,
            ],
            [
                'service_name' => 'Furniture Repair & Restoration',
                'video_url' => 'https://example.com/videos/repair-restoration.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/repair-thumb.jpg',
                'views' => 1560,
                'comments_count' => 53,
            ],
            [
                'service_name' => 'Interior Design Consultation',
                'video_url' => 'https://example.com/videos/interior-design.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/interior-thumb.jpg',
                'views' => 980,
                'comments_count' => 28,
            ],
            [
                'service_name' => 'Furniture Moving & Relocation',
                'video_url' => 'https://example.com/videos/moving-relocation.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/moving-thumb.jpg',
                'views' => 1750,
                'comments_count' => 41,
            ],
            [
                'service_name' => 'Custom Upholstery Service',
                'video_url' => 'https://example.com/videos/upholstery-service.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/upholstery-thumb.jpg',
                'views' => 1320,
                'comments_count' => 38,
            ],
            [
                'service_name' => 'Furniture Refinishing',
                'video_url' => 'https://example.com/videos/refinishing.mp4',
                'thumbnail_url' => 'https://example.com/thumbnails/refinishing-thumb.jpg',
                'views' => 1100,
                'comments_count' => 25,
            ],
        ];

        foreach ($videos as $video) {
            $service = Service::where('serviceName', $video['service_name'])->first();
            
            if ($service) {
                ServiceVideo::create([
                    'service_id' => $service->id,
                    'video_url' => $video['video_url'],
                    'thumbnail_url' => $video['thumbnail_url'],
                    'views' => $video['views'],
                    'comments_count' => $video['comments_count'],
                ]);
            }
        }
    }
} 