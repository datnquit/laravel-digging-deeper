<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function post() {
        return $this->hasOne(Post::class);
    }
}
