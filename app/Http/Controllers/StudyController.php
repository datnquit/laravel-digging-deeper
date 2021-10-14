<?php

namespace App\Http\Controllers;

use App\Jobs\NewJob;
use Illuminate\Http\Request;

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
}
