<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'title' => 'Safe Dispensing Practices for Community Pharmacists',
                'slug' => Str::slug('Safe Dispensing Practices for Community Pharmacists'),
                'image' => 'courses/1.png',
                'description' => 'This course trains diploma pharmacists on correct medication dispensing procedures, labeling, patient counseling, and error prevention techniques. It includes real-life case studies and practical guidelines to reduce dispensing mistakes. Designed especially for retail and rural pharmacists, this training strengthens safety and accuracy in daily pharmaceutical practice.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Pharmacy Law and Ethics in Bangladesh Healthcare System',
                'slug' => Str::slug('Pharmacy Law and Ethics in Bangladesh Healthcare System'),
                'image' => 'courses/2.png',
                'description' => 'Learn about the Pharmacy Act, drug policies, and ethical responsibilities in pharmaceutical practice. This course helps pharmacists understand legal boundaries, licensing, and ethical dilemmas they may face. BDMPPA aims to create a legally aware and ethically strong pharmacist community through this program.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Antibiotic Stewardship and Rational Drug Use',
                'slug' => Str::slug('Antibiotic Stewardship and Rational Drug Use'),
                'image' => 'courses/3.png',
                'description' => 'A specialized course that promotes the responsible use of antibiotics to prevent resistance. Pharmacists will learn how to counsel patients, verify prescriptions, and work with physicians to ensure rational drug use. Supported by WHO guidelines and BDMPPA recommendations.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Essential Pharmacology for Diploma Pharmacists',
                'slug' => Str::slug('Essential Pharmacology for Diploma Pharmacists'),
                'image' => 'courses/4.png',
                'description' => 'This refresher course covers drug classifications, mechanisms of action, and side effects of commonly used medications in Bangladesh. Ideal for practicing pharmacists needing updated knowledge to ensure safe and effective patient care, especially in rural or low-resource settings.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Inventory Management & Record Keeping for Pharmacies',
                'slug' => Str::slug('Inventory Management & Record Keeping for Pharmacies'),
                'image' => 'courses/5.png',
                'description' => 'Learn how to manage medicine stock efficiently, avoid expiries, and maintain digital or manual pharmacy records. This course is essential for pharmacy owners and operators seeking to streamline operations and improve accountability.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'First Aid and Emergency Response Training for Pharmacists',
                'slug' => Str::slug('First Aid and Emergency Response Training for Pharmacists'),
                'image' => 'courses/6.png',
                'description' => 'Empower yourself with life-saving skills like CPR, wound management, and initial trauma care. This course is designed to help pharmacists provide essential first aid during emergencies when professional help isn’t immediately available, especially in rural or remote areas.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
