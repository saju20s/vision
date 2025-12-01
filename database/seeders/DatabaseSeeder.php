<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
            BlogsSeeder::class,
            CommandersSeeder::class,
            CourseSeeder::class,
            NoticeSeeder::class,
            PagesSeeder::class,
            SettingsSeeder::class,
            SidebarSeeder::class,
            SlidersSeeder::class,
            TeamSeeder::class,
            VideosSeeder::class,
            LinksSeeder::class,
            SmtpSeeder::class,
            DemoRolePermissionSeeder::class,
        ]);
    }
}
