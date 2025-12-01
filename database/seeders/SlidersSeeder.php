<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'BDMPPA – Building a Stronger Healthcare Future',
                'image' => 'sliders/1.png',
                'type' => 'home',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Bangladesh’s Voice for Diploma Medical Pharmacist',
                'image' => 'sliders/1.gif',
                'type' => 'home',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA Photo & Video Gallery',
                'image' => 'sliders/11.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'National Pharmacist Day 2024 was celebrated with pride and enthusiasm across all divisions, showcasing the dedication and unity of Diploma Medical Pharmacists in serving the healthcare sector of Bangladesh',
                'image' => 'sliders/12.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Glimpses of the BDMPPA Annual Conference 2025 held in Dhaka, featuring keynote speeches, member awards, and policy discussions aimed at strengthening pharmacist rights and roles nationwide.',
                'image' => 'sliders/1.png',
                'type' => 'home',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Training workshop on “Safe Dispensing Practices” conducted by BDMPPA in collaboration with healthcare experts, empowering young pharmacists through practical knowledge and skills development.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Training workshop on “Safe Dispensing Practices” conducted by BDMPPA in collaboration with healthcare experts, empowering young pharmacists through practical knowledge and skills development.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Training workshop on “Safe Dispensing Practices” conducted by BDMPPA in collaboration with healthcare experts, empowering young pharmacists through practical knowledge and skills development.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.',
                'image' => 'sliders/1.png',
                'type' => 'gallery',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('sliders')->insert($data);
    }
}
