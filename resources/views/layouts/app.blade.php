<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Stock Manager</title>
        <!-- Favicon -->
        {{--<link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">--}}
        <link rel="icon" href="{{ asset('logo.jpg') }}" sizes="32x32" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link href="/css/animate.css" rel="stylesheet" />
        <link href="/css/smart_wizard_theme_circles.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- DatePicker CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css.map" rel="stylesheet" />


        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
{{--        <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>--}}
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Argon JS -->


        <style>
            @font-face{
                font-family: brown;
                src: url('{{ url('fonts/brown-regular.ttf') }}');
            }

            *{
                font-family: brown;
            }

            .fa{
                font-size: 20px ;
                vertical-align: middle;
            }
            .fa-pencil-alt{
                color: #aaa;
            }
            .fa-trash{
                color: #aaa;
            }
            .fa-pencil-alt:hover{
                color: steelblue;
            }
            .fa-trash:hover{
                color: orangered;
            }
            .fas{
                font-size: 20px
            }
            .fa-print{
                color: green;
            }
            .form-group{
                position: relative
            }
            .fa-plus-square{
                position: absolute;
                font-size: 2em;
                left: -38px;
                bottom: 7px;
                color: #5e72e4;
                cursor: pointer
            }
        </style>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        @include('modals')

        <script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>

        <script>

            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD HH:mm',
                language: 'fr',
                time: true,
//                minDate : new Date(),
                days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
                daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
                months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
                monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
                today: "Aujourd'hui",
                monthsTitle: "Mois",
                clear: "Effacer",
                weekStart: 1
            });

        </script>




        @stack('js')

        {{--<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}

    </body>
</html>
