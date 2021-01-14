@extends('master')
@section('title', 'Crear Funcion | TBD')
@section('content')
<div class="columns">
  <div class="column is-two-thirds is-offset-2">
    <p class="label">Crear Funcion</p>
    <form method="POST" action="{{ route('admin.store.funcion') }}">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Name</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Nombre Funcion" value="" name="funcion" required>
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="label">Uis</p>
        @forelse ($uis as $ui)
          <div class="control">
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
          </div>
        @empty
          <p class="subtitle is-3">No hay Uis disponibles</p>
        @endforelse
      </div>
      <div class="field">
        <div class="control">
          <button class="button is-primary">crear funcion</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
