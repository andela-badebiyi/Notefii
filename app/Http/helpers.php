<?php 
use Illuminate\Support\Facades\Auth;
use App\Notifier\MailNotification;
use App\Notes;

class BdHelpers {
    public static function getTrashedCount() {
        return Auth::user()->notes()->onlyTrashed()->count();
    }

    public static function getNotesCount() {
        return Auth::user()->notes()->count();
    }

    public static function getSharedCount() {
        return Auth::user()->sharedNotes()->count();
    }

    public static function slugify($text)
    {
        return str_replace(' ', '-', $text);
    }

    public static function sendNotification($type, $data) 
    {
        $notification = new MailNotification($type, $data);
        $notification->send(); 
    }
}
?>