<?php

namespace App\Notifier;

use Mail;

class MailNotification
{
    private $recepient;

    public function __construct($params)
    {
        $this->recepient = $params;
    }

    public function send()
    {
        $recepient = $this->recepient;
        if(!filter_var($recepient['email'], FILTER_VALIDATE_EMAIL) === false){
          @Mail::send('mails.message_notification', $this->recepient, function ($message) use ($recepient) {
            $message->to($recepient['email']);
            $message->subject($recepient['subject']);
          }); 
        }
    }
}
