<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model 
{

    protected $table = 'city';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function applicant()
    {
        return $this->hasMany('Applicant');
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