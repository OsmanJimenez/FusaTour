@extends('admin.layout')

@section('header')

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Publicaciones</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>Inicio</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}"><i class="fas fa-list-ul"></i>Post</a></li>
      <li class="breadcrumb-item active"><i class="fas fa-map"></i>Crear</li>
    </ol>
  </div>
</div>

@stop

@section('content')

<section class="content">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Agregar un Usuario</h3>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">
          {{ $error }}
        </li>
        @endforeach
      </ul>

      @endif
      <form method="POST" enctype="multipart/form-data" files="true" action="{{ route('admin.users.update', $User) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input name="name" value="{{ old('name', $User->name) }}" class="form-control" placeholder="Ingresa aqui el nombre del usuario">
            </div>

            <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" name="password" class="form-control">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Correo Electronico:</label>
              <input name="email" type="email" value="{{ old('email', $User->email) }}" class="form-control" placeholder="Ingresa aqui el correo electronico">
            </div>

            <div class="form-group ">
              <label for="password_confirmed">Confirmar Contraseña:</label>
              <input type="password" name="password_confirmed" class="form-control">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary float-right">Agregar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

@stop