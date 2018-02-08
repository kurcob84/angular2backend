<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model 
{

    protected $table = 'company';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = array('password');

    public function benefit()
    {
        return $this->belongsToMany('Benefit');
    }

    public function skill()
    {
        return $this->belongsToMany('Skill');
    }

    public function position()
    {
        return $this->belongsToMany('Position');
    }

    public function city()
    {
        return $this->belongsToMany('City');
    }

    public function role()
    {
        return $this->belongsTo('Role');
    }

    public function job()
    {
        return $this->hasMany('Job');
    }

}