<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    /**
     * The artists that are defined by the type.
     */
    public function artists()
    {
        return $this->belongsToMany('App\Artist');
    }

}
