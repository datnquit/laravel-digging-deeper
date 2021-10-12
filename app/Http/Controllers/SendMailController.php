<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail()
    {
        $user = User::find(3);
        $mailable = new HelloMail($user);
        Mail::to("datnquit@gmail.com")
//            ->cc("datpro26111999@gmail.com")
            ->queue($mailable);
        return true;
    }

    public function configMail()
    {
        return view('mail.config');
    }

    public function testMail(Request $request)
    {
//        switch ($request->mail_driver) {
//            case 'smtp':

                config([
                    'mail.default' => 'smtp',
                    'mail.mailers.smtp.host' => $request->host,
                    'mail.mailers.smtp.port' => $request->port,
                    'mail.mailers.smtp.encryption' => $request->encryption,
                    'mail.mailers.smtp.username' => $request->username,
                    'mail.mailers.smtp.password' => $request->password,
                    'mail.from.address' => $request->username,
                    'mail.from.name' => 'Quang Dat',
                ]);
//                dd(config('mail'));
//                break;
//            case 'ses':
//                config([
//                    'mail.default' => 'ses',
//                    'mail.from.address' => $request->mail_address,
//                    'mail.from.name' => $request->mail_name,
//                    'services.ses.key' => $request->mail_key,
//                    'services.ses.secret' => $request->mail_secret,
//                    'services.ses.region' => $request->mail_region
//                ]);
//                break;
//        }

        $user = User::find(3);
        $mailable = new HelloMail($user);
        Mail::to("datpro26111999@gmail.com")
            ->send($mailable);
        return redirect()->back()->with('success', 'Success');

    }
}
