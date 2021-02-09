<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aboutme extends Model
{
    
    protected $table = 'aboutme' ;
    protected $fillable = ['user_id','education','skill','notes'];

}
