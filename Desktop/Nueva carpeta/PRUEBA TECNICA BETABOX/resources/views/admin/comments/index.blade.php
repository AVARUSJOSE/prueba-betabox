<x-layouts.admin title="Comentarios" section-title="Comentarios">
    <div class="row mt-10">
        <div class="col-md-12">            
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Comentario</th>
                                        <th>Blog</th>
                                        <th>Fecha de creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>                                            
                                                {{ $comment->id }}
                                            </td>
                                            <td>
                                                <a href="{{route('newNotes.show', $comment->newNote)}}" target="_blank">{{ $comment->text }}</a>                                            
                                            </td>
                                            <td>
                                                <a href="{{route('newNotes.show', $comment->newNote)}}" target="_blank">
                                                    {{ $comment->newNote->title }}
                                                </a>
                                            </td>
                                            <td>{{ $comment->created_at->format('d/m/Y')}}</td>
                                            <td style="white-space: no-wrap">
                                                <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-primary btn-sm btn-icon-anim btn-square"><i class="icon-pencil"></i></a>
                                                <div style="display: inline" x-data>
                                                    <form x-ref="form" action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm btn-icon-anim btn-square" x-on:click="
                                                        swal({   
                                                            title: '¿Está seguro?',
                                                            text: 'No podrá revertir esta acción',
                                                            type: 'warning',
                                                            showCancelButton: true,   
                                                            confirmButtonColor: '#e6b034',
                                                            confirmButtonText: 'Si, eliminarlo!',
                                                        }, () => $refs.form.submit());
                                                    "><i class="icon-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                    @if ($comments->hasPages())
                        <div class="panel-footer">
                            {{ $comments->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            @if ($success = session('success'))
                swal({
                    title: @json($success),
                    type: "success",
                });
            @endif
        </script>
    @endpush
</x-layouts.admin>