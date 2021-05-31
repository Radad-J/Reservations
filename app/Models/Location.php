<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'designation',
        'address',
        'locality_id',
        'website',
        'phone',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';


    /**
     * Get the locality of the location
     */
    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    /**
     * Get the show for the location.
     */
    public function shows()
    {
        return $this->hasMany(Show::class);
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }

}
