<?php

namespace App\Models;

use App\Models\UserPlan;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allPlans(){
        return $this->hasMany(UserPlan::class);
    }

    public function currentPlan() {

        if($this->role == 'admin') {
            return 'Administrador';
        }else{

            $hasPlan = UserPlan::where([['user_id', $this->id], ['active', true]])->orderBy('created_at', 'DESC');

            if($hasPlan->count() > 0){
                return $hasPlan->first();
            }

            return 'Nenhum plano';
        }

    }

    public function isAdmin() {
        if($this->role == 'admin') {
            return true;
        }
        return false;
    }
}
