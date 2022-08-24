<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'A', 'ar' => 'ا'],
            ['en' => 'B', 'ar' => 'ب'],
            ['en' => 'C', 'ar' => 'ت'],
        ];
        foreach ($Sections as $section) {
            Section::create([
                'name_section' => $section,
                'status' => 1,
                'grade_id' => Grade::all()->unique()->random()->id,
                'class_id' => Classroom::all()->unique()->random()->id
            ]);
        }
    }
}