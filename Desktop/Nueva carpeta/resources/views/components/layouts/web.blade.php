@props([
    'title' => null,
])

<x-layouts.html :title="$title">
    <x-slot name="styles">
        <!-- CSS Files
        ================================================== -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <link href="{{ asset('css/sweetalert.min.css') }}" rel="stylesheet" type="text/css">

        @stack('styles')
    </x-slot>

    <div id="wrapper">
        <x-web.header></x-web.header>
        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            {{ $slot }}
        </div>
        <x-web.footer></x-web.footer>
    </div>

    <x-slot name="scripts">
        @stack('beforeScripts')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

        <script src="{{ asset('js/sweetalert.min.js') }}"></script>

        <script>
            var title = @json(session('success')) || '';
            var message = @json(session('message')) || '';

            @if ($success = session('success'))
                swal({
                    title: title,
                    text: message,
                    type: "success",
                });
            @endif
        </script>

        @stack('scripts')
    </x-slot>
</x-layouts.html>
