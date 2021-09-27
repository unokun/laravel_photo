<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //リレーションを設定
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
      }
   
      public function likePosts(){
        return $this->belongsToMany('App\Models\Post', 'likes');
      }

    public function scopeRecommend($query, $self_id){
        return $query->where('id', '!=', $self_id)->latest()->limit(3);
    }

    public function follows(){
        return $this->hasMany('App\Models\Follow');
    }
 
    public function follow_users(){
      return $this->belongsToMany('App\Models\User', 'follows', 'user_id', 'follow_id');
    }
 
    public function followers(){
      return $this->belongsToMany('App\Models\User', 'follows', 'follow_id', 'user_id');
    }
    public function isFollowing($user){
        $result = $this->follow_users->pluck('id')->contains($user->id);
        return $result;
    }
}
