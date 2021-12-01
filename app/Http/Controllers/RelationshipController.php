<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function avatar()
    {
        $user = User::find(18);
        $avatar = Avatar::find(1);
        dd($avatar->user);

        dd($user->avatar);
    }

    public function posts()
    {
        $user = User::find(18);

//        dd($user->posts);
//        dd($user->newPost);
        dd($user->post);
    }

    public function category()
    {
        $category = Category::find(1);
        $post = Post::find(1);
        dd($post->categories);
//        dd($category->posts);
    }

    public function categoryAttach()
    {
        $post = Post::find(1);
        $post->categories()->attach([2, 3]);
        $post->categories()->attach([2, 3]);

        return redirect('/relationship/category');
    }

    public function categoryDetach()
    {
        $post = Post::find(1);
        $post->categories()->detach([2, 3]);
        return redirect('/relationship/category');

    }

    public function categorySync()
    {
        $post = Post::find(1);
        $post->categories()->sync([
            2 => ['value' => "Dat"],
            3 => ['value' => "Nguyen"]
        ]);
        return redirect('/relationship/category');
    }

    public function categoryPivot()
    {
        $post = Post::find(1);
        foreach ($post->categories as $category) {
            echo $category->pivot->value .  "<br>";
        }

        dd($post);
    }
}
