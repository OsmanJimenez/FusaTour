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
      <h3 class="card-title">Agregar un Lugar</h3>
    </div>

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
              <select name="category" class="form-control width-full" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id}}" {{ $category->id === $post->category_id ? ' selected' : '' }}>{{$category->name}} </option>
                @endforeach

              </select>
            </div>

            <div class="form-group">
              <label>Información</label>
              <div class="card-body pad">
                <div class="mb-4">
                  <textarea name="body" class="textarea informacion" placeholder="Información del Lugar">
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
                <input name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') :
                    null) }}" type="date" class="form-control float-right" required>
              </div>
            </div>

            <div class="form-group">
              <label>Ubicación</label>
              <input name="ubicacion" value="{{ old('ubicacion', $post->ubicacion) }}" class="form-control" placeholder="Ingresa aqui la ubicación del sitio" required>
            </div>

            <div class="form-group">
              <label>Etiquetas</label>
              <select name="tags[]" class="form-control select2 width-full" multiple="multiple" data-placeholder="Selecciona una o mas Etiquetas" required>
                @foreach ($tags as $tag )
                <option {{ collect(old("tags")) }} value="{{ $tag->id }}">{{ $tag->name }}</option>

                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Caratula</label>
              <div class="col-md-12 custom-file margin-bottom">
                <input class="custom-file-input" type="file" name="urlimg" required>
                <label class="custom-file-label" for="exampleInputFile">Selecciona una imagen</label>
              </div>
            </div>

            <div class="form-group">
              <label>Extracto del Lugar</label>
              <textarea rows="4" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}" class="form-control" placeholder="">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="form-group">
              <label>Realidad Virtual</label>
              <div class="space_small"></div>

              <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
                Realidad Virtual
              </button>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Formulario de Realidad Virtual</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body" id="tab" >
                      <div class="container-fluid">
                        <label id="labelus" class="custom-label">Normal</label>

                        <div class="row margin-bottom">

                          <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-lg btn-block" data-toggle="tooltip" data-html="true" title="1 imagen de banner | 2 imagenes laterales" type="button" value="Botón 2" onclick="escena_1()">
                              1 Escena
                            </button>
                          </div>
                          <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-lg btn-block" data-toggle="tooltip" data-html="true" title="1 imagen de banner | 1 imagen lateral | 1 Descripción lateral" type="button" value="Botón 1" onclick="escena_2()">
                              2 Escena
                            </button>
                          </div>
                        </div>
                        <label id="labelu" class="custom-label">360</label>
                        <div class="row margin-bottom">

                          <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-lg btn-block" data-toggle="tooltip" data-html="true" title="4 imagenes 360 con indicadores" type="button" value="Botón 3" onclick="escena_3()">
                              3 Escena
                            </button>
                          </div>

                          <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-lg btn-block" data-toggle="tooltip" data-html="true" title="6 imagenes 360 con indicadores" type="button" value="Botón 3" onclick="escena_4()">
                              4 Escena
                            </button>
                          </div>
                        </div>


                        <input type="text" id="escena" class="ocultar" name="escena">

                        <div class="row ocultar" id="color-1">
                          <label>Color de las paredes:</label>
                          <div id="color-2" class="input-group my-colorpicker2 margin-bottom">
                            <input type="text" name="color_vr" class="form-control">

                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-square"></i></span>
                            </div>
                          </div>

                          <label>Pintor/Escultor:</label>
                          <div id="pintor-2" class="input-group margin-bottom">
                            <input type="text" name="pintor_vr" class="form-control">
                          </div>

                        </div>

                        <div class="row ocultar" id="div_1">
                          <div class="col-md-12 custom-file margin-bottom ">
                            <input id="input-1" class="custom-file-input ocultar" type="file" name="vrimg_1">
                            <label id="label-1" class="custom-file-label ocultar" for="exampleInputFile">Primera Imagen</label>
                          </div>
                        </div>


                        <div class="row ocultar" id="div_2">
                          <div class="col-md-12 custom-file margin-bottom">
                            <input id="input-2" class="custom-file-input ocultar" type="file" name="vrimg_2">
                            <label id="label-2" class="custom-file-label ocultar" for="exampleInputFile">Segunda Imagen</label>
                          </div>
                          <div class="col-md-12 custom-file margin-bottom">
                            <input id="input-3" class="custom-file-input ocultar" type="file" name="vrimg_3">
                            <label id="label-3" class="custom-file-label ocultar" for="exampleInputFile">Tercera Imagen</label>

                            <input id="input-6" class="form-control ocultar" name="content" placeholder="Ingresa aqui el contenido">
                          </div>
                        </div>

                        <div class="row ocultar" id="div_3">
                          <div class="col-md-12 custom-file margin-bottom">
                            <input class="custom-file-input ocultar" id="input-4" type="file" name="vrimg_4">
                            <label class="custom-file-label ocultar" id="label-4" for="exampleInputFile">Cuarta Imagen</label>
                          </div>
                        </div>

                        <div class="row ocultar" id="div_4">
                          <div class="col-md-12 custom-file margin-bottom">
                            <input class="custom-file-input ocultar" id="input-5" type="file" name="vrimg_5">
                            <label class="custom-file-label ocultar" id="label-5" for="exampleInputFile">Quinta Imagen</label>
                          </div>

                          <div class="col-md-12 custom-file margin-bottom">
                            <input class="custom-file-input ocultar" id="input-7" type="file" name="vrimg_6">
                            <label class="custom-file-label ocultar" id="label-7" for="exampleInputFile">Sexta Imagen</label>
                          </div>
                        </div>

                      </div>
                    </div>






                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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