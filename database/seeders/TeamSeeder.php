<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Shariful Islam',
                'designation' => 'President',
                'phone' => '+8801711-123456',
                'email' => 'shariful.bd@bdmppa.org',
                'image' => 'teams/4.png',
                'reg_id' => 'DMPPA-0001',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name' => 'Jahidul Islam',
                'designation' => 'Joint Secretary',
                'phone' => '+8801913-456789',
                'email' => 'jahidul.treasury@bdmppa.org',
                'image' => 'teams/2.png',
                'reg_id' => 'DMPPA-0001',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name' => 'Nazmul Huda',
                'designation' => 'General Secretary',
                'phone' => '+8801711-123456',
                'email' => 'nazmul.huda@bdmppa.org',
                'image' => 'teams/3.png',
                'reg_id' => 'DMPPA-0001',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name' => 'Sultana Parvin',
                'designation' => 'Vice President',
                'phone' => '+8801711-123456',
                'email' => 'sultana.parvin@bdmppa.org',
                'image' => 'teams/1.jpg',
                'reg_id' => 'DMPPA-0001',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('teams')->insert($data);
    }
}
