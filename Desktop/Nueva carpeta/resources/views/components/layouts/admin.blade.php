@props([
    'title' => null,
    'sectionTitle' => null,
])

<x-layouts.html :title="$title">
    <x-slot name="styles">
        <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css">

        <!--alerts CSS -->
        <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css">

        <!-- select2 CSS -->
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

        @stack('styles')
    </x-slot>

    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper theme-2-active navbar-top-light">
        <!-- Top Menu Items -->
        <x-admin.header />
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        <x-admin.sidebar-menu />
        <!-- /Left Sidebar Menu -->

        <!-- Main Content -->
        <div class="page-wrapper" style="max-width: 100%; overflow-x: auto;">
            <div class="container">
                <!-- Title -->
                <div class="row heading-bg">
                    @if ($sectionTitle)
                        <div class="col-md-12">
                            <h5 class="txt-dark">{{ $sectionTitle }}</h5>
                        </div>
                    @endif

                    <div class="col-md-12">
                        {{ $slot }}
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
            </div>
        </div>
        <!-- /Main Content -->
    </div>

    <x-slot name="scripts">
        <!-- jQuery -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>

        <!-- Slimscroll JavaScript -->
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

        <!-- Fancy Dropdown JS -->
        <script src="{{ asset('js/dropdown-bootstrap-extended.js') }}"></script>





        <!-- Sweet-Alert  -->
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>

        <!-- Select2 JavaScript -->
        <script src="{{ asset('js/select2.full.min.js') }}"></script>

        <!-- Init JavaScript -->
        <script src="{{ asset('js/init.js') }}"></script>
        {{-- <script src="dist/js/dashboard-data.js"></script> --}}

        @stack('scriptsBeforeApp')

        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            const renderImage = (image) => {
                return `
                    <img style="width: 100%; height: 300px;" src="${URL.createObjectURL(image)}" />
                `
            }

            $('#image-picker').change((event) => {
                const image = event.target.files[0];
                $('#render-preview').html(renderImage(image))
            })
        </script>

        @stack('scripts')
    </x-slot>
</x-layouts.html>
