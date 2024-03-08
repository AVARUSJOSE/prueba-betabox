<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Resetear contraseña | Construcciones Pichel</title>

    <!-- vector map CSS -->
    <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->

    <div class="wrapper pa-0">
        <header class="sp-header">
            <div class="sp-logo-wrap pull-left">
                <a href="{{route('home')}}">
                    <img class="brand-img mr-10" src="{{ asset('img/logo-small.jpg') }}" alt="brand" />
                    <span class="brand-text"><img src="{{ asset('img/logo.jpeg') }}" alt="brand"
                            style="width: 200px;" /></span>
                </a>
            </div>
            <div class="clearfix"></div>
        </header>

        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                            <div class="row">                                
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <h3 class="text-center txt-dark mb-10">Resetear Contraseña</h3>
                                        <h6 class="text-center nonecase-font txt-grey">
                                            ingresa tu nueva contraseña
                                        </h6>
                                    </div>
                                    <div class="form-wrap">
                                        <form action="{{ route('admin.resetPassword') }}" method="POST">
                                            @csrf
                                            <input style="display: none;" type="hidden" name="token" value="{{ $token }}">
                                            <div class="form-group @error('email') has-error @enderror">
                                                <label class="control-label mb-10" for="email">Correo electrónico</label>
                                                <input type="email" class="form-control" required="" id="email"
                                                    name="email" placeholder="Ingrese el correo"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                <div class="help-block with-errors">
                                                    <ul class="list-unstyled">
                                                        <li>{{ $message }}</li>
                                                    </ul>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('password') has-error @enderror">
                                                <label class="control-label mb-10" for="password">Nueva Contraseña</label>
                                                <input type="password" class="form-control" required="" id="password"
                                                    name="password" placeholder="Ingrese la nueva contraseña"
                                                    value="{{ old('password') }}">
                                                @error('password')
                                                <div class="help-block with-errors">
                                                    <ul class="list-unstyled">
                                                        <li>{{ $message }}</li>
                                                    </ul>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('password_confirmation') has-error @enderror">
                                                <label class="control-label mb-10" for="password_confirmation">Verifique la Contraseña</label>
                                                <input type="password" class="form-control" required="" id="password_confirmation"
                                                    name="password_confirmation" placeholder="Ingrese la nueva contraseña"
                                                    value="{{ old('password_confirmation') }}">
                                                @error('password_confirmation')
                                                <div class="help-block with-errors">
                                                    <ul class="list-unstyled">
                                                        <li>{{ $message }}</li>
                                                    </ul>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-orange btn-rounded">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('js/init.js') }}"></script>
</body>

</html>