@extends ('admin.layout')

@section('header')

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Publicaciones</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Categorias</a></li>
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
          <h3 class="card-title">Listado de Categorias</h3>
          <button class="btn  btn-outline-primary float-right" data-toggle="modal" data-target="#prueba">Crear categoria</button>
        </div>
        
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
              @foreach ($categorys as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                  <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-success" target="_blank">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('admin.categorys.edit', $category) }}" class="btn btn-sm btn-outline-info">
                    <i class="fas fa-pen"></i>
                  </a>
                  <form method="POST" action="{{ route('admin.categorys.destroy', $category) }}" class="display-inline">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{ $category->id }}">
                      <i class="fas fa-trash"></i>
                    </button>

                    <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-bottom">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ¿Estas seguro de eliminar esta categoria?
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