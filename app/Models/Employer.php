<?php

// app/Models/Employer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'country',
        'years_in_industry',
        'about',
        'freelancers_collaborated',
        'profile_pic'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobs()
{
    return $this->hasMany(Job::class);
}
}
