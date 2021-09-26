<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment', 'image'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function scopeRecommend($query){
        // ランダムに３つの投稿を取得
        return $query->inRandomOrder()->limit(3);
    }

}
