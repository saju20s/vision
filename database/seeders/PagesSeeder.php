<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Mission & Vision',
                'description' => '<p>Our mission is to protect, develop, and promote the rights and dignity of diploma pharmacists. BDMPPA envisions a healthcare system where pharmacists are fully integrated into decision-making, public health programs, and medical teams. We seek to create sustainable career opportunities and raise awareness of pharmacists’ roles in medicine management, patient education, and ethical practice. Our vision includes legal recognition, policy inclusion, and standardized education reforms to strengthen the pharmacy profession nationwide. Together, we can ensure every pharmacist is empowered to contribute meaningfully to Bangladesh’s health and wellness landscape.</p>',
                'slug' => Str::slug('Mission & Vision'),
                'image' => 'pages/1.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Executive Committee',
                'description' => '<p>The BDMPPA Executive Committee is elected to lead and guide the association at the national level. It consists of experienced pharmacists, educators, and organizers who are committed to the development of our community. The committee is responsible for policy decisions, member welfare, national conferences, and collaboration with government agencies. With transparent governance and collective leadership, the committee ensures that all voices are heard and all members benefit. Meet our dedicated leaders who are shaping the future of diploma pharmacists in Bangladesh through integrity, responsibility, and service.</p>',
                'image' => 'pages/2.png',
                'slug' => Str::slug('Executive Committee'),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'About BDMPPA',
                'description' => '<p>BDMPPA is a non-political, non-profit association committed to the advancement of diploma medical pharmacists across Bangladesh. Our goal is to empower professionals, uphold ethical standards, and strengthen the healthcare system. We believe that pharmacists are a vital part of primary healthcare, and we work to ensure they receive proper recognition, training, and representation in health policy. Through awareness, leadership, and nationwide networking, BDMPPA stands as a united platform for change and development. Every member is encouraged to actively participate and contribute to our mission of building a healthier Bangladesh through competent pharmacy services.</p>',
                'image' => 'pages/2.png',
                'slug' => Str::slug('About BDMPPA'),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('pages')->insert($data);
    }
}
