<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Show extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'poster_url', 'bookable', 'price'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shows';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the locality of the location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the representations of the location
     */
    public function representations()
    {
        return $this->hasMany(Representation::class);
    }

    /**
     * Get the performance (artist in a type of collaboration) for the show
     */
    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class);
    }

    /**
     * getShows method.
     * Retrieves all Shows present in the table.
     * @return array
     */
    public static function getShows(): array
    {
        return DB::table('shows')
            ->select('title', 'description', 'price')
            ->get()
            ->toArray();
    }

}
