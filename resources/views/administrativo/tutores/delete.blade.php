<div class="modal fade" id="model-delete-{{$tutor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.destroyTutores', $tutor->id) }}">
            @csrf
           @method('DELETE')
           
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar registros</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Estas seguro que deseas eliminar al tutor {{$tutor->nombre." ".$tutor->apellido_p." ".$tutor->apellido_m}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-danger" value="Eliminar">
        </div>
      </div>
    </form>
    </div>
  </div>