@extends('master')
@section('title', 'Proyectos | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    @if (count($proyectos) === 0)
      <nav class="panel">
        <p class="panel-heading">
          No tienes Proyectos
        </p>
      </nav>
    @else
      <nav class="panel">
        <p class="panel-heading">
          Proyectos Registrados : {{ count($proyectos) }}
        </p>
      </nav>
      <table class="table ">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Estatus</th>
            <th>Op</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($proyectos as $proyecto)
          <tr>
            <td>{{ $proyecto['titulo'] }}</td>
            <td>{{ $proyecto['status'] }}</td>
            <td><a href="/academico/proyecto/{{ $proyecto['id'] }}">ver</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
