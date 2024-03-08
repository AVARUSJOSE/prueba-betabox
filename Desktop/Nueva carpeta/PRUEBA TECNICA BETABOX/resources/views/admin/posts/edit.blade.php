<x-layouts.admin title="Editar Post" section-title="Posts">
    <div class="row mt-10">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Editar Post</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form action="{{ route('admin.posts.update', $post) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('image') has-error @enderror">
                                        <label for="image-picker" class="btn btn-primary">Cargar Imagen</label>
                                        <span>Resolución recomendada: 1024 x 800</span>
                                        <input type="file" hidden id="image-picker" style="display: none;"
                                            accept="image/png, image/gif, image/jpeg" name="image">
                                        <div id="render-preview" class="mt-5 text-center">
                                            <img style="width: 100%; height: 300px;" src="{{ $post->imagePath }}" />
                                        </div>
                                        @error('image')
                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $message }}</li>
                                                </ul>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Title --}}
                                <div class="col-md-12">
                                    <div class="form-group @error('title') has-error @enderror">
                                        <label class="control-label mb-10" for="title">Titulo del post</label>
                                        <input type="text" class="form-control" required="" id="title"
                                            name="title" placeholder="Ingrese el nombre"
                                            value="{{ old('title', $post->title) }}">
                                        @error('title')
                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $message }}</li>
                                                </ul>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('description') has-error @enderror">
                                        <label class="control-label mb-10">Descripción</label>
                                        <textarea class="form-control" placeholder="descripción" name="description" rows="5">{{ old('description', $post->description) }}</textarea>
                                        @error('description')
                                            <div class="help-block with-errors">
                                                <ul class="list-unstyled">
                                                    <li>{{ $message }}</li>
                                                </ul>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-orange">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
