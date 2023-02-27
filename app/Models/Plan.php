<?php

namespace App\Models;

use App\Models\UserPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'configuration' => 'json'
    ];

    public function users(){
        return $this->hasMany(UserPlan::class);
    }
}
