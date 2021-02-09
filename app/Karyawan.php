<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table ='karyawan';
    protected $fillable =['nama_lengkap','tanggallahir','tanggalmasuk','nik','divisi','nama_divisi','email','jenis_kelamin','alamat','avatar','user_id'];

    public function user()
    {
    	return $this->belongsTo('App/user');
    }
    public function absen ()
    {
        return $this->hasMany('App/Absen');
    }


}
