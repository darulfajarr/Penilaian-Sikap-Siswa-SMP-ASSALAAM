<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketetapan extends Model
{
     protected $fillable = ['jenis','nama', 'point'];
    protected $visible = ['jenis','nama', 'point'];
    public $timestamps = true;
}
