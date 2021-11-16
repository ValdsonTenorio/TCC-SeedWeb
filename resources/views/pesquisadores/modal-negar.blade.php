<div class="modal fade" id="modal-{{ $pesquisador->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle-{{ $pesquisador->id }}">Negar Solitação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('pesquisador.negar')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="pesquisador_id" value="{{ $pesquisador->id }}">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Justificativa</label>
                    <textarea name="justificativa" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                <button type="submit" class="btn btn-danger">Negar</button>
                <input name="_method" type="hidden" value="PUT">

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

        </div>
      </div>
    </div>
  </div>
