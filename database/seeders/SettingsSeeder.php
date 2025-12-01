<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'years' => '2030',
            'course' => '500',
            'students' => '100',
            'peoples' => '3000',
            'facebook' => 'https://facebook.com',
            'youtube' => 'https://youtube.com',
            'twitter' => '#',
            'linkedin' => 'https://linkedin.com',
            'logo' => 'settings/logo.png',
            'site_title' => 'BDMPPA - Bangladesh Diploma Medical Pharmacist Association',
            'site_url' => 'https://bdmppa.org',
            'description' => 'BDMPPA is the national platform for diploma pharmacists in Bangladesh.',
            'keyword' => 'BDMPPA, pharmacy, diploma, Bangladesh',
            'footer_text' => 'The official website of BDMPPA is a modern, professional digital platform designed to connect, represent, and empower diploma medical pharmacists across Bangladesh with updated info and services',
            'logotext' => 'BDMPPA',
            'favicon' => 'settings/favicon.png',
            'ftr_image' => 'settings/footer.png',
            'header_color' => '#2fa9ce',
            'header_text_color' => '#FFFFFF',
            'important_link' => 'https://bdmppa.org/important-links',
            'menu_color' => '#d11b70',
            'menu_text_color' => '#FFFFFF',
            'phone' => '017XXXXXXXX',
            'email' => 'shariful971@gmail.com',
            'cphone' => '018XXXXXXXX',
            'cemail' => 'contact@bdmppa.org',
            'address' => 'Dhaka, Bangladesh',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.111712623788!2d90.4211058743246!3d23.707704390416044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9b1a2cf9cf1%3A0x40c9c38899727082!2sAsgar%20Ali%20Medical%20College%20%26%20Hospital!5e0!3m2!1sen!2sbd!4v1754324252604!5m2!1sen!2sbd',
            'footer_color' => '#2fa9ce',
            'copyright_text' => 'All Rights Reserved © Sharif IT Firm 2025 Powered By Sharif',
            'copyright_color' => '#d11b70',
            'affidavit_one' => '<p>BDMPPA is a national platform dedicated to uniting, empowering, and uplifting diploma medical pharmacists across Bangladesh. We believe pharmacists are not just medicine dispensers, but key healthcare providers, especially in rural and underserved communities. Our mission is to ensure professional recognition, skill development, ethical practices, and policy advocacy for all members. Through collaboration, training, and leadership development, we aim to build a health system where every pharmacist plays an active and respected role. BDMPPA is committed to creating opportunities, strengthening healthcare delivery, and protecting the rights and dignity of diploma pharmacists in every corner of the country.</p>',
            'affidavit_two' => '<p>BDMPPA একটি জাতীয় প্ল্যাটফর্ম, যা বাংলাদেশের সকল ডিপ্লোমা মেডিকেল ফার্মাসিস্টকে ঐক্যবদ্ধ ও ক্ষমতায়িত করতে কাজ করে। আমরা বিশ্বাস করি, একজন ফার্মাসিস্ট শুধুমাত্র ওষুধ সরবরাহকারী নন—তিনি স্বাস্থ্যসেবার গুরুত্বপূর্ণ অংশীদার, বিশেষ করে প্রান্তিক ও গ্রামের জনগণের জন্য। আমাদের লক্ষ্য হল সদস্যদের পেশাগত স্বীকৃতি, দক্ষতা উন্নয়ন, নৈতিক অনুশীলন এবং নীতিগত অধিকার নিশ্চিত করা। প্রশিক্ষণ, নেতৃত্ব উন্নয়ন ও সহযোগিতার মাধ্যমে আমরা এমন একটি স্বাস্থ্যব্যবস্থা গড়ে তুলতে চাই যেখানে ফার্মাসিস্টরা সম্মানজনক ও কার্যকর ভূমিকা পালন করবেন।</p>',
            'sr' => 'shariful971@gmail.com',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
