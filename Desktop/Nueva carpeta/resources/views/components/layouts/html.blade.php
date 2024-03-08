@props([
    'title' => null,
])

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/logo.ico') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ? "$title |" : '' }} {{ env('APP_NAME') }}</title>
    @isset($styles)
        {{ $styles }}
    @endisset
</head>

<body>
    {{ $slot }}

    @isset($scripts)
        {{ $scripts }}
    @endisset
</body>

</html>
