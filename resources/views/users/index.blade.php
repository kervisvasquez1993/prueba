@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#abrirmodal">
        <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Nuevo Usuario
    </button>

    <!-- SEARCH FORM -->
    
    <form 
    class="form-inline ml-3 mr-2"
    action="{{ route('producto.search') }}"
    >
    @csrf
      <div class="input-group input-group-sm">
        <input 
          class="form-control form-control-navbar" 
          type="search" 
          name="q"
          placeholder="Search" 
          aria-label="Search"
          autocomplete="off"
        >
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    
  
</div>

<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
            <tr>
                
                <th class="text-lefth">Nombre</th>
                <th class="text-lefth">Correo</th>
                <th class="text-lefth">Numero de Teléfono</th>
                <th class="text-lefth">Cedula</th>
                <th class="text-lefth">Edad</th>
                <th class="text-lefth">Pais</th>
                <th class="text-lefth">Estado</th>
                <th class="text-lefth">Ciudad</th>
                <th class="text-lefth">Accion</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->phone}}
                </td>
                <td>
                    {{$user->identify_card}}
                </td>
                <td>
                    {{ $fecha_actual::parse($user->birthdate)->age }} Años
                </td>
                <td>
                    {{$user->country->name}}
                </td>
                <td>
                    {{$user->state->name}}
                </td>
                <td>
                    {{$user->city->name}}
                </td>

                
                
               
                <td class="td-actions">
                    <button 
                            class="btn btn-warning btn-sm d-block" 
                            type="button" 
                            data-id={{$user->id}}
                            data-name={{$user->name}}
                            data-phone= {{$user->phone}}
                            data-birthdate = {{date('d-m-y', strtotime($user->birthdate)) }}
                            data-country = {{$user->country->name}}
                            data-state = {{$user->state->name}}
                            data-city =  {{$user->city->name}}
                            data-toggle="modal" 
                            data-target="#abrirmodalEditar">
                        Editar
                    </button>
                    
                    <form action="{{route('users.destroy', ['user' => $user->id] )}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm d-block" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>



    

   {{-- crear nuevo usuario --}}

   @include('users.create')

   {{-- editar usuario --}}

   @include('users.edit')

 
@endsection