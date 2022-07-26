<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'رياضيات'],
            ['en'=> 'Informative', 'ar'=> 'معلوماتية '],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'French', 'ar'=> 'فرنسي'],
            ['en'=> 'Chemistry', 'ar'=> 'كيمياء'],
            ['en'=> 'Physics', 'ar'=> 'فيزياء'],
            ['en'=> 'Geography', 'ar'=> 'جغرافيا'],
            ['en'=> 'Nationalism', 'ar'=> 'قومية'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
