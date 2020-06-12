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
      <h3 class="card-title">Agregar un Lugar</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" files="true" action="{{ route('admin.posts.update', $post) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">
          <div class="col-md-8">

            <div class="form-group">
              <label>Nombre del Lugar</label>
              <input name="title" value="{{ old('title', $post->title) }}" class="form-control" placeholder="Ingresa aqui el nombre del lugar" required>
            </div>

            <div class="form-group">
                  <label>Categoria</label>
                  <select name="category" 
                  class="form-control" style="width: 100%;" required>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id}}"
                      {{ old('category', $post->category_id) }}
                      >{{$category->name}} </option>  
                    @endforeach
                    
                  </select>
                </div>
            

            <div class="form-group">
              <label>Información</label>
              <div class="card-body pad">
                <div class="mb-4">
                  <textarea name="body" class="textarea " placeholder="Información del Lugar" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{ old('body', $post->body) }}
                  </textarea>
                </div>
              </div>
            </div>


          </div>

          <div class="col-md-4">

            <div class="form-group">
              <label>Fecha de Publicación:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('d/m/Y') :
                    null) }}" type="date" class="form-control float-right" required>
              </div>
              <!-- /.input group -->
            </div>

            <div class="form-group">
              <label>Ubicación</label>
              <input name="ubicacion" value="{{ old('ubicacion', $post->ubicacion) }}" class="form-control" placeholder="Ingresa aqui la ubicación del sitio" required>
            </div>


            <div class="form-group">
              <label>Etiquetas</label>
              <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o mas Etiquetas" style="width: 100%;" required>
                @foreach ($tags as $tag )
                <option {{ collect(old('tags')) }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
            

            <div class="form-group">
              <label for="exampleInputFile">Caratula</label>
              <input value="{{ old('urlimg', $post->urlimg) }}" type="file" name="urlimg" required>
            </div>

            <div class="form-group">
              <label>Extracto del Lugar</label>
              <textarea rows="4" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}" class="form-control" placeholder="">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="form-group">
              <label>Realidad Virtual</label>
              <input name="urlvr" value="{{ old('urlvr', $post->urlvr) }}" class="form-control" placeholder="Ingresa aqui la url de la realidad virtual" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary float-right">Agregar</button>
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->

        </div>
      </form>
      <!-- /.row -->


      <!-- /.row -->
    </div>
    <!-- /.card-body -->
  </div>



</section>


@stop