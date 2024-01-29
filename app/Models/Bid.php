<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

   
        protected $fillable = [
            'freelancer_id',
            'job_id',
            'price', // Add this line to allow mass assignment for the 'price' field
            'date',
            'note',
            'status'
        ];


    public function freelancer()
{
    return $this->belongsTo(Freelancer::class);
}

public function job()
{
    return $this->belongsTo(Job::class);
}
}
