<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{trans('general.project_title')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 4.1.0 -->
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="{{ asset('components/bootstrap-lightbox/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('components/bootstrap4/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">
    <!-- THEME CSS -->
    <link href="{{ asset('components/smarty/css/essentials.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/layout-datatables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/thematics-education.css') }}" rel="stylesheet" type="text/css" />
    <!-- PAGE LEVEL SCRIPTS -->
    <link href="{{ asset('components/smarty/css/header-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
    {{--<link href="{{ asset('components/datatables/datatables.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('components/datatables/dist/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('components/ol/css/ol.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('global_js')
    <script src="{{ asset('components/ol/build/ol.js') }}"></script>
    <script src="{{ asset('components/jquery3/jquery.js') }}"></script>
    <script src="{{ asset('components/bootstrap4/js/plugins/bootstrap3-typeahead.js') }}"></script>
{{--    <script src="{{ asset('components/datatables/dist/js/jquery.dataTables.js') }}"></script>--}}
    <script src="{{ asset('components/datatables/datatables.js') }}"></script>
    <script src="{{ asset('components/datatables/dist/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAgWF-GRSLtIVbfOI9tEHOIZfim4M7l29E"></script>
    <script src="{{ asset('components/bootstrap4/js/bootstrap.js') }}"></script>
    @yield('css')

    <style type="text/css">
 
 li a{
    margin-top: -10px;
 }
</style>
</head>

<body class="smoothscroll enable-animation">
{{--@include('home.contents.slidetop')--}}
<div id="wrapper">
    @include('home.layouts.nav')
    @yield('content')
    @include('home.layouts.footer')
</div>


<script src="{{ asset('components/datatables/dist/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('components/bootstrap4/js/bootstrap.js') }}"></script>
<script src="{{ asset('components/bootstrap-lightbox/lightbox.js') }}"></script>
<script src="{{ asset('components/smarty/js/scripts.js') }}"></script>
<script src="{{ asset('components/smarty/plugins/bootstrap.datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('components/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/exporting.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/offline-exporting.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/export-data.js') }}"></script>
<script src="{{ asset('components/smarty/plugins/jquery.mb.YTPlayer/dist/jquery.mb.YTPlayer.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {    
            $('#Carousel').carousel({        
                interval: 5000    
            }
            )
        }
        );
        
    </script>

<script src="{{ asset('js/wis.js') }}"></script>
@yield('scripts')
</body>
</html>
