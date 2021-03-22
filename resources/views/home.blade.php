@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enviar Mensaje</div>
                <form action="{{route('messages.store')}}" method="POST">
                    @csrf
                     <div class="card-body">
                         <div class="form-group">
                             <label for="asunto">Asunto<span class="red">*</span></label>
                             <input type="text" class="form-control @error('asunto') is-invalid @enderror" id="asunto" name="asunto" value="{{old('asunto')}}">
                         </div>
                         <div class="form-group">
                             <select class="form-control" name="recipient_id" >
                                 <option value="">Selecciona El usuario</option>
                                 @foreach($users as $value)
                                     <option value="{{$value->id}}"> {{$value->name}} </option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                             <textarea name="mensaje" class="form-control" placeholder="mensaje"></textarea>
     
                         </div>
                         
                         <button class="btn btn-primary btn-block"> Enviar</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
