<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'job_title',
        'job_description',
        'category',
        'budget_range',
        'deadline',
        'status',
        'post_status',

    ];
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function bids()
{
    return $this->hasMany(Bid::class);
}
public function freelancer()
{
    return $this->belongsTo(Freelancer::class);
}
    
    // Other model code
}