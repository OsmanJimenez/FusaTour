@extends('layout')

@section('content')

@if (session('success'))
<div class="alert alert-success">
  {{ session('success')}}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
  {{ session('error')}}
</div>
@endif

<div class="container">
  <div class="section">
    <h5 class="pagetitle">Perfil</h5>
    <div class="divider"></div>
  </div>
</div>

<form method="POST" enctype="multipart/form-data" files="true" action="{{ route('profile.update', ['user' => auth()->user()->id ]) }}">
  {{ csrf_field()}} {{ method_field('PUT') }}
  <div class="container">
    <div class="section">
      <div class="editprof-img">
        <div class="circle">
          <img  loading="lazy" src="/images/{{ auth()->user()->avatar }}" onerror="this.src='/images/user.png';" alt="">
        </div>
      </div>

      <div class="row ocultar">
        <div class="input-field col s12">
          <i class="mdi mdi-email-outline prefix"></i>
          <input id="id" type="id" value="{{ old('name', auth()->user()->id) }}" class="validate">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Cargar Imagen</span>
              <input value="{{ old('urlimg', auth()->user()->avatar) }}" type="file" name="urlimg">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-account-outline prefix"></i>
          <input name="name" id="name" type="text" value="{{ old('name', auth()->user()->name) }}" class="validate">
          <label for="first_name">Nombre</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-email-outline prefix"></i>
          <input name="email" id="email" type="email" value="{{ old('name', auth()->user()->email) }}" class="validate">
          <label for="email">Correo</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-lock-outline prefix"></i>
          <input name="password" id="password" type="password" class="validate" required>
          <label for="password">Contraseña</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-lock-outline prefix"></i>
          <input name="password_confirmed" id="cpassword" type="password" class="validate" required>
          <label for="cpassword">Repite la Contraseña</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-circle-edit-outline prefix"></i>
          <textarea name="description" id="textarea-prefix" class="materialize-textarea" required>{{ old('name', auth()->user()->description) }}</textarea>
          <label for="textarea-prefix">Descripción</label>
        </div>
      </div>

      <div class="row">
        <div class="col s12 right-align">
          <button class="waves-effect waves-light btn-large bg-primary">Guardar Cambios</button>
        </div>
      </div>
</form>
</div>
</div>

<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>

@endsection