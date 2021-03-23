<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Notifications\MassageSend;


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
        $this->validate($request, [
            'mensaje' => 'required',
            'asunto' => 'required',
            'recipient_id' => 'required| exists:users,id',
             

        ]);
        $mensaje = new Message();
        $mensaje->sender_id = auth()->id();
        $mensaje->recipient_id = $request->recipient_id;
        $mensaje->asunto = $request->asunto;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->save();
        $recipient = User::find($request->recipient_id);
        $recipient->notify(new MassageSend($mensaje)); 
        return back()->with('flash', 'Tu mensaje fue enviado');
     }

     public function show($id)
     {
         $message = Message::findOrField($id);

         return view('message.show', compact('messsage'));
     }

     
}
