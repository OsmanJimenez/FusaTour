@extends ('admin.layout')

@section('header')

    <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Publicaciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Lugares</a></li>
              <li class="breadcrumb-item active">Ver</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

@stop


@section('content')
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary" >
            <div class="card-header ">
              <h3 class="card-title">Listado de Lugares</h3>
              <button class="btn  btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal">Crear publicación</button>
            </div>
            <!-- /.card-header -->
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
                                    <a href="{{ route('posts.show', $post) }}" 
                                    class="btn btn-sm btn-outline-success"
                                    target="_blank"><i class="fas fa-eye"></i></a>

                                    <a href="{{ route('admin.posts.edit', $post) }}"  
                                    class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-pen"></i></a>

                                    <a href="#" 
                                    data-toggle="modal"  data-target="#{{ $post->url }}" 
                                    class="btn btn-sm btn-outline-dark">
                                    <i class="fas fa-qrcode"></i></a>

<!-- Modal -->
<div class="modal fade" id="{{ $post->url }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Codigo QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <script src="../../adminlts/js/qrcode.js"></script>
      <input id="text{{ $post->id }}" style="display: none;" type="text" value="{{ $post->url }}" style="width:80%" /><br />
<div id="qrcode{{ $post->id }}" style="width:100px; height:100px; margin-top:15px;"></div>

<script type="text/javascript">

var qrcode = new QRCode(document.getElementById("qrcode{{ $post->id }}"), {
	width : 100,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("text{{ $post->id }}");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text{{ $post->id }}").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Descargar</button>
      </div>
    </div>
  </div>
</div>



                                    <form method="POST" 
                                    action="{{ route('admin.posts.destroy', $post) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                      <button class="btn btn-sm btn-outline-danger" 
                                      onclick="return confirm('¿Estas seguro que deseas eliminar el lugar?')"
                                      ><i class="fas fa-trash"></i></button>
                                    </form>
                                    
                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Modal -->
      

    </section>

@stop