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
                         <div class="form-group @error('asunto') is-invalid @enderror">
                             <label for="asunto">Asunto</label>
                             <input type="text" class="form-control" id="asunto" name="asunto" value="{{old('asunto')}}">
                             {!!$errors->first('recipient_id', "<span class='help-block'>:message</span>")!!}
                         </div>
                         <div class="form-group {{$errors->has('recipient_id') ? 'has-error': '' }}">
                             <select class="form-control" name="recipient_id" >
                                 <option value="">Selecciona El usuario</option>
                                 @foreach($users as $value)
                                     <option value="{{$value->id}}"> {{$value->name}} </option>
                                 @endforeach
                             </select>
                             {!!$errors->first('recipient_id', "<span class='help-block'>:message</span>")!!}
                         </div>
                         <div class="form-group {{$errors->has('mensaje') ? 'has-error': '' }}">
                             <textarea name="mensaje" class="form-control" placeholder="mensaje"></textarea>
                         </div>
                         {!!$errors->first('mensaje', "<span class='help-block'>:message</span>")!!}
                         
                         <button class="btn btn-primary btn-block"> Enviar</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
