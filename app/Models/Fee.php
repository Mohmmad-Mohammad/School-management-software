<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasTranslations;
    public $translatable = ['title'];
    protected $fillable=['title','amount','grade_id','classroom_id','year','description','fee_type'];


    // Relationship between tuition fees and academic stages for the name of the stage
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    // Relationship between classes and tuition fees for JP name
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
}