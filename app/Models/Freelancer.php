<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',
        'name', 'country', 'phone', 'job_field', 'education', 'notable_projects',
        'job_skills','yearsinindustry', 'about', 'profile_pic',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bids()
{
    return $this->hasMany(Bid::class);
}
public function jobs()
    {
        return $this->belongsToMany(Job::class, 'bids', 'freelancer_id', 'job_id');
    }
}
