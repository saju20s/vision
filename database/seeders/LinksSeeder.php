<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('links')->insert([
            [
                'title' => 'District Committees',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/1.png',
                'position' => 'footer',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Membership',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/2.png',
                'position' => 'footer',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'CEO’s Message',
                'link' => 'https://bdmppa.org/',
               'image' => 'links/3.png',
                'position' => 'footer',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Events & Seminars',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/4.png',
                'position' => 'footer',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Pharmacist Directory',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/5.png',
                'position' => 'right',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'District Committees',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/6.png',
                'position' => 'right',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Accident & Emergency',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/1.png',
                'position' => 'right',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Achievement & Success',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/2.png',
                'position' => 'right',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Membership',
                'link' => 'http://127.0.0.1:8000/course',
                'image' => 'links/3.png',
                'position' => 'footer',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Courses & Training',
                'link' => 'http://127.0.0.1:8000/gallary',
                'image' => 'links/4.png',
                'position' => 'footer',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Events & Seminars',
                'link' => '/',
                'image' => 'links/5.png',
                'position' => 'left',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'News & Notices',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/6.png',
                'position' => 'left',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'CEO’s Message',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/1.png',
                'position' => 'left',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'President’s Message',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/2.png',
                'position' => 'left',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'Executive Committee',
                'link' => 'https://bdmppa.org/',
                'image' => 'links/3.png',
                'position' => 'left',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ]);
    }
}
