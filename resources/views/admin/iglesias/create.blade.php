@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Creación de iglesia</p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('iglesias') }}" method="post">
        @csrf
        @if(count($errors) > 0)
        <div class="notification is-danger">
            <button class="delete"></button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="field">
          <label for="nombre" class="label">Nombre</label>
          <input type="text" name="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre') }}" placeholder="Ingrese el nombre de la iglesia">
          @if ($errors->has('nombre'))
            <p class="help is-danger">{{ $errors->first('nombre') }}</p>
          @endif
        </div>
        <div class="field">
          <label class="label">Dirección</label>
          <input type="text" name="direccion" id="inputDireccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" value="{{ old('direccion') }}" disabled>
          @if ($errors->has('direccion'))
            <p class="help is-danger">{{ $errors->first('direccion') }}</p>
          @endif
        </div>

        <div class="columns">          
          <div class="column">            
            <div class="columns is-mobile">
              <div class="column">                  
                <div class="select">
                  <select id="step1">
                    <option selected disabled>Selecionar</option>
                    <option>Avenida</option>
                    <option>Calle</option>
                    <option>Carrera</option>
                    <option>Diagonal</option>
                    <option>Transversal</option>
                  </select>
                </div>
              </div>
              <div class="column">                
                <input class="input" type="text" placeholder="Número" id="step2">
              </div>
              <div class="column">
                <input class="input" type="text" placeholder="Número" id="step3">
              </div>
              <div class="column">
                <input class="input" type="text" placeholder="Número" id="step4">
              </div>
            </div>
          </div>
          <div class="column">            
            <div class="columns is-mobile">              
              <div class="column">
                  <input class="input" type="text" placeholder="Información adicional" id="step5">
              </div>              
              <div class="column">
                  <a class="button is-primary" id="confirmarDireccion">Confirmar dirección</a>
              </div>             
            </div>
          </div>
        </div>
        

        <div class="columns">
          <div class="column is-two-fifths"> 
            <div class="field">
              <label class="label">Teléfono</label>
              <input type="text" name="telefono" class="input {{ $errors->has('telefono') ? ' is-danger' : '' }}" value="{{ old('telefono') }}" placeholder="Ingrese el teléfono de la iglesia">
              @if ($errors->has('telefono'))
                <p class="help is-danger">{{ $errors->first('telefono') }}</p>
              @endif
            </div>          
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Diocesis principal</label>
              <select-generico :old="'{{ old('id_arquidiocesis') }}'" :propname="'id_arquidiocesis'" :url="'/iglesias/obtenerlistadodiocesis'" :class="'select {{ $errors->has('id_arquidiocesis') ? ' is-danger' : '' }}'"></select-generico>
                @if ($errors->has('id_arquidiocesis'))
                  <p class="help is-danger">{{ $errors->first('id_arquidiocesis') }}</p>
                @endif
              </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Parroco</label>
              <lista-generica></lista-generica>
              @if ($errors->has('user_id'))
                <p class="help is-danger">{{ $errors->first('user_id') }}</p>
              @endif
            </div>
          </div>
        </div>
        <input type="hidden" name="estado" value="1">
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('iglesias') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>
@endsection