<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopefindPosts($query, $find) {

    if($find) {
        return $query->where('title','like',"%$find%")->orWhere('post','like',"%$find%");
    } else {
        return $query;
    }
    }

}
