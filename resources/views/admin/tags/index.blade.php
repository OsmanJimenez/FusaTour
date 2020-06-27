@extends ('admin.layout')

@section('header')

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Publicaciones</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Actividades</a></li>
      <li class="breadcrumb-item active">Ver</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

@stop

@section('content')
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary">
        <div class="card-header ">
          <h3 class="card-title">Listado de Actividades</h3>
          <button class="btn  btn-outline-primary float-right" data-toggle="modal" data-target="#prueba2">Crear actividad</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="post-table" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tags as $tag)

              <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                  <a href="{{ route('actividades.show', $tag) }}" class="btn btn-sm btn-outline-success" target="_blank">
                    <i class="fas fa-eye"></i>
                  </a>

                  <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-outline-info">
                    <i class="fas fa-pen"></i>
                  </a>

                  <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" style="display: inline">
                    {{ csrf_field() }} {{ method_field('DELETE') }}

                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{ $tag->id }}">
                      <i class="fas fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="border-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ¿Estas seguro de eliminar esta actividad?
                          </div>
                          <div class="modal-footer" style="border-top: 0px;">
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