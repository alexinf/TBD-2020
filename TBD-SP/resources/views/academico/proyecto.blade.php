@extends('master')
@section('title', 'Crear Proyecto | TBD')
@section('content')
<div class="columns">
  <div class="column is-two-thirds is-offset-2">
    <form method="POST" action="{{ route('academico.store.proyecto') }}">
      {{ csrf_field() }}
      <div class="field">
        <label class="label">Titulo</label>
        <div class="control has-icons-left has-icons-right">
          <input class="input"
                type="text"
                placeholder="Titulo Proyecto"
                value=""
                required
                name="titulo">
          <span class="icon is-small is-left">
            <i class="fa fa-header"></i>
          </span>
      </div>
      <div class="field">
        <label class="label">Resumen</label>
        <div class="control">
          <textarea class="textarea"
                    placeholder="Resumen Proyecto"
                    name="resumen"></textarea>
        </div>
      </div>
      <div class="field">
        <p class="label">Tipo Proyecto</p>
        <div class="control">
          <div class="select">
            <select required name="tipo">
              <option disabled selected value> -- seleccione una opcion -- </option>
              @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="field">
        <p class="label">Dependencia Proyecto</p>
        <div class="control">
          <div class="select">
            <select required name="dependencia">
              <option disabled selected value> -- seleccione una opcion -- </option>
              @foreach ($dependencias as $dependencia)
                <option value="{{ $dependencia->id }}">{{ $dependencia->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="field">
        <p class="label">Area Proyecto</p>
        <div class="control">
          <div class="select">
            <select required name="area">
              <option disabled selected value> -- seleccione una opcion -- </option>
              @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
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
