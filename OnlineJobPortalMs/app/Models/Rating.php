<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'user_id', 'rating'];


    // ---------Many to Many Relationship--------------------
    public function ratings()
    {
        return $this->belongsToMany(Rating::class);
    }


}
