@extends('admin.layout')

@section('header')

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Publicaciones</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>Inicio</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}"><i class="fas fa-list-ul"></i>Post</a></li>
      <li class="breadcrumb-item active"><i class="fas fa-map"></i>Crear</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

@stop

@section('content')

<section class="content">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Agregar una Categoria</h3>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" files="true" action="{{ route('admin.categorys.update', $Category) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>Nombre de la Categoria</label>
              <input name="name" value="{{ old('name', $Category->name) }}" class="form-control" placeholder="Ingresa aqui el nombre de la categoria" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
            <label for="exampleInputFile">Caratula</label>
              <div class="col-md-12 custom-file margin-bottom">
                <input class="custom-file-input" type="file" name="urlimg" required>
                <label class="custom-file-label" for="exampleInputFile">Selecciona una imagen</label>
              </div>
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