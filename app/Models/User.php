<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
//    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IIN', 'first_name', 'middle_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Administrator operations access
     *
     * @return bool
     */
    public function accessAdministration()
    {
        return $this->role->slug === 'admin';
    }

    /**
     * Administrator and moderator operations access
     *
     * @return bool
     */
    public function accessModeration()
    {
        return $this->role->slug !== 'user';
    }

    public function getFullNameLong()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function getMiddleNameShort()
    {
        return mb_substr($this->middle_name, 0, 1);
    }

    public function getLastNameShort()
    {
        return mb_substr($this->last_name, 0, 1);
    }

    public function getFullNameShort()
    {
        return $this->getLastNameShort() ?
            "{$this->first_name} {$this->getMiddleNameShort()}.{$this->getLastNameShort()}." :
            "{$this->first_name} {$this->getMiddleNameShort()}.";
    }
}
