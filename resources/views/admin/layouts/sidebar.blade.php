<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
    <i class="ion-close"></i>
</button>
<div class="topbar-left">
    <div class="text-center">
        <!--<a href="index.html" class="logo">Admiry</a>-->
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/nawapi.png') }}" alt="logo" height="112"></a>
    </div>
</div>
<!-- sidebar: style can be found in sidebar.less -->
<div class="slimScrollDiv">
    <div class="sidebar-inner slimscrollleft">
        <!-- Sidebar Menu -->
        <div class="active" id="sidebar-menu">
            <ul>
                @include('admin.layouts.menu')
            </ul>
        </div>
        <!-- /.sidebar-menu -->
    </div>
</div>