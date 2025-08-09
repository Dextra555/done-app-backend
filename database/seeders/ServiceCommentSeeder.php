<?php

namespace Database\Seeders;

use App\Models\ServiceComment;
use App\Models\ServiceVideo;
use Illuminate\Database\Seeder;

class ServiceCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            // Furniture Assembly Service comments
            [
                'service_name' => 'Furniture Assembly Service',
                'comment' => 'Great tutorial! The step-by-step instructions made assembly so much easier.',
            ],
            [
                'service_name' => 'Furniture Assembly Service',
                'comment' => 'Very helpful video. Saved me hours of frustration.',
            ],
            [
                'service_name' => 'Furniture Assembly Service',
                'comment' => 'Perfect timing and clear explanations. Highly recommended!',
            ],
            
            // Custom Furniture Design comments
            [
                'service_name' => 'Custom Furniture Design',
                'comment' => 'Amazing design ideas! Love the creativity shown here.',
            ],
            [
                'service_name' => 'Custom Furniture Design',
                'comment' => 'This inspired me to create my own custom piece. Thank you!',
            ],
            
            // Furniture Delivery & Installation comments
            [
                'service_name' => 'Furniture Delivery & Installation',
                'comment' => 'Professional service! The installation was flawless.',
            ],
            [
                'service_name' => 'Furniture Delivery & Installation',
                'comment' => 'Fast delivery and careful handling. Very satisfied!',
            ],
            [
                'service_name' => 'Furniture Delivery & Installation',
                'comment' => 'Excellent customer service throughout the process.',
            ],
            
            // Furniture Repair & Restoration comments
            [
                'service_name' => 'Furniture Repair & Restoration',
                'comment' => 'Brought my old furniture back to life! Fantastic work.',
            ],
            [
                'service_name' => 'Furniture Repair & Restoration',
                'comment' => 'Great restoration techniques. Learned a lot from this video.',
            ],
            
            // Interior Design Consultation comments
            [
                'service_name' => 'Interior Design Consultation',
                'comment' => 'Valuable tips for furniture placement and room design.',
            ],
            [
                'service_name' => 'Interior Design Consultation',
                'comment' => 'Professional advice that transformed my space completely.',
            ],
            
            // Furniture Moving & Relocation comments
            [
                'service_name' => 'Furniture Moving & Relocation',
                'comment' => 'Safe and efficient moving service. No damage to any furniture.',
            ],
            [
                'service_name' => 'Furniture Moving & Relocation',
                'comment' => 'Reliable team that handled everything with care.',
            ],
            
            // Custom Upholstery Service comments
            [
                'service_name' => 'Custom Upholstery Service',
                'comment' => 'Beautiful upholstery work! The fabric selection was perfect.',
            ],
            [
                'service_name' => 'Custom Upholstery Service',
                'comment' => 'High-quality craftsmanship. My sofa looks brand new!',
            ],
            
            // Furniture Refinishing comments
            [
                'service_name' => 'Furniture Refinishing',
                'comment' => 'Amazing transformation! The refinishing process was fascinating to watch.',
            ],
            [
                'service_name' => 'Furniture Refinishing',
                'comment' => 'Professional refinishing that preserved the furniture\'s character.',
            ],
        ];

        foreach ($comments as $comment) {
            $service = ServiceVideo::whereHas('service', function($query) use ($comment) {
                $query->where('serviceName', $comment['service_name']);
            })->first();
            
            if ($service) {
                ServiceComment::create([
                    'service_video_id' => $service->id,
                    'comment' => $comment['comment'],
                ]);
            }
        }
    }
} 