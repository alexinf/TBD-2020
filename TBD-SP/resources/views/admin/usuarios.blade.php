@extends('master')
@section('title', 'Usuarios | TBD')
@section('content')
<div class="columns">
  <div class="column is-12">
    @if (count($usuarios) === 0)
      <div class="tile">
        No Hay Usuarios
      </div>
    @else
    <table class="table is-hoverable">
      <thead>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Roles</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
          <td>{{ $usuario['usuario']->username }}</td>
          <td>{{ $usuario['usuario']->password }}</td>
          <td>{{ $usuario['roles'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>  
    @endif
  </div>
</div>
@endsection
