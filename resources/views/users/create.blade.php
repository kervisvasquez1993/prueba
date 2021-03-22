{{-- formulario para crear nuevo usuario --}}
@component('components.form')
    @slot('modalId')
      abrirmodal
    @endslot
    
    @slot('titulo')
        Añadir Nuevo Usuario
    @endslot
    
    @slot('action')
    {{route('users.store')}}
    @endslot
    
    @slot('formulario')
    <div class="form-group">
        <div class="col-md-12 mb-3">
            <label for="name">Nombre<span class="red">*</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 mb-3">
            <label for="email">Correo<span class="red">*</span></label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 mb-3">
            <label for="password">Contraseña<span class="red">*</span></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 mb-3">
            <label for="password">Confirmar Contraseña<span class="red">*</span></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 mb-3">
            <label for="identify_card">Numero de Cedula<span class="red">*</span></label>
            <input type="text" class="form-control" id="identify_card" name="identify_card">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 mb-3">
            <label for="birthdate">Fecha de Nacimiento<span class="red">*</span></label>
            <input type="date" class="form-control" id="birthdate" name="birthdate">
        </div>
    </div>

    <div class="form-group filter">
        <div class="col-md-12 mb-3">
            <label class="label-filter" for="country_id">Pais</label>
             <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror">
               <option value=""> Seleccione
                   @foreach ($paises as $item)
                      <option value="{{$item->id}}"  {{old('country_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                   @endforeach
               </option>
             </select>   
        </div>
    </div>

    <div class="form-group filter">
        <div class="col-md-12 mb-3">
            <label class="label-filter" for="state_id">Estados</label>
             <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror">
                <option value=""> Sin Estado                 
                </option>
             </select>   
        </div>
    </div>

    <div class="form-group filter">
        <div class="col-md-12 mb-3">
            <label class="label-filter" for="city_id">Ciudad</label>
             <select name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror">
               <option value=""> Sin Ciudad                 
               </option>
             </select>   
        </div>
    </div>
    

  

    
    
   
    
    <div class="form-group mb-10">
        <button class="btn btn-primary" type="submit">Enviar</button>
        <button class="btn btn-success" type="reset" name="reset">Limpiar</button>
    </div>
    @endslot
@endcomponent