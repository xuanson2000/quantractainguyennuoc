<!DOCTYPE html>
<html class="map-container">
<head>
    <meta charset="UTF-8">
    <title>Quan trắc - Cảnh báo - Dự báo TNN</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.0 -->
    <link rel="stylesheet" href="{{ asset('components/bootstrap4/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">

    <link href="{{ asset('components/jquery-easyui/themes/metro/easyui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/jquery-easyui/themes/icon.css') }}" rel="stylesheet" type="text/css">
    <!-- THEME CSS -->
    <link href="{{ asset('components/smarty/css/essentials.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/thematics-education.css') }}" rel="stylesheet" type="text/css" />
    <!-- PAGE LEVEL SCRIPTS -->
    <link href="{{ asset('components/smarty/css/header-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('components/smarty/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />

    <link href="{{ asset('components/ol/css/ol.css') }}" rel="stylesheet">
    <link href="{{ asset('components/olext/ol-ext-3.0.2/dist/ol-ext.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')

    @yield('global_js')
    <script src="{{ asset('components/ol/build/ol.js') }}"></script>
    <script src="{{ asset('components/olext/ol-ext-3.0.2/dist/ol-ext.js') }}"></script>
    <script src="{{ asset('components/jquery/jquery.js') }}"></script>
    <script src="{{ asset('components/bootstrap4/js/plugins/bootstrap3-typeahead.js') }}"></script>
    <script src="{{ asset('components/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('components/jquery-easyui/jquery.easyui.min.js') }}"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAgWF-GRSLtIVbfOI9tEHOIZfim4M7l29E"></script>
</head>

<body class="map-container">
{{--@include('home.contents.slidetop')--}}

<!-- Left side column. contains the logo and sidebar -->
@include('home.layouts.nav')
<!-- Wrapper. Contains page content -->
<div class="show-map map-container">
    @yield('content')
</div>

<script src="{{ asset('components/bootstrap4/js/bootstrap.js') }}"></script>
<script src="{{ asset('components/smarty/js/scripts.js') }}"></script>
<script src="{{ asset('components/smarty/plugins/bootstrap.datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('components/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/exporting.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/offline-exporting.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/export-data.js') }}"></script>
<script src="{{ asset('js/wis.js') }}"></script>
<script src="{{ asset('js/maptools.js') }}"></script>
@yield('scripts')
</body>
</html>