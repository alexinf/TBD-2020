@extends('master')
@section('title', 'Crear Rol | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    <p class="subtitle">Nuevo Rol</p>
    <form method="POST" action="{{ route('admin.store.rol') }}">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Nombre Rol</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="rol name" value="" name="rol_name" required>
          <span class="icon is-small is-left">
            <i class="fa fa-sun-o"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="label">Funciones</p>
        @forelse ($funciones as $funcion)
        <div class="control">
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
        </div>
        @empty
          <p class="subtitle is-3">No hay Funciones disponibles</p>
        @endforelse
      </div>
      <div class="field">
        <div class="control">
          <button class="button is-primary">crear</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
