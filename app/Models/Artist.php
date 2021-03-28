<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname'];
    protected $table = 'artists';
    public $timestamps = false;

    /**
     * The types that belong to the artist.
     */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
