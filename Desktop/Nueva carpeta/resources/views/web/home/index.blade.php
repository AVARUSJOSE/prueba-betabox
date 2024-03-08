<x-layouts.web>

    <div
        style="min-height: 60vh; background: url({{ asset('img/projects.jpg') }}); display: flex; align-items: center; justify-content: center;">
        <div class="text-center">
            <h1 class="text-white">
                Bienvenido al sistema de publicaciones
            </h1>
            <p class="text-white">
                Aca podras conseguir los ultimos post de los usuarios.
            </p>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-6 mb-5">
                    <div class="card position-relative" style="overflow: hidden;">

                        <div class="row">
                            <div class="col-md-12"
                                style="height: 280px; border-radius: 10px; background: url({{ $post->imagePath }}); background-position: center; background-size: cover;">
                            </div>
                            <div class="col-md-12 p-4">
                                <h5>
                                    <a href="{{ route('post', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                </h5>
                                <p>
                                    {{ Str::words($post->description, 10) }}
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $post->user->imagePath }}"
                                                style="height: 40px; width: 40px; border-radius: 100%;" alt="">
                                            <p class="text-primary" style="margin-left: 5px; margin-bottom: 0;">
                                                {{ $post->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-end text-center">
                                        <a href="{{ route('post', $post) }}" class="btn btn-primary">
                                            Ver detalle
                                        </a>
                                        <p class="m-0">
                                            Comentarios: {{ $post->comments->count() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center col-md-12">
                    <br>
                    <br>
                    <br>
                    <h2 class="text-dark animate__animated animate__pulse animate__infinite">
                        No hemos encontrado Posts 😔
                    </h2>
                    <br>
                    <br>
                    <br>
                </div>
            @endforelse
        </div>
        @if ($posts->hasPages())
            <div class="d-flex align-items-center justify-content-center w-100">
                {{ $posts->links('web.pagination') }}
            </div>
        @endif
        <br>
        <br>
    </div>
</x-layouts.web>
