<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

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

    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();
        return back()->with('flash', 'notificacion maecada como leida');
    } 

    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();
        return back()->with('flash', 'notificacion Eliminada');
    } 
}
