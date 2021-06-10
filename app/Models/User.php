<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'language',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function roles () {
        return $this->belongsToMany(Role::class);
    }*/

    public function representation()
    {
        return $this->belongsToMany(Representation::class);
    }

    /**
     * checkModifiedFields method.
     * Checks if at least one field has been sent with the request
     *
     * @param Request $request The request sent from the form
     * @return bool true if at least one field as been sent, false otherwise
     */
    public static function checkModifiedFields(Request $request): bool
    {
        return $request->filled('name')
            || $request->filled('email')
            || (($request->filled('password')) && $request->filled('confPassword'));
    }

    /**
     * checkPasswordValidity method.
     * Checks if the given password matches with the regex.
     *
     *  The password needs to have at least :
     *  8 Characters          => (?=\S{8,})
     *  1 lowercase character => (?=\S*[a-z])
     *  1 uppercase character => (?=\S*[A-Z])
     *  1 number              => (?=\S*[\d])
     *
     * @param $password
     * @return false|int false is the password doesn't meet the regex criteria, 1 otherwise
     */
    public static function checkPasswordValidity($password)
    {
        $regex = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";

        return (preg_match($regex, $password));
    }
}
