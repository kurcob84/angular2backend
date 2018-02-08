<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model 
{

    protected $table = 'applicant';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = array('password');

    public function skill()
    {
        return $this->belongsToMany('Skill');
    }

    public function experience()
    {
        return $this->belongsToMany('Experience');
    }

    public function education()
    {
        return $this->belongsToMany('Education');
    }

    public function jobrole()
    {
        return $this->belongsToMany('Jobrole');
    }

    public function jobtype()
    {
        return $this->belongsToMany('Jobtype');
    }

    public function city()
    {
        return $this->belongsToMany('City');
    }

    public function language()
    {
        return $this->belongsToMany('Language');
    }

    public function role()
    {
        return $this->belongsTo('Role');
    }

}