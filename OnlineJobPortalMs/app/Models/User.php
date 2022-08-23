<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use App\Models\Company;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'fb_id',
        'google_id'
    ];
    protected $dates = ['deleted_at'];

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


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    // ---------Many to Many Relationship--------------------
    public function favourites()
    {
        return $this->belongsToMany(Job::class, 'favourites', 'user_id', 'job_id')->withTimeStamps();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    // ---------Many to Many Relationship--------------------
    public function ratings()
    {
        return $this->belongsToMany(Rating::class);
    }


}
