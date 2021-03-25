@extends('layouts.app')

@section('content')
    <h1>Mensaje</h1>
    <p>{{$message->mensaje}}</p>
    <small>Enviado por {{$message->sender->name}}</small>
@endsection