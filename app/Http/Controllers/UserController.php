<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\State;
use App\Country;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users    =  User::all();
        $paises   =  Country::all();
        $estados  =  State::all();
        $ciudades =  City::all();
        return view('users.index', compact('users', 'paises', 'estados' , 'ciudades'));
    }

    
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'nombre' => 'required|',
            'password' => 'required |string |min:8 | confirmed',
            'email' => 'required|email|unique:users',
            'identify_card' => 'required|date|before:2001-04-15',

        ]);

        
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
