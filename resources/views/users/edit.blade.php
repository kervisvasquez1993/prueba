@component('components.form')
@slot('modalId')
 abrirmodalEditar
@endslot

@slot('titulo')
    Editar Usuario {{$user->name}}
@endslot

@slot('action')
{{route('users.update', ['user' => $user->id])}}
@endslot

@slot('formulario')

{{csrf_field()}}
<input type="hidden" id="id_user" name="id_user" value="">

<div class="form-group">
    <div class="col-md-12 mb-3">
        <label for="name">Nombre<span class="red">*</span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
        @error('name')
        <span class="invalid-feedback d-block" role="alert">
          <strong> {{__('El Nombre es Obligatorio')}}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group">
    <div class="col-md-12 mb-3">
        <label for="password">Contraseña<span class="red">*</span></label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" autocomplete="password">
        @error('password')
        <span class="invalid-feedback d-block" role="alert">
          <strong> {{$message}}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 mb-3">
        <label for="password">Confirmar Contraseña<span class="red">*</span></label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{old('password-confirm')}}" autocomplete="password-confirm">
        @error('password-confirm')
        <span class="invalid-feedback d-block" role="alert">
          <strong> {{$message}}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 mb-3">
        <label for="phone">Numero de Teléfono<span class="red">*</span></label>
        <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('identify_card')}}">
        @error('phone')
        <span class="invalid-feedback d-block" role="alert">
          <strong> {{$message}}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 mb-3">
        <label for="birthdate">Fecha de Nacimiento<span class="red">*</span></label>
        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{old('birthdate')}}">
        @error('birthdate')
        <span class="invalid-feedback d-block" role="alert">
          <strong> {{$message}}</strong>
        </span>
        @enderror
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
         @error('country_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>


<div class="form-group filter">
    <div class="col-md-12 mb-3">
        <label class="label-filter" for="state_id">Estados</label>
         <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror">
            <option value=""> Seleccione
         
            </option>
         </select>   
    </div>
    @error('state_id')
    <div class="invalid-feedback">
        {{$message}}
    </div>
@enderror
</div>

<div class="form-group filter">
    <div class="col-md-12 mb-3">
        <label class="label-filter" for="city_id">Ciudad</label>
         <select name="city_id" id="city_id" class="form-control @error('city_id') is-invalid @enderror">
            <option value=""> Seleccione
           
            </option>
         </select>   
    </div>
    @error('city_id')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    </div>


<div class="form-group mb-10">
    <button class="btn btn-primary" type="submit">Enviar</button>
    <button class="btn btn-success" type="reset" name="reset">Limpiar</button>
</div>

@endslot
@endcomponent