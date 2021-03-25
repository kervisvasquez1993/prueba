@extends('layouts.app')
@section('content')
    <div class="conatiner">
        <h2>Notificaciones</h2>
        <div class="row">
            <div class="col-md-6">
                <h3> No Leidas</h3>
                <ul class="list-group">
                    @foreach($unreadNotifications as $unreadNotification)
                        <li class="list-group-item">
                          <a href=" {{$unreadNotification->data['link']}}">
                             {{$unreadNotification->data['text']}}
                          </a>
                          <form class="pull-rigth" action="{{route('notifications.read', $unreadNotification->id)}}" method="post">
                              @method('PATCH')
                              @csrf
                               <button class="btn btn-danger btn-xs">x</button> 
                          </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Notificaciones  Leidas</h3>
                <ul class="list-group"> 
                    @foreach($notifications as $notification)
                        <li class="list-group-item">
                            <a href=" {{$notifications->data['link']}}">
                                {{$notification->data['text']}}
                             </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>    
@endsection