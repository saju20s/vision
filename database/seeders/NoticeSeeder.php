<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Alert: Beware of Fake Associations',
                'description' => '<p>BDMPPA is a non-political, non-profit association committed to the advancement of diploma medical pharmacists across Bangladesh. Our goal is to empower professionals, uphold ethical standards, and strengthen the healthcare system. We believe that pharmacists are a vital part of primary healthcare, and we work to ensure they receive proper recognition, training, and representation in health policy. Through awareness, leadership, and nationwide networking, BDMPPA stands as a united platform for change and development. Every member is encouraged to actively participate and contribute to our mission of building a healthier Bangladesh through competent pharmacy services.</p>',
                'image' => 'notices/1.jpg',
                'file' => null,
                'authority' => 'Sharif',
                'type' => 'notice',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Mission & Vision',
                'description' => '<p>Our mission is to protect, develop, and promote the rights and dignity of diploma pharmacists. BDMPPA envisions a healthcare system where pharmacists are fully integrated into decision-making, public health programs, and medical teams. We seek to create sustainable career opportunities and raise awareness of pharmacists’ roles in medicine management, patient education, and ethical practice. Our vision includes legal recognition, policy inclusion, and standardized education reforms to strengthen the pharmacy profession nationwide. Together, we can ensure every pharmacist is empowered to contribute meaningfully to Bangladesh’s health and wellness landscape.</p>',
                'image' => 'notices/1.gif',
                'file' => null,
                'authority' => 'Sharif',
                'type' => 'notice',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Inventory Management & Record Keeping for Pharmacies',
                'description' => '<p>Learn how to manage medicine stock efficiently, avoid expiries, and maintain digital or manual pharmacy records. This course is essential for pharmacy owners and operators seeking to streamline operations and improve accountability.</p>',
                'image' => 'notices/1.jpg',
                'file' => null,
                'authority' => 'Sharif',
                'type' => 'notice',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Antibiotic Stewardship and Rational Drug Use',
                'description' => '<p>A specialized course that promotes the responsible use of antibiotics to prevent resistance. Pharmacists will learn how to counsel patients, verify prescriptions, and work with physicians to ensure rational drug use. Supported by WHO guidelines and BDMPPA recommendations.</p>',
                'image' => null,
                'file' => 'notices/1.jpg',
                'authority' => 'Sharif',
                'type' => 'notice',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Pharmacy Law and Ethics in Bangladesh Healthcare System',
                'description' => '<p>Learn about the Pharmacy Act, drug policies, and ethical responsibilities in pharmaceutical practice. This course helps pharmacists understand legal boundaries, licensing, and ethical dilemmas they may face. BDMPPA aims to create a legally aware and ethically strong pharmacist community through this program.</p>',
                'image' => null,
                'file' => 'notices/1.pdf',
                'authority' => 'Sura',
                'type' => 'apa',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Essential Pharmacology for Diploma Pharmacists',
                'description' => '<p>This refresher course covers drug classifications, mechanisms of action, and side effects of commonly used medications in Bangladesh. Ideal for practicing pharmacists needing updated knowledge to ensure safe and effective patient care, especially in rural or low-resource settings.</p>',
                'image' => null,
                'file' => 'notices/1.pdf',
                'authority' => 'Sura',
                'type' => 'noc',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        foreach ($data as $notice) {
            DB::table('notices')->insert($notice);
        }
    }
}
