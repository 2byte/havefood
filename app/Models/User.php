<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends BaseAuthenticatableModel
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
    
    const MORPH = 'user';
    
    public function options()
    {
      return $this->hasMany(GoodsOption::class)->whereNull('parent_id');
    }
    
    public static function getList($countResult = 15) 
    {
      $queryUsers = static::query();
      
      $queryUsers->orderBy('id', 'desc');
      
      $users = $queryUsers->paginate($countResult);
      
      return $users;
    }
}
