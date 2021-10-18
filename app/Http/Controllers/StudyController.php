<?php

namespace App\Http\Controllers;

use App\Jobs\NewJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudyController extends Controller
{
    public function storeQueue()
    {
        $name = "Nguyen quang dat";
        $this->dispatch(new NewJob($name));
//        NewJob::dispatch($name);
//        if ($name == "Nguyen quang dat") {
//            NewJob::dispatch($name);
//        }
//        NewJob::dispatchIf(false, $name);
        return true;
    }

    public function changeLang($locale)
    {
        $lang = $locale;
        Session::put('language', $lang);
        return redirect()->back();
    }

}
