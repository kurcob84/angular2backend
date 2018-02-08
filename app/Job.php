<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model 
{

    protected $table = 'job';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function skill()
    {
        return $this->belongsToMany('Skill');
    }

    public function city()
    {
        return $this->belongsToMany('City');
    }

    public function jobtype()
    {
        return $this->belongsToMany('Jobtype');
    }

    public function language()
    {
        return $this->belongsToMany('Language');
    }

}