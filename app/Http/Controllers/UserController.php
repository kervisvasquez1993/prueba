<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\State;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paises   =  Country::all();
        $estados  =  State::all();
        $ciudades =  City::all();
        $users    =  User::all();
        $fecha_actual = Carbon::now();

        return view('users.index', compact('users', 'paises', 'estados' , 'ciudades', 'fecha_actual'));
    }

    
    public function store(Request $request)
    {   
        
        
        $data = $request->validate([
            'name' => 'required|',
            'password' => 'required |string |min:8 | confirmed',
            'email' => 'required|email|unique:users',
            'identify_card' => 'required',
            'birthdate' => 'required|date|before: -18 years',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required'
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->identify_card = $request->identify_card;
        $user->password = Hash::make($request->password);
        $user->identify_card = $request->identify_card;
        $user->birthdate = $request->birthdate;
        $user->phone      = $request->phone;
        $user->country_id = $request->country_id;
        $user->state_id   = $request->state_id;
        $user->city_id    = $request->city_id;
        $user->save();
        return back()->with('estado', 'Usuario Añadido exitosamente');

        
    }


    
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function selectState(Request $request)
    {
        if(isset($request->texto)){
            $state = State::where('country_id' , '=',  $request->texto)->get();
            return response()->json(
                [
                    'lista' => $state,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        } 
    }

    public function selectCities(Request $request)
    {
        if(isset($request->texto)){
            $state = City::where('state_id' , '=',  $request->texto)->get();
            return response()->json(
                [
                    'lista' => $state,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        } 
    }
}
