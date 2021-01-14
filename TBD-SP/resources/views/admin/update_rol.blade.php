@extends('master')
@section('title', 'Roles | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    <div class="title">
      Rol - {{ $rol->name }}
    </div>
    <form method="POST" action="{{ route('admin.update.role', [$rol->id]) }}">
      {{ csrf_field() }}
      <div class="field">
        <p class="label">Funciones</p>
        @forelse ($funciones as $funcion)
        <div class="control">
          @if (in_array($funcion->id, $rol_funcion))
          <label class="checkbox">
            <input type="checkbox" name="funciones[{{ $funcion->id }}]" checked>
            {{ $funcion->name }}
          </label>
          <label class="radio">
            <input type="radio" name="funciones[{{ $funcion->id }}]" value="true" checked>
            activo
          </label>
          <label class="radio">
            <input type="radio" name="funciones[{{ $funcion->id }}]" value="false">
            no-activo
          </label>
          <label class="radio">
            <input type="radio" name="funciones[{{ $funcion->id }}]" value="null">
          </label>
          @else
          <label class="checkbox">
            <input type="checkbox" name="funciones[{{ $funcion->id }}]">
            {{ $funcion->name }}
          </label>
          <label class="radio">
            <input type="radio" name="funciones[{{ $funcion->id }}]" value="true">
            activo
          </label>
          <label class="radio">
            <input type="radio" name="funciones[{{ $funcion->id }}]" value="false">
            no-activo
          </label>
          <label class="radio">
            <input type="radio" name="funciones[{{ $funcion->id }}]" value="null">
          </label>
          @endif
        </div>
        @empty
          <p class="subtitle is-3">No hay Funciones disponibles</p>
        @endforelse
      </div>
      <div class="field">
        <div class="control">
          <button class="button is-primary">actualizar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
