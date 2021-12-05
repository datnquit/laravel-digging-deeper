<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'gender',
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

    public function avatar()
    {
//        return $this->hasOne('App\Models\Avatar');
//        return $this->hasOne(Avatar::class);
        return $this->hasOne(Avatar::class, 'user_id', 'id');

    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function newPost()
    {
        return $this->hasOne(Post::class, 'user_id', 'id')->latestOfMany();
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'user_id', 'id')->orderByDesc('name');
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function categoryPost()
    {
//        return $this->hasOneThrough(Post::class, Category::class);
        return $this->hasOneThrough(Post::class, Category::class)->orderByDesc('category_id');
    }


    public function categoryPosts()
    {
        return $this->hasManyThrough(Post::class, Category::class);

    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
