<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['username', 'nickname', 'avatar', 'bio'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
