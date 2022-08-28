<?php

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('myparents')->delete();
        $my_parents = new MyParent();
        $my_parents->email = 'mohammad.mohammad@yahoo.com';
        $my_parents->password = Hash::make('12345678');
        $my_parents->name_father = ['en' => 'yusef', 'ar' => ' يوسف'];
        $my_parents->national_ID_father = '1234567810';
        $my_parents->passport_ID_father = '1234567810';
        $my_parents->phone_father = '1234567810';
        $my_parents->job_father = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->nationality_father_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->blood_type_father_id =Type_Blood::all()->unique()->random()->id;
        $my_parents->religion_father_id = Religion::all()->unique()->random()->id;
        $my_parents->address_father ='سوريا';
        $my_parents->name_mother = ['en' => 'SS', 'ar' => 'خيرية'];
        $my_parents->national_ID_mother = '1234567810';
        $my_parents->passport_ID_mother = '1234567810';
        $my_parents->phone_mother = '1234567810';
        $my_parents->job_mother = ['en' => 'Teacher', 'ar' => 'معلمة'];
        $my_parents->nationality_mother_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->blood_type_mother_id =Type_Blood::all()->unique()->random()->id;
        $my_parents->religion_mother_id = Religion::all()->unique()->random()->id;
        $my_parents->address_mother ='سوريا';
        $my_parents->save();

}
    }