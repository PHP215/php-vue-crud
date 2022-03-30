<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\testnotify;
use Illuminate\Http\Request;

class notify extends Controller
{
    //
    public function notifier(){
        $user = User::first();
        $details = [
            'body' => 'This is the body of the nofication',
            'text' => 'This is the text of the notification',
            'url' => url('https;//phpjob.herokuapp.com'),
            'thank_you'=> 'This is the thank you text for the notification, you have 14 days to enroll'
        ];
        $user->notify(new testnotify($details));
    }
}
