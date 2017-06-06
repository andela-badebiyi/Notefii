<?php

namespace App\Notifier;

use Mail;

class MailNotification
{
    private $params;

    public function __construct($type, $params)
    {
        $this->type =  $type;
        $this->params = $params;
    }

    public function send()
    {
        $params = $this->params;

        switch($this->type) {
            case 'register':
                $data = [
                    'name' => $params['name']
                ];
                $template = 'mails.register';
                break;
            case 'shared':
                $data = [
                    'sharer' => $params['sharer'],
                    'name' => $params['name']
                ];
                $template = 'mails.shared';
                break;
            default:
                return null;
        }

        if(!filter_var($params['email'], FILTER_VALIDATE_EMAIL) === false){
          @Mail::send($template, $data, function ($message) use ($params) {
            $message->to($params['email']);
            $message->subject('Welcome to NOTEFII');
          }); 
        }
    }
}
