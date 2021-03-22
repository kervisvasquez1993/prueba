@extends('admin.dashboard')

@section('titulo_pagina')
  <h4>Resultados de la búsqueda: <small>{{ $q }}</small></h4>
@stop

@section('content_header')
  <div class="text-right">
    <a 
      class="btn btn-outline-primary" 
      href="{{ url()->previous() }}"
      data-toggle="tooltip" 
      data-placement="left" 
      title="Regresar"
    >
      <i class="fas fa-arrow-left"></i>
    </a>

  </div>
@stop


@section('content')

  @if( count($users) > 0 )
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
  
  @else
    <div class="row ml-2 text-gray">
      <span class="empty-list">
        <i class="far fa-folder-open"></i>

      </span>
    
      <h4>La búsqueda no ha arrojado resultados.</h4>

    </div>
    @endif
@stop


@section('css')
    <style>
      .empty-list {
        margin-top: 3px;
        margin-right: 5px;
      }

      .action {
        font-size: small
      }

      .action-buttons {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
      }

    </style>
@stop