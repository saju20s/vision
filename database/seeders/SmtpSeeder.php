<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smtps')->insert([
            'mail_mailer'   => 'smtp',
            'mail_host'     => 'smtp@gmail.com',
            'mail_port'     => 465,
            'mail_username' => 'demo@username',
            'mail_password' => 'xxxxxxxxxxxxx',
            'mail_encryption' => 'ssl',
            'mail_address'  => 'demo@gmail.com',
            'mail_from_name'  => 'BDMPPA',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
