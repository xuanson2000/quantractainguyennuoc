  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #374D79;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: #FFA201; font-weight: bold;" class="navbar-brand" href="{{route('quantriindex')}}">QUẢN TRỊ DỮ LIỆU BẢN TIN CẢNH BÁO DỰ BÁO TÀI NGUYÊN NƯỚC</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a style="color: #C6EDF3;"  class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {{Auth::guard('quantri')->user()->name}}
                         <i class="fa fa-caret-down" > </i>

                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::guard('quantri')->user()->name}}</a>
                        </li>
                       
                     
                        <li class="divider"></li>
                        <li><a href="{{route('logout-dang-nhap')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="">
                <div class="sidebar-nav navbar-collapse" style="">
                    <ul class="nav" id="side-menu" style="">
                    
                        <li>
                            <a style="font-weight: bold; color: #FA940D;" href="{{route('quantriindex')}}"><i class="fa fa-home" aria-hidden="true"></i> TRANG CHỦ - CSDL </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> QUẢN TRỊ LOẠI BẢN TIN <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('lisloaibantin')}}">DANH SÁCH LOẠI BẢN TIN</a>
                                </li>
                                <li>
                                    <a href="#">THÊM MỚI</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level bantin -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i> QUẢN TRỊ BẢN TIN<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('bantin')}}">DANH SÁCH BẢN TIN</a>
                                </li>
                                <li>
                                    <a href="{{route('addbantin')}}">THÊM MỚI BẢN TIN</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i> QUẢN TRỊ VĂN BẢN PQ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="{{route('quantrivanbanphapquy')}}">DS VĂN BẢN PHÁP QUY</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>NGƯỜI DÙNG<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">DANH SÁCH NGƯỜI DÙNG</a>
                                </li>
                                <li>
                                    <a href="#">THÊM NGƯỜI DÙNG</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
