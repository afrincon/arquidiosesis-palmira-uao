@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Reporte de ayudas por iglesia</p>
    <div class="panel-block">
        <form class="long-form" method="get" action="{{ url('/reportes/generarreporte') }}">
          {{ csrf_field() }}
          <div class="columns">
            <div class="column is-one-quarter">
              <div class="field">
                <label for="nombre" class="label">Iglesia</label>
                <select-generico :old="'{{old('id_iglesia')}}'" :propname="'id_iglesia'" :url="'/iglesias/obtenerlistadoiglesias'" :class_id="'select {{ $errors->has('id_iglesia') ? ' is-danger' : '' }}'"></select-generico>                
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label for="nombre" class="label">Fecha inicial</label>
                <input type="date" name="fecha_inicial" class="input"  autofocus>                
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label for="nombre" class="label">Fecha final</label>
                <input type="date" name="fecha_final" class="input" >                
              </div>
            </div>
          </div>
          <div class="field">
              <button type="submit" class="button is-link is-medium is-outlined">Consultar</button>
          </div>
        </form>
    </div>
    @if (session('status'))
    <div class="panel-block">
      <div class="notification is-success">
        <button class="delete"></button>
        {{ session('status') }}
      </div>
    </div>      
    @endif
    <div class="panel-block">
      
      @if (!empty($iglesias))
          {{ $iglesias->count() }}
      @endif


    </div>            
      
  </div>
</div>
@endsection