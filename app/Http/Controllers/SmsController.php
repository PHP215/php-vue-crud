<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    //

    public function send_sms(){
        Nexmo::message()->send([
            'to'=>'23409056553382',
            'from'=>'2340913576308',
            'text'=>'A test sms from baddas programmer'
        ]);

        echo 'message sent';
    }
}
