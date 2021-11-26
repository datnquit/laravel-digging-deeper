<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logInfo()
    {
        echo Auth::user()->id . "<br>";
        echo Auth::id() . "<br>";
        echo Auth::user()->email . "<br>";
    }

    public function getComment()
    {
        $comments = Comment::all();
        return view('comment', compact('comments'));
    }

    public function editComment($comment_id)
    {
        $comment = Comment::find($comment_id);
//        if (Gate::allows('edit-comment', $comment)) {
//            return "Ban co quyen ";
//        } else {
//            return "Ban khong co quyen";
//        }

//        if (Gate::denies('edit-comment', $comment->user_id)) {
//            return "Ban khong co quyen";
//        } else {
//            return "Ban co quyen ";
//        }
        $user = auth()->user();
//        if ($user->can('update', $comment)) {
//            return "Ban co quyen ";
//        }else {
//            return "Ban khong co quyen";
//        }
//        if ($user->cant('update', $comment)) {
//            return "Ban khong co quyen ";
//        }else {
//            return "Ban co quyen";
//        }
//        if ($user->cant('create', Comment::class)) {
//            return "Ban khong co quyen ";
//        }else {
//            return "Ban co quyen";
//        }
        if ($this->authorize('update', $comment)) {
            return "Ban co quyen ";
        }else {
            return "Ban khong co quyen";
        }
    }
}
