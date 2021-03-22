<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('home', compact('users'));
    }

    public function store(Request $request)
     {
         /* validacion */

        $mensaje = new Message();
        $mensaje->sender_id = auth()->id();
        $mensaje->recipient_id = $request->recipient_id;
        $mensaje->asunto = $request->asunto;
        $mensaje->mensaje = $request->mensaje;

        $mensaje->save();
         return back()->with('flash', 'Tu mensaje fue enviado');
     }
}
