@extends('admin.dashboard')
@section('content')
<div class="container-fluid">
    <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
        <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Agregar Nuevo Usuario
    </button>
</div>
@foreach($users as $user)
   {{$user}}
@endforeach



    {{-- componente para listar las tareas --}}
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Nueva Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <form action="" method="post" class="form-horizontal">
                               
                        {{csrf_field()}}
                        
                        
                        
                    </form>

                  

                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

     <!--Inicio del modal actualizar-->
     <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <form action="" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" id="id_tarea" name="id_tarea" value="">
                        

                    </form>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
    </div>    
</div> 
@stop