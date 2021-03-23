<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __contruct()
     {
         $this->middleware('auth');
     }
    
    public function index()
    {
        return view('notifications.index', [
            "unreadNotifications" => auth()->user()->unreadNotifications,
            "notifications"       => auth()->user()->readNotifications,
        ]);
    }
}
