<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Quan trắc - Cảnh báo - Dự báo TNN</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="ThemeDesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="{{ asset('components/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/jquery-easyui/themes/default/easyui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/jquery-easyui/themes/icon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/bootstrap4/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/upcube/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/upcube/css/adminstyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    @yield('global_js')
    <script src="{{ asset('components/ol/build/ol.js') }}"></script>
    <script src="{{ asset('components/jquery/jquery.js') }}"></script>
    <script src="{{ asset('components/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('components/jquery-easyui/jquery.easyui.min.js') }}"></script>
    @yield('css')
</head>

<body class="fixed-left">

<div class="wrapper" id="wrapper">

    <!-- Left side column. contains the logo and sidebar -->
    <div class="left side-menu">
        @include('admin.layouts.sidebar')
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-page">
        <div class="content">
            {{--@include('layouts.topbar')--}}
            <div class="page-content-wrapper">
                @yield('content')
            </div>
        </div>
        <!-- Main Footer -->
        <footer class="footer" style="text-align: center">
            <strong>Copyright © 2018 <a href="#">NAWAPI</a>.</strong> All rights reserved.
        </footer>
    </div>
</div>

<script src="{{ asset('components/upcube/ajs/popper.min.js') }}"></script>
<script src="{{ asset('components/bootstrap4/js/bootstrap.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/modernizr.min.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/detect.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/fastclick.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.blockUI.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/waves.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('components/tinymce/js/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('js/wisadmin.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/app.js') }}"></script>
<script src="{{ asset('components/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/exporting.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/offline-exporting.js') }}"></script>
<script src="{{ asset('components/highcharts/modules/export-data.js') }}"></script>
@yield('scripts')
</body>
</html>