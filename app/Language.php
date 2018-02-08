<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model 
{

    protected $table = 'language';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function applicant()
    {
        return $this->hasMany('Applicant');
    }

    public function job()
    {
        return $this->hasMany('Job');
    }

}