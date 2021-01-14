@extends('master')
@section('title', 'Crear Usuario | TBD')
@section('content')
<div class="columns">
  <div class="column is-two-thirds is-offset-2">
    <form method="POST" action="{{ route('admin.store') }}">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Username</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Username" value="" name="username" required>
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" placeholder="Password" value="" name="password" required>
          <span class="icon is-small is-left">
            <i class="fa fa-lock"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <p class="label">Roles</p>
        @forelse ($roles as $rol)
          <div class="control">
            <label class="checkbox">
              <input type="checkbox" name="roles[{{ $rol->id }}]">
              {{ $rol->name }}
            </label>
            <label class="radio">
              <input type="radio" name="roles[{{ $rol->id }}]" value="true">
                activo
            </label>
            <label class="radio">
              <input type="radio" name="roles[{{ $rol->id }}]" value="false">
                no-activo
            </label>
          </div>
        @empty
          <p class="subtitle is-3">No hay Roles disponibles</p>
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
