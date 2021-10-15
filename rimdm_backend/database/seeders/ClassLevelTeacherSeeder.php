<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ClassLevelTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++)
        {
            DB::table('class_level_teacher')->insert([
                'class_level_id' => $i,
                'teacher_id' => $i,
            ]);
        }
    }
}
