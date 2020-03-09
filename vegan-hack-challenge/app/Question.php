<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    protected $fillable = ['question'];

    public function answers() {
        return $this->hasMany('App\Answer');
    }
}
