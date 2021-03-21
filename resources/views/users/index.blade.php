@extends('admin.dashboard')
@section('content')
<div class="container-fluid">
    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#abrirmodal">
        <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Nuevo Usuario
    </button>
</div>

<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
            <tr>
                
                <th class="text-lefth">Nombre</th>
                <th class="text-lefth">Correo</th>
                <th class="text-lefth">Numero de Teléfono</th>
                <th class="text-lefth">Cedula</th>
                <th class="text-lefth">Fecha de Nacimiento</th>
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
                    {{$user->birthdate}}
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
                    <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#abrirmodal">
                        Editar
                    </button>
                    <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#abrirmodal">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>



    

   {{-- crear nuevo usuario --}}

   @include('users.create')

 
@endsection