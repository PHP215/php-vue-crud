<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    //

    public function send_sms(){
        Nexmo::message()->send([
            'to'=>'2349056553382',
            'from'=>'2349056553382',
            'text'=>'A test sms from baddas programmer'
        ]);

        echo 'message sent';
    }
}
