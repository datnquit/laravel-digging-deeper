<?php

namespace App\Http\Controllers;

use App\Jobs\NewJob;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

    public function httpClient()
    {
//        $response = Http::get('http://127.0.0.1:8080/api/user', [
//            'name' => 'nguyen quang dat'
//        ]);
        // application/x-www-form-urlencoded
//        $response = Http::asForm()->post('http://127.0.0.1:8080/api/user');

        // Multi-Part
//        $response = Http::attach(
//            'image', file_get_contents('background.png'), 'background.png'
//        )->post('http://127.0.0.1:8080/api/user', [
//            'name' => 'Nguyen quang dat',
//            'email' => 'datnquit@gmail.com',
//        ]);
        //Header
//        $response = Http::withHeaders([
//            'authorization' => 'Token'
//        ])->post('http://127.0.0.1:8080/api/header');
        // Authen
//        $response = Http::withBasicAuth('user', '123')->post('...');
//        $response = Http::withToken("Token")->post('...');
        // Timeout
//        try {
//            $response = Http::timeout(3)->get(',..');
//        } catch (ConnectException $exception) {
//
//        }
        // Retries
        $response = Http::retry('3', '1000')->post('abc');
        dd($response->json());
//        dd($response->json());
//        dd($response->headers());
//        $response->body() : string;
//        $response->json() : array|mixed;
//        $response->object() : object;
//        $response->collect() : Illuminate\Support\Collection;
//        $response->status() : int;
//        $response->ok() : bool;
//        $response->successful() : bool;
//        $response->failed() : bool;
//        $response->serverError() : bool;
//        $response->clientError() : bool;
//        $response->header($header) : string;
//        $response->headers() : array;
    }
}
