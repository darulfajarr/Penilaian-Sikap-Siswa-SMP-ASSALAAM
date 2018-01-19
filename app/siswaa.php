<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswaa extends Model
{
	protected $fillable = ['nis', 'nama','kelas','jenis_kelamin','point'];
    protected $visible = ['nis', 'nama','kelas','jenis_kelamin','point'];
    public $timestamps = true;
  
}

