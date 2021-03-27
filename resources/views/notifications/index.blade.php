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
                          <a href="{{$unreadNotification->data['link']}}">
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
                            @if($notification->data['link'])
                             <a href="{{$notification->data['link']}}">
                                {{$notification->data['text']}}
                             </a> 
                             @endif
                        </li>
                        <form class="pull-rigth" action="{{route('notifications.destroy', $notification->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                             <button class="btn btn-danger btn-xs">x</button> 
                        </form>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>    
@endsection

{{-- 
    
    {"id":"07e10ba0-25db-4504-bc96-6d8e8410aadf",
    "type":"App\\Notifications\\MassageSend",
    "notifiable_type":"App\\User",
    "notifiable_id":1,
    "data":
    {"link":"http:\/\/127.0.0.1:8000\/messages\/7",
    "text":"Has Recibido un mensaje de test"},
    "read_at":null,"created_at":"2021-03-23T20:28:06.000000Z",
    "updated_at":"2021-03-23T20:28:06.000000Z"}
--}}