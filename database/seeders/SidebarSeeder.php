<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Event & Seminar Portal',
                'link' => 'https://demo.bdmppa.org',
                'phone' => '017xxxxxxxx',
                'email' => 'event@bdmppa.org',
                'image' => 'settings/1.png',
                'bg_one' => '#004080',
                'bg_two' => '#0073e6',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],            
            [
                'title' => 'Pharmacy Laws & Ethics',
                'link' => 'https://demo.bdmppa.org',
                'phone' => '017xxxxxxxx',
                'email' => 'event@bdmppa.org',
                'image' => 'settings/2.png',
                'bg_one' => '#04ae9a',
                'bg_two' => '#bccdc9',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],            
            [
                'title' => 'Notice Board',
                'link' => 'https://demo.bdmppa.org',
                'phone' => '+8801300-444555',
                'email' => 'notice@bdmppa.org',
                'image' => 'settings/3.png',
                'bg_one' => '#06ac64',
                'bg_two' => '#b5480d',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],            
            [
                'title' => 'Training & CPD Unit',
                'link' => 'https://demo.bdmppa.org',
                'phone' => '+8801300-333444',
                'email' => 'training@bdmppa.org',
                'image' => 'settings/4.png',
                'bg_one' => '#af0e0e',
                'bg_two' => '#2e1919',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],            
            [
                'title' => 'Membership Registration',
                'link' => 'https://demo.bdmppa.org',
                'phone' => '+8801300-222333',
                'email' => 'membership@bdmppa.org',
                'image' => 'settings/1.png',
                'bg_one' => '#0007b5',
                'bg_two' => '#0e6fff',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],            
            [
                'title' => 'Central Office',
                'link' => 'https://demo.bdmppa.org',
                'phone' => '+8801300-111222',
                'email' => 'info@bdmppa.org',
                'image' => 'settings/2.png',
                'bg_one' => '#0050b3',
                'bg_two' => '#bccdc9',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],            
        ];

        DB::table('sidebars')->insert($data);
    }
}
