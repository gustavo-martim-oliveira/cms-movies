<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start' => 'timestamp',
        'end' => 'timestamp'
    ];

    public function details(){
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
