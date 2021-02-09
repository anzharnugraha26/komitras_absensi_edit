<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table ='divisi';
    protected $fillable =['kode','nama_divisi','jumlah'];

}
