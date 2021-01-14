@extends('master')
@section('title', 'Crear Ui | TBD')
@section('content')
<div class="columns">
  <div class="column is-6 is-offset-2">
    <p class="subtitle">Nuevo Ui</p>
    <form method="POST" action="{{ route('admin.store.ui')}}">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Ruta UI</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Ruta UI" value="" name="ui" required>
          <span class="icon is-small is-left">
            <i class="fa fa-external-link"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <button class="button is-primary">crear ui</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
