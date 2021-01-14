@extends('master')
@section('title', 'Uis | TBD')
@section('content')
<div class="columns">
  <div class="column is-6 is-offset-2">
    @if (count($uis) === 0)
      <div class="tile">
        No Hay UIs definidos
      </div>
    @else
    <table class="table is-hoverable">
      <thead>
        <tr>
          <th>Nombre UI</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($uis as $ui)
        <tr>
          <td>{{ $ui->name }}</td>
          <td><a href="">ver</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>  
    @endif
  </div>
</div>
@endsection
