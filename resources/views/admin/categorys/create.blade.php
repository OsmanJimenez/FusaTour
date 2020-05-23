<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('admin.categorys.store') }}">
    {{ csrf_field() }}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega el titulo de la categoria</h5>
          <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
          <div class="form-group">
                    {{-- <label>Nombre del Lugar</label> --}}
                    <input name="name" 
                    
                    class="form-control" placeholder="Ingresa aqui el nombre de la categoria" >
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button  class="btn btn-primary">Crear publicación</button>
        </div>
      </div>
    </div>
  </form>
</div>