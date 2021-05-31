<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'postal_code',
        'locality'
    ];

    /**
     * Get the locations for the locality.
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

}
