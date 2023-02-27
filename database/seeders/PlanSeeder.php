<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $freePlan = [
            'title' => 'Grátis',
            'description' => 'Divirta-se com conteúdo!',
            'period' => 0,
            'value' => 0,
            'new_user_discount' => 0,
            'configuration' => [
                'video_size' => '480p',
                'rating' => false,
                'comments' => false,
                'upload_download' => false,
                'support' => false
            ]
        ];

        $premiumPlan = [
            'title' => 'Premium',
            'description' => 'Desbloqueie conteúdos',
            'period' => 1,
            'value' => 29.99,
            'new_user_discount' => 0,
            'configuration' => [
                'video_size' => '4k',
                'rating' => true,
                'comments' => true,
                'upload_download' => true,
                'support' => true
            ]
        ];

        Plan::create($freePlan);
        Plan::create($premiumPlan);
    }
}
