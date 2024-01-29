<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'rating',
        'comment',
        'reviewer_id',
        'reviewee_id',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    // Define relationship for the reviewee (user who received the review)
    public function reviewee()
    {
        return $this->belongsTo(User::class, 'reviewee_id');
    }
}
