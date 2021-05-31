<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentationUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'representation_id',
        'places',
    ];

    public $timestamps = false;

    protected $table = 'representation_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representation()
    {
        return $this->belongsTo(Representation::class);
    }
}
