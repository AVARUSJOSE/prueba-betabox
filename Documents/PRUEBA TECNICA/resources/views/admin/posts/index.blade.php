<x-layouts.admin title="Posts" section-title="Posts">
    <div class="row mt-10">
        <div class="col-md-12">
            <div class="text-right mb-5">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    Crear Post
                </a>
            </div>
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Imagen</th>
                                        <th>Comentarios</th>
                                        <th>Fecha de creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <img style="width: 150px; height: 100px;" src="{{ $post->imagePath }}"
                                                    alt="{{ $post->title }}">
                                            </td>
                                            <td>{{ $post->comments->count() }}</td>
                                            <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                                            <td style="white-space: no-wrap">
                                                <a href="{{ route('admin.posts.edit', $post) }}"
                                                    class="btn btn-primary btn-sm btn-icon-anim btn-square"><i
                                                        class="icon-pencil"></i></a>
                                                <div style="display: inline" x-data>
                                                    <form x-ref="form"
                                                        action="{{ route('admin.posts.destroy', $post) }}"
                                                        method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btn-icon-anim btn-square"
                                                        x-on:click="
                                                        swal({   
                                                            title: '¿Está seguro?',
                                                            text: 'No podrá revertir esta acción',
                                                            type: 'warning',
                                                            showCancelButton: true,   
                                                            confirmButtonColor: '#e6b034',
                                                            confirmButtonText: 'Si, eliminarlo!',
                                                        }, () => $refs.form.submit());
                                                    "><i
                                                            class="icon-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($posts->hasPages())
                        <div class="panel-footer">
                            {{ $posts->links() }}
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
