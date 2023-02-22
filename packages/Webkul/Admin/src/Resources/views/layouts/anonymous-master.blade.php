<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/webkul/admin/assets/images/favicon/favicon.ico') }}">
        <link rel="manifest" href="{{ asset('vendor/webkul/admin/assets/images/favicon/manifest.json') }}">

        <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/webkul/admin/assets/css/admin.css') }}">


        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>



        @yield('head')

        @yield('css')
        @stack('css')

        {!! view_render_event('admin.anonymous-layout.head') !!}
    </head>


    <body>
        <div id="app" class="anonymous-layout-container">
            <spinner-meter :full-page="true" v-if="! pageLoaded"></spinner-meter>

            <flash-wrapper ref='flashes'></flash-wrapper>

            <div class="center-box">
                <div class="adjacent-center">

                    <div class="brand-logo">
                        <img src="{{ asset('vendor/webkul/admin/assets/images/logo.svg') }}" alt="{{ config('app.name') }}"/>

                        <p>SOOM CRM</p>
                    </div>

                    {!! view_render_event('admin.anonymous-layout.content.before') !!}

                    @yield('content')

                    {!! view_render_event('admin.layout.content.after') !!}

                </div>
            </div>
        </div>

        <script type="text/javascript">
            window.flashMessages = [];

            @if ($success = session('success'))
                window.flashMessages = [{'type': 'success', 'message': "{{ $success }}" }];
            @elseif ($warning = session('warning'))
                window.flashMessages = [{'type': 'warning', 'message': "{{ $warning }}" }];
            @elseif ($error = session('error'))
                window.flashMessages = [{'type': 'error', 'message': "{{ $error }}" }];
            @endif


            window.serverErrors = [];

            @if (isset($errors) && count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        </script>

        <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>




        @stack('scripts')

        {!! view_render_event('admin.anonymous-layout.body.after') !!}

        <!--------------------------------------------------------------------------------->

        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/particles.js') }}"></script>


        <canvas class="background" ></canvas>

        <script>
            window.onload = function() {
                Particles.init({
                    selector: '.background',
                    color: '#75A5B7',
                    maxParticles: 130,
                    connectParticles: true,
                    responsive: [
                        {
                            breakpoint: 768,
                            options: {
                                maxParticles: 80
                            }
                        }, {
                            breakpoint: 375,
                            options: {
                                maxParticles: 50
                            }
                        }
                    ]
                });
            };
        </script>
        <style>
            .background {
                position:  absolute;
                display:  block;
                top: 0;
                left: 0;
                z-index: -1;
            }
        </style>
        <!--------------------------------------------------------------------------------->

    </body>

</html>




