<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'BDMPPA-1',
                'link' => 'https://www.youtube.com/embed/nFx-MoU0m8A?si=mTicboegvTuubJwR',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA-2',
                'link' => 'https://www.youtube.com/embed/AgZ4d2PrSRE?si=iRnHtE-iuoYH-jR3',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA-3',
                'link' => 'https://www.youtube.com/embed/gYiWI4n5dw8?si=cdK14d6wd17VxiqB',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA-4',
                'link' => 'https://www.youtube.com/embed/bJJQ8BCQoSM?si=477GAX8TkXHssIe-',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA-5',
                'link' => 'https://www.youtube.com/embed/zUlOc_sGBnk?si=3CepeIT_g71jHVtR',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title' => 'BDMPPA-6',
                'link' => 'https://www.youtube.com/embed/sEOVKoZM_uw?si=lKgRqqxLoNpi0KK3',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('videos')->insert($data);
    }
}
