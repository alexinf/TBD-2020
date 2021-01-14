@extends('master')
@section('title', 'Roles | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    @if (count($roles) === 0)
      <div class="tile">
        No Hay Roles definidos
      </div>
    @else
    <table class="table is-hoverable">
      <thead>
        <tr>
          <th>Nombre Rol</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $rol)
        <tr>
          <td>{{ $rol->name }}</td>
          <td><a href="role/{{ $rol->id }}">ver</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>  
    @endif
  </div>
</div>
@endsection
