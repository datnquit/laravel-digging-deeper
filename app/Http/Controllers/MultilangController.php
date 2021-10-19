<?php

namespace App\Http\Controllers;

use App\Models\Multilang;
use Illuminate\Http\Request;

class MultilangController extends Controller
{
    public function formMulti()
    {
        return view('multiform');
    }

    public function storeMulti(Request $request)
    {
        Multilang::create($request->all());
        return redirect()->back();
    }

    public function editMulti($id)
    {
        $item = Multilang::find($id);
        return view('editmultidetail', compact('item'));
    }

    public function updateMulti(Request $request, $id)
    {
        $item = Multilang::find($id);
        $item->update($request->all());

        return redirect()->back();
    }

    public function detail($id)
    {
        $item = Multilang::find($id);
        return view('multidetail', compact('item'));
    }
}
