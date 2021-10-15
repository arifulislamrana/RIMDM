<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            ClassLevelSeeder::class,
            UserSeeder::class,
            SubjectSeeder::class,
            ResultSeeder::class,
            RoleSeeder::class,
            TeacherSeeder::class,
            ClassLevelTeacherSeeder::class,
            NoticeSeeder::class
        ]);
    }
}
