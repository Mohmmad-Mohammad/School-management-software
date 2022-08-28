<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyParent extends Authenticatable
{
    use HasTranslations;
    public $translatable = ['name_father','job_father','name_mother','job_mother'];
    protected $table = 'myparents';
    protected $guarded=[];


    public function imageable()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}