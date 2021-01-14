@extends('master')
@section('title', 'Funciones | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    <div class="subtitle">Funciones</div>
    @if (count($funciones) === 0)
      <div class="tile">
        No Hay Funciones
      </div>
    @else
    <table class="table is-hoverable">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($funciones as $funcion)
        <tr>
          <td>{{ $funcion->name }}</td>
          <th><a href="/admin/funcion/{{ $funcion->id }}">ver</a></th>
        </tr>
        @endforeach
      </tbody>
    </table>  
    @endif
  </div>
</div>
@endsection
