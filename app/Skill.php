<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model 
{

    protected $table = 'skill';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function applicant()
    {
        return $this->hasMany('Applicant')->withPivot('applicant_skill');
    }

    public function experience()
    {
        return $this->hasMany('Experience');
    }

    public function company()
    {
        return $this->hasMany('Company');
    }

    public function job()
    {
        return $this->hasMany('Job');
    }

}