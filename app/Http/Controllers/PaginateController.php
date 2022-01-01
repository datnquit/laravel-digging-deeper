<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PaginateController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();
        if($request->gender) {
            $users->where('gender',$request->gender);
        }
        $users = $users->paginate(5);
//        return response()->json($users->items());
        return view('paginate-study', compact('users'));
    }
}
