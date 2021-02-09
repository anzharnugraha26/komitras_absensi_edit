<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table ='artikel';

    public function user()
    {
    return $this->belongsTo(User::class);
}

    
}

