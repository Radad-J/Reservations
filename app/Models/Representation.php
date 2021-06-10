<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'when',
        'location_id'
    ] ;

    protected $table = 'representations';

    public  $timestamps = false;

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function users () {
        return $this->belongsToMany(User::class);
    }

    /**
     * getRepresentationInfo method.
     * Retrieves infos of a representation
     * @param int $id The representation's id
     * @return Collection
     */
    public static function getRepresentationInfo(int $id): Collection
    {
        return DB::table('representations')
            ->join('locations', 'location_id', '=', 'locations.id')
            ->select('representations.when', 'locations.designation')
            ->where('representations.id', '=', $id)
            ->get();
    }

    /**
     * getDateAndTime method.
     * Formats the date & time of a representation
     * @param string $str
     * @return array
     */
    public static function getDateAndTime(string $str): array
    {
        $date = Carbon::parse($str)->format('d/m/Y');
        $time = Carbon::parse($str)->format('G:i');

        return [
            'date' => $date,
            'time' => $time
        ];
    }
}
