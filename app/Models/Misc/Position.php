<?php

namespace App\Models\Misc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model {

    protected $table = 'position';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function company() {
        return $this->hasMany('Company');
    }

}
