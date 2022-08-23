<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'title', 'slug', 'description', 'roles', 'category_id', 'position', 'address', 'state', 'type', 'experience', 'qualification', 'number_of_vacancy', 'salary', 'status', 'last_date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // ---------Many to Many Relationship--------------------
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    //--Check the job_user table and see if the currently loggedIn user_id
    //--and the currently viewed---job_id exist in that table.
    public function checkApplication()
    {
        return \DB::table('job_user')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }


    // ---------Many to Many Relationship--------------------
    public function favourites()
    {
        return $this->belongsToMany(Job::class, 'favourites', 'job_id', 'user_id')->withTimeStamps();
    }

    public function add_favorites_to_interraction()
    {
        return $this->belongsToMany(Job::class, 'job_user_interraction', 'job_id', 'user_id')->withTimeStamps();
    }

    //check id job already saved
    public function checkSaved()
    {
        return \DB::table('favourites')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }

    // ---------Many to Many Relationship--------------------
    public function job_user_action()
    {
        return $this->belongsToMany(Job::class, 'job_user_action', 'job_id', 'user_id')->withTimeStamps();
    }

    //check if job already saved
    public function checkViewed()
    {
        return \DB::table('job_user_action')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }

    public function checkFavorited()
    {
        return \DB::table('job_user_interraction')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->where('eventType', 'FAVOURITED')->exists();
    }


}
