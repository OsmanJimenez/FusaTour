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
              <select name="category" class="form-control" style="width: 100%;" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id}}" {{ old('category', $post->category_id) }}>{{$category->name}} </option>
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
              <div class="space_small"></div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
                Realidad Virtual
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Formulario de Realidad Virtual</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div class="container-fluid">

                        <div class="row" style="margin-bottom: 20px;">
                          <div class="col-md-4">
                            <button class="btn btn-outline-primary" type="button" value="Botón 2" onclick="mostrarMurales()" lang="es">
                              1 Escena
                            </button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-outline-primary" type="button" value="Botón 1" onclick="mostrarMonumentos()" lang="es">
                              2 Escenas
                            </button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-outline-primary" type="button" value="Botón 3" onclick="mostrarEcoturismo()">
                              3 Escenas
                            </button>
                          </div>
                        </div>

                        <div class="row" id="color-1" style="margin-bottom: 20px; display: none;">
                          <label>Color de las paredes:</label>
                          <div id="color-2" class="input-group my-colorpicker2" style="margin-bottom: 20px;">
                            <input type="text" name="color_vr" class="form-control">

                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-square"></i></span>
                            </div>
                          </div>

                          <label>Pintor/Escultor:</label>
                          <div id="pintor-2" class="input-group " style="margin-bottom: 20px;">
                            <input type="text" name="pintor_vr" class="form-control">
                          </div>


                          <div class="col-md-12 custom-file" style="margin-bottom: 20px;">
                            <input style="display: none;" id="input-1" class="custom-file-input" type="file" name="vrimg_1" lang="es">
                            <label style="display: none;" id="label-1" class="custom-file-label" for="exampleInputFile">Primera Imagen</label>

                          </div>
                        </div>

                        <div class="row" style="margin-bottom: 20px;">
                          <div class="col-md-6 custom-file" style="margin-bottom: 20px;">
                            <input style="display: none;" id="input-2" class="custom-file-input" type="file" name="vrimg_2">
                            <label style="display: none;" id="label-2" class="custom-file-label" for="exampleInputFile">Segunda Imagen</label>
                          </div>
                          <div class="col-md-6 custom-file" style="margin-bottom: 20px;">
                            <input style="display: none;" id="input-3" class="custom-file-input" type="file" name="vrimg_3">
                            <label style="display: none;" id="label-3" class="custom-file-label" for="exampleInputFile">Tercera Imagen</label>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="space_small"></div>
                    <label style="display: none;" id="label-4" for="exampleInputFile">Cuarta Imagen</label>
                    <input style="display: none;" id="input-4" type="file" name="vrimg_4" value="0">

                    <div class="space_small"></div>
                    <label style="display: none;" id="label-5" for="exampleInputFile">Quinta Imagen</label>
                    <input style="display: none;" id="input-5" type="file" name="vrimg_5" value="0">

                    <script>
                      var input_1 = document.getElementById('input-1');
                      var input_2 = document.getElementById('input-2');
                      var input_3 = document.getElementById('input-3');
                      var input_4 = document.getElementById('input-4');
                      var input_5 = document.getElementById('input-5');

                      var label_1 = document.getElementById('label-1');
                      var label_2 = document.getElementById('label-2');
                      var label_3 = document.getElementById('label-3');
                      var label_4 = document.getElementById('label-4');
                      var label_5 = document.getElementById('label-5');

                      var color_1 = document.getElementById('color-1');
                      var pintor_1 = document.getElementById('pintor-1');
                      var pintor_vr = document.getElementById('pintor_vr');



                      function mostrarMurales() {
                        color_1.style.display = 'inline';
                        input_1.style.display = 'inline';
                        input_2.style.display = 'inline';
                        input_3.style.display = 'inline';
                        input_4.style.display = 'none';
                        input_5.style.display = 'none';

                        label_1.style.display = 'inline';
                        label_2.style.display = 'inline';
                        label_3.style.display = 'inline';
                        label_4.style.display = 'none';
                        label_5.style.display = 'none';
                      }

                      function mostrarMonumentos() {
                        color_1.style.display = 'inline';
                        input_1.style.display = 'inline';
                        input_2.style.display = 'inline';
                        input_3.style.display = 'inline';
                        input_4.style.display = 'inline';
                        input_5.style.display = 'none';

                        label_1.style.display = 'inline';
                        label_2.style.display = 'inline';
                        label_3.style.display = 'inline';
                        label_4.style.display = 'inline';
                        label_5.style.display = 'none';
                      }

                      function mostrarEcoturismo() {
                        color_1.style.display = 'inline';
                        input_1.style.display = 'inline';
                        input_2.style.display = 'inline';
                        input_3.style.display = 'inline';
                        input_4.style.display = 'inline';
                        input_5.style.display = 'inline';

                        label_1.style.display = 'inline';
                        label_2.style.display = 'inline';
                        label_3.style.display = 'inline';
                        label_4.style.display = 'inline';
                        label_5.style.display = 'inline';
                      }
                    </script>


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