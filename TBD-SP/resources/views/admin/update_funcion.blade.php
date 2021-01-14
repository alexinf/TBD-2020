@extends('master')
@section('title', 'Roles | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    <div class="title">
      Funcion - {{ $funcion->name }}
    </div>
    <form method="POST" action="{{ route('admin.update.funcion', [$funcion->id]) }}">
      {{ csrf_field() }}
      <div class="field">
        <p class="label">Uis Disponibles</p>
        @forelse ($uis as $ui)
        <div class="control">
          @if (in_array($ui->id, $funcion_ui))
          <label class="checkbox">
            <input type="checkbox" name="uis[{{ $ui->id }}]" checked>
            {{ $ui->name }}
          </label>
          <label class="radio">
            <input type="radio" name="uis[{{ $ui->id }}]" value="true" checked>
            activo
          </label>
          <label class="radio">
            <input type="radio" name="uis[{{ $ui->id }}]" value="false">
            no-activo
          </label>
          <label class="radio">
            <input type="radio" name="uis[{{ $ui->id }}]" value="null">
          </label>
          @else
          <label class="checkbox">
            <input type="checkbox" name="uis[{{ $ui->id }}]">
            {{ $ui->name }}
          </label>
          <label class="radio">
            <input type="radio" name="uis[{{ $ui->id }}]" value="true">
            activo
          </label>
          <label class="radio">
            <input type="radio" name="uis[{{ $ui->id }}]" value="false">
            no-activo
          </label>
          <label class="radio">
            <input type="radio" name="uis[{{ $ui->id }}]" value="null">
          </label>
          @endif
        </div>
        @empty
          <p class="subtitle is-3">No hay UIs disponibles</p>
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
