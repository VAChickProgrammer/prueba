<!-- editar-cargo -->
<div class="modal fade" id="editModal{{ $cargo->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $cargo->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $cargo->id }}">Editar Cargo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarForm" action="{{ route('cargo.update', $cargo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cargo->nombre }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $cargo->descripcion }}" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado">
                        <option value="1" {{ $cargo->estado == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $cargo->estado == '0' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>  
                
                <!-- ... Código posterior ... -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>