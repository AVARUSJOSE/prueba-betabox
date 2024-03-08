<x-layouts.web>
    <div
        style="min-height: 60vh; background: url({{ $post->imagePath }}); display: flex; align-items: center; justify-content: center; background-size: 100% 100%; background-position: center;">
        <div class="text-center">
            <h1 class="text-white">
                {{ $post->title }}
            </h1>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="text-primary">
                    <b>Creado Por:</b>
                </p>
                <div class="d-flex align-items-center">
                    <img src="{{ $post->user->imagePath }}" style="height: 40px; width: 40px; border-radius: 100%;"
                        alt="">
                    <p class="text-primary" style="margin-left: 5px; margin-bottom: 0;">
                        {{ $post->user->name }}
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-primary">
                    <b>Fecha de creación</b>
                </p>
                {{ $post->created_at->format('d/m/Y H:i:s') }}
            </div>
            <div class="col-md-3">
                <p class="text-primary">
                    <b>Comentarios</b>
                </p>
                {{ $post->comments->count() }} Comentarios.
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container" style="background:whitesmoke; padding: 50px; border-radius: 10px;">
        {{ $post->description }}
    </div>
    <br>
    <br>
    <br>
    <div class="container text-center" style="background:whitesmoke; padding: 50px; border-radius: 10px;">
        <h3>
            Comentarios
        </h3>
        <ul style="max-height: 60vh; overflow-y: auto;">
            @forelse ($comments as $comment)
                <li class="mb-5" style="background:white; padding: 20px; border-radius: 10px;">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{ $comment->user->imagePath }}"
                                style="height: 40px; width: 40px; border-radius: 100%;" alt="">
                            <p class="text-primary" style="margin-left: 5px; margin-bottom: 0;">
                                {{ auth()->user()->id === $comment->user_id ? 'Tú' : $comment->user->name }}
                            </p>
                        </div>
                        <div>
                            {{ $comment->created_at->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                    <p class="text-start mt-3 mb-0">
                        {{ $comment->message }}
                    </p>
                </li>
            @empty
                <li class="my-5" style="background:white; padding: 20px; border-radius: 10px;">
                    <h4 class="text-center text-danger">
                        Este Post no contiene comentarios.
                    </h4>
                </li>
            @endforelse
            @if ($comments->hasPages())
                <li class="d-flex align-items-center justify-content-center w-100">
                    {{ $comments->links('web.pagination') }}
                </li>
            @endif
        </ul>
        @auth
            <form class="row" method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="input-group has-validation">
                    <div class="form-floating @error('message') is-invalid @enderror">
                        <input type="text" class="form-control @error('message') is-invalid @enderror" name="message"
                            required="" value="{{ old('message') }}" id="message" placeholder="Escribe el mensaje"
                            required>
                        <label for="message">Mensaje</label>
                    </div>
                    <button class="input-group-text btn btn-primary">
                        Enviar
                    </button>
                    @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>
        @endauth
        @guest
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h5>Debes iniciar sesión para poder comentar</h5>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.login') }}" class="btn btn-primary w-100">
                        Iniciar Sesión
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary w-100">
                        Resgistrarse
                    </a>
                </div>
            </div>
        @endguest
    </div>
    <br>
    <br>
    <br>
</x-layouts.web>
