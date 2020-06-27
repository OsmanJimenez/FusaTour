@extends ('admin.layout')

@section('header')

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Publicaciones</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Lugares</a></li>
      <li class="breadcrumb-item active">Ver</li>
    </ol>
  </div>
</div>

@stop

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary">
        <div class="card-header ">
          <h3 class="card-title">Listado de Lugares</h3>
          <button class="btn  btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal">Crear publicación</button>
        </div>

        <div class="card-body">
          <table id="post-table" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Extracto</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->excerpt}}</td>
                <td>
                  <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-success" target="_blank">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-outline-info">
                    <i class="fas fa-pen"></i>
                  </a>
                  <a href="#" data-toggle="modal" data-target="#{{ $post->url }}" class="btn btn-sm btn-outline-dark">
                    <i class="fas fa-qrcode"></i>
                  </a>

                  <div class="modal fade" id="{{ $post->url }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body centrar" id="my-node{{ $post->id }}">

                          <script src="../../adminlts/js/qrcode.js"></script>
                          <input id="text{{ $post->id }}" class="ocultar width-medium-full" type="text" value="{{ $post->url }}" /><br />
                          <div id="qrcode{{ $post->id }}"></div>

                          <script type="text/javascript">
                            var qrcode = new QRCode(document.getElementById("qrcode{{ $post->id }}"), {
                              width: 200,
                              height: 200
                            });

                            function makeCode() {
                              var elText = document.getElementById("text{{ $post->id }}");

                              if (!elText.value) {
                                alert("Ingrese un Codigo");
                                elText.focus();
                                return;
                              }

                              qrcode.makeCode(elText.value);
                            }

                            makeCode();
                          </script>
                        </div>
                        <div class="modal-footer border-top">
                          <button type="button" id="foo{{ $post->id }}" class="btn btn-primary btn-lg btn-block">Descargar</button>
                          <script src="https://cdn.bootcss.com/dom-to-image/2.6.0/dom-to-image.min.js"></script>
                          <script src="https://cdn.bootcss.com/FileSaver.js/2014-11-29/FileSaver.min.js"></script>
                          <script>
                            var node = document.getElementById('my-node{{ $post->id }}');
                            var btn = document.getElementById('foo{{ $post->id }}');
                            btn.onclick = function() {
                              domtoimage.toBlob(document.getElementById('my-node{{ $post->id }}'))
                                .then(function(blob) {
                                  window.saveAs(blob, 'FusaTour_{{ $post->url }}.png');
                                });
                            }
                          </script>


                        </div>
                      </div>
                    </div>
                  </div>

                  <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" class="display-inline">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">
                      <i class="fas fa-trash"></i>
                    </button>

                    <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-bottom">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ¿Estas seguro de eliminar este lugar?
                          </div>
                          <div class="modal-footer border-top">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary">Eliminar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@stop