<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobrole extends Model 
{

    protected $table = 'jobrole';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function applicant()
    {
        return $this->hasMany('Applicant');
    }

}