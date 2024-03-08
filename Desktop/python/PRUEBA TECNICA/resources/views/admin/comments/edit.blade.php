<x-layouts.admin title="Editar - Comentario" section-title="Editar Comentario">
    <div class="row mt-10">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Editar Comentario</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            {{-- Text --}}
                            <div class="form-group @error('text') has-error @enderror">                                
                                <input type="text" class="form-control" required="" id="text" name="text" placeholder="Ingrese el comentario" value="{{ old('text', $comment->text) }}">
                                <input type="hidden" hidden name="new_note_id" value="{{ old('new_note_id', $comment->newNote->id) }}">
                                @error('text')
                                    <div class="help-block with-errors"><ul class="list-unstyled"><li>{{ $message }}</li></ul></div>
                                @enderror
                            </div>
                            <div class="text-right">
                                <a href="{{route('admin.comments.index')}}" class="btn btn-danger">Cancelar</a>
                                <button class="btn btn-orange">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>