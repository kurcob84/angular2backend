<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model 
{

    protected $table = 'experience';
    public $timestamps = true;

    public function skill()
    {
        return $this->belongsToMany('Skill');
    }

    public function applicant()
    {
        return $this->hasMany('Applicant');
    }

}