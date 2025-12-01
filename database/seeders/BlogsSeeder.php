<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'title' => 'The Role of Diploma Pharmacists in Strengthening Bangladesh Healthcare System',
                'slug' => 'the-role-diploma-pharmacists-strengthening-bangladesh-healthcare',
                'description' => '<p>Diploma medical pharmacists play a vital role in ensuring safe medication practices and accessible healthcare across Bangladesh. This blog explores how their community outreach, clinical services, and pharmaceutical knowledge help bridge the healthcare gap, especially in rural areas. BDMPPA continues to advocate for improved recognition, training, and integration of diploma pharmacists into national health policy, creating a healthier, more sustainable future for all citizens.</p>',
                'image' => 'blogs/1.png',                
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA Launches Nationwide Training for Safe Dispensing Practices',
                'slug' => 'bdmppa-launches-nationwide-training-for-safe-dispensing-practices',
                'description' => '<p>To raise awareness and enhance the quality of pharmaceutical services, BDMPPA has initiated a training campaign for diploma pharmacists across districts. The program includes modules on proper drug handling, patient counseling, and legal compliance. Participants gain CPD certification upon completion. This move is part of BDMPPA’s ongoing mission to upgrade healthcare standards and equip pharmacists with tools for ethical and professional growth.</p>',
                'image' => 'blogs/2.png',                
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Why Diploma Pharmacists Are Essential in Rural Health Outreach Programs',
                'slug' => 'why-diploma-pharmacists-are-essential-in-rural-health-outreach-programs',
                'description' => '<p>In many underserved rural areas of Bangladesh, diploma pharmacists serve as the first point of contact for patients. This blog highlights their significance in managing chronic diseases, advising on over-the-counter medications, and ensuring rational drug use. BDMPPA continues to support their efforts with resources, policy advocacy, and capacity-building initiatives.</p>',
                'image' => 'blogs/3.png',                
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Highlights from the BDMPPA Annual General Meeting 2025',
                'slug' => 'highlights-from-the-bdmppa-annual-general-meeting-2025',
                'description' => '<p>The BDMPPA AGM 2025 brought together hundreds of pharmacists, policymakers, and stakeholders to discuss the future of diploma pharmacists in Bangladesh. Key topics included digital transformation, updated licensing processes, member welfare, and district-level committee elections. The event marked another step forward in unifying voices for better health outcomes nationwide.</p>',
                'image' => 'blogs/4.gif',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Digital Health & The Emerging Role of Pharmacists in Bangladesh',
                'slug' => 'digital-health-emerging-role-of-pharmacists-in-bangladesh',
                'description' => '<p>As Bangladesh moves towards eHealth solutions, diploma pharmacists are evolving too. From telepharmacy to digital prescriptions, this blog explores the exciting ways pharmacists are integrating into the digital health ecosystem. BDMPPA is working to ensure its members are ready with the necessary tools and training to adapt.</p>',
                'image' => 'blogs/5.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA’s Contribution to COVID-19 Response and Recovery',
                'slug' => 'bdmppa-contribution-to-covid-19-response-and-recovery',
                'description' => '<p>During the COVID-19 crisis, BDMPPA pharmacists were on the frontlines—distributing medicines, educating communities, and fighting misinformation. This article looks back at their contributions, challenges faced, and lessons learned. The Association continues to support pandemic recovery through policy engagement and pharmacist mental health awareness.</p>',
                'image' => 'blogs/6.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Safe Medication Storage: BDMPPA Awareness Campaign in Local Clinics',
                'slug' => 'safe-medication-storage-bdmppa-awareness-campaign-in-local-clinics',
                'description' => '<p>Improper medicine storage can reduce effectiveness or cause harm. BDMPPA recently ran awareness drives in clinics and pharmacies to teach best practices in storing, labeling, and handling drugs. The campaign helped raise community trust and enhanced the role of pharmacists in safe healthcare delivery.</p>',
                'image' => 'blogs/7.gif',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Becoming a Member of BDMPPA – Benefits & Process',
                'slug' => 'becoming-a-member-of-bdmppa-benefits-and-process',
                'description' => '<p>Joining BDMPPA opens the door to professional development, exclusive training, networking, and recognition. This blog outlines the step-by-step registration process, eligibility criteria, and what members gain—such as ID cards, event access, and vote rights in committee elections. BDMPPA stands for unity, strength, and progress.</p>',
                'image' => 'blogs/1.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Pharmacy Ethics: A Guide for Diploma Pharmacists in Bangladesh',
                'slug' => 'pharmacy-ethics-guide-for-diploma-pharmacists-in-bangladesh',
                'description' => '<p>This blog covers key ethical principles pharmacists should follow, including patient confidentiality, rational drug use, and non-commercial prescribing. It includes practical examples and references from Bangladesh Pharmacy Council guidelines. BDMPPA is committed to promoting an ethical culture among all practicing pharmacists.</p>',
                'image' => 'blogs/2.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Women in Pharmacy: Empowering Female Diploma Pharmacists',
                'slug' => 'women-in-pharmacy-empowering-female-diploma-pharmacists',
                'description' => '<p>More women are entering the pharmacy profession in Bangladesh than ever before. BDMPPA celebrates their contributions and encourages equal participation in leadership roles. This article shares inspiring stories and outlines how the Association supports women’s professional growth and safety in the workplace.</p>',
                'image' => 'blogs/3.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Understanding the Pharmacy Act: What Every Pharmacist Should Know',
                'slug' => 'understanding-the-pharmacy-act-what-every-pharmacist-should-know',
                'description' => '<p>Many pharmacists remain unaware of legal responsibilities outlined in the Pharmacy Act of Bangladesh. This blog simplifies key sections related to licensing, registration, and code of conduct, ensuring diploma pharmacists stay informed and compliant. BDMPPA also provides legal aid and seminars to support members.</p>',
                'image' => 'blogs/4.gif',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Success Stories: Diploma Pharmacists Making a National Impac',
                'slug' => 'success-stories-diploma-pharmacists-making-a-national-impact',
                'description' => '<p>From district hospitals to remote clinics, diploma pharmacists are transforming lives. This blog showcases stories of individual BDMPPA members who’ve gone above and beyond—organizing free medical camps, innovating digital health tools, and training youth. These stories inspire pride and purpose in the profession.</p>',
                'image' => 'blogs/5.png',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
