<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['id_siswa','point_awal','point_tdk','point_akhir','penilai','jenis'];
    protected $visible = ['id_siswa','point_awal','point_tdk','point_akhir','penilai','jenis'];
    public $timestamps = true;}
