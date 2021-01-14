@extends('master')
@section('title', 'Login | TBD')
@section('content')

<form class="columns" method="POST" action="/login">
  {{ csrf_field() }}
  <div class="column is-half is-offset-one-quarter">
    <div class="field">
      <label class="label">Username</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input" type="text" placeholder="username" value="" name="username" required>
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </div>
    </div>
    <div class="field">
      <label class="label">Password</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input" type="password" placeholder="password" name="password" value="" required>
        <span class="icon is-small is-left">
          <i class="fa fa-lock"></i>
        </span>
      </div>
    </div>
    <div class="field">
      <p class="control">
        <button type="submit" class="button is-success">
          iniciar
        </button>
      </p>
    </div>
  </div>
</form>

@endsection
