<?php

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
        $this->call(UserSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitieTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SettingSeeder::class);
    }
}