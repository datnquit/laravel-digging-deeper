<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
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

    public function categoryPost()
    {
        $user = User::find(18);

//        dd($user->category);
        dd($user->categoryPost);
//        dd($user->categoryPosts);
//        dd($user->category ? $user->category->post : null);
    }

    public function polyOneOne()
    {
        $user = User::find(18);
        $post = Post::find(1);
        $image = Image::find(2);
        dd($image->imageable);
        dd($post->image);
        dd($user->image);
    }

    public function polyOneMany()
    {
        $post = Post::find(1);
        dd($post->comment);
        dd($post->comments);
    }

    public function polyOneCreate()
    {
        $image = new Image([
            'url' => 'url post'
        ]);

        $post = Post::find(2);
        $post->image()->save($image);

        $comment = new Comment([
            'content' => 'comment 2',
            'user_id' => 18,
        ]);

        $post->comments()->save($comment);
        return true;
    }

    public function polyManyCreate()
    {
//        $tag1 = new Tag([
//            'name' => 'tag1',
//        ]);
//
//        $tag2 = new Tag([
//            'name' => 'tag2',
//        ]);
//        $post = Post::find(2);
//        $post->tags()->saveMany([$tag1, $tag2]);

        $tag1 = Tag::find(1);
        $tag2 = Tag::find(2);
        $post = Post::find(1);
        $post->tags()->attach([$tag1->id, $tag2->id]);
        // detach | sync
        return true;
    }

    public function polyManyMany()
    {
        $post = Post::find(2);
        $tag = Tag::find(1);
        dd($tag->posts);
//        dd($post->tags);
    }

}
