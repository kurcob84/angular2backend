<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageSkill extends Model 
{

    protected $table = 'language_skill';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function applicantLanguage()
    {
        return $this->hasOne('ApplicantLanguage');
    }

}