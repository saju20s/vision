<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commanders')->insert([
            [
                'name' => 'Shariful Islam',
                'designation' => 'President',
                'address' => 'Dhaka, Bangladesh',
                'message' => 'CEO Message Dear Members, Colleagues, and Visitors, It is my great pleasure to welcome you to the official website of the Bangladesh Diploma Medical Practitioner Association (BDMPPA). As an organization representing thousands of dedicated and skilled diploma medical pharmacists across the country, BDMPPA is committed to upholding professional standards, ensuring ethical practices, and strengthening the role of pharmacists in Bangladesh’s healthcare system. In today’s rapidly evolving medical landscape, our responsibilities are greater than ever. From ensuring the safe dispensing of medications to playing an active role in patient care and public health, diploma medical pharmacists are vital pillars of the nation’s health infrastructure. Our mission is to unite, educate, and empower our members through structured training, nationwide networking, awareness campaigns, and professional development opportunities. This digital platform serves as a hub for our initiatives, updates, and member services — promoting transparency, accessibility, and collaboration. I invite all pharmacists, healthcare professionals, and stakeholders to actively engage with BDMPPA, contribute your knowledge, and help us build a more robust and reliable healthcare future. Thank you for your trust, dedication, and continued support. Warm regards, 
                [Your Name]
                Chief Executive Officer (CEO)
                BDMPPA',
                'image' => 'commanders/1.jpg', 
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
