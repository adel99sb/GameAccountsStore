<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachingOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'employee_id', 'game_name', 'platform', 'region', 
        'number_of_hours', 'is_streaming', 'is_solo', 'price', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
