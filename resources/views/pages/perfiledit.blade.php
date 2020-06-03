@extends('layout')

@section('content')

<div class="container">
  <div class="section">
    <h5 class="pagetitle">Perfil</h5>


    <div class="divider"></div>
  </div>
</div>



<div class="container">
  <div class="section">
  <div class="editprof-img">
        <div class="img-wrap circle">
          <img src="../assets/images/edit-profile.jpg" alt="">
        </div>
      </div>

      <div class="row" style="display: none">
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
              <input type="file">
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
          <input id="name" type="text" value="{{ old('name', auth()->user()->name) }}" class="validate">
          <label for="first_name">Nombre</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-email-outline prefix"></i>
          <input id="email" type="email" value="{{ old('name', auth()->user()->email) }}" class="validate">
          <label for="email">Correo</label>
        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-lock-outline prefix"></i>
          <input id="password" type="password" class="validate" required>
          <label for="password">Contraseña</label>
        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-lock-outline prefix"></i>
          <input id="cpassword" type="password" class="validate" required>
          <label for="cpassword">Repite la Contraseña</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="mdi mdi-circle-edit-outline prefix"></i>
          <textarea id="textarea-prefix" class="materialize-textarea" required>{{ old('name', auth()->user()->description) }}</textarea>
          <label for="textarea-prefix">Descripción</label>
        </div>
      </div>


      <div class="row">
        <div class="col s12">
          <button class="waves-effect waves-light btn-large bg-primary float-right ">Guardar Cambios</button>
        </div>
      </div>

  </div>
</div>

<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>

@endsection