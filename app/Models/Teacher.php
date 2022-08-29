<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasTranslations;
    protected $table = 'teachers';
    public $translatable = ['name'];
    public $guarded = [];
    public $fillable = ['photo'];


    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'specialization_id');
    }

    // Relationship between teachers and species to bring the gender of the teacher
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // Teachers' relationship with the departments
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }

    // Teachers' relationship with Image
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}