<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notify extends Controller
{
    //
    public function notify(){
        $details = [
            'body' => 'This is the body of the nofication',
            'text' => 'This is the text of the notification',
            'url' => url('https;//phpjob.herokuapp.com'),
            'thank_you'=> 'This is the thank you text for the notification'
        ];
    }
}
