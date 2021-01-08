<div id="topBar" style="width: 100%;">
  <!--   <div class="container"> -->

        <!-- right
        <ul class="top-links list-inline float-right">
            <li class="text-welcome">Xin chào, <strong>Admin</strong></li>
            <li><a href="page-login-1.html">ĐĂNG NHẬP</a></li>
            <li><a href="page-register-1.html">ĐĂNG KÝ</a></li>
        </ul>
        -->
        <!-- left -->
      <!--   <ul class="top-links list-inline">
            <li><a href="http://www.nawapi.gov.vn">BỘ TÀI NGUYÊN VÀ MÔI TRƯỜNG - TRUNG TÂM QUY HOẠCH VÀ ĐIỀU TRA TÀI NGUYÊN NƯỚC QUỐC GIA</a></li>
        </ul> -->

  <!--   </div> -->
    <div class="border-top block clearfix" >
         
        <div class="containerl" style="text-align: center;"  >
            <a class="" href="{{route('home') }}" >
               
               <img  src="{{ asset('images/new-bg-header.png') }}" alt="" style="  width: 100%;
  height: auto;">
            </a>
        </div>
    </div>
</div>
<div id="header" class="navbar-toggleable-md header-sm sticky shadow-after-3 clearfix">
    <!-- TOP NAV -->
    <header id="topNav">
        <div class="container">

            <!-- Mobile Menu Button -->
            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Logo
            <a class="logo float-left" href="{{ route('home') }}">
                <img src="{{ asset('images/nawapi.png') }}" alt="">
            </a>
             -->

            <div class="navbar-collapse collapse float-left nav-main-collapse submenu-dark" style="height:40px;">
                <nav class="nav-main"  >
                    <ul id="topMain" class="nav nav-pills nav-main has-topBar" style="height:40px;">
                        <li class="" style="height:40px;" >
                            <a  href="{{ route('home') }}" ><i class="fa fa-home"></i> TRANG CHỦ</a>
                        </li>
                        <li class="" style="height:40px;"><!-- THEMATIC -->
                            <!-- <a class="dropdown-toggle noicon" href="{{ route('maps.swreport.view') }}">
                                <i class="fa fa-bell-o"></i>TIN TIN DỰ BÁO - CẢNH BÁO TNN
                            </a> -->

                            <a class="dropdown-toggle noicon" href="{{ route('bantinindex') }}">
                                <i class="fa fa-bell-o"></i>TIN DỰ BÁO CẢNH BÁO TNN
                            </a>
                        </li>
                        <li class="" style="height:40px;"><!-- HOME -->
                            <a class="dropdown-toggle" href="#">
                                <i class="fa fa-database"></i> DỮ LIỆU QUAN TRẮC TNN
                            </a>
                            <ul  class="dropdown-menu has-topBar">
                             <!--    <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('wells.well.index') }}">
                                        THỐNG KÊ/THUỘC TÍNH
                                    </a>
                                </li> -->
                                 <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('danhsachquantracnuocduoidat')}}">
                                        QUAN TRẮC TN NƯỚC DƯỚI ĐẤT
                                    </a>
                                </li>
                                 <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('swstations.station.index')}}">
                                        QUAN TRẮC TN NƯỚC MẶT
                                    </a>
                                </li>
                                
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('maps.map.gwmap') }}">
                                        BẢN ĐỒ
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="" style="height:40px;">
                            <a class="" href="{{route('danhsachvanban')}}">
                                <i class="fa fa-institution"></i> VĂN BẢN PHÁP QUY
                            </a>
                        </li>
                        <li class="dropdown" style="height:40px;">
                            <a class="dropdown-toggle" href="index.html#">
                                <i class="fa fa-question-circle-o"></i> TRỢ GIÚP
                            </a>
                            <ul  class="dropdown-menu has-topBar">
                             <!--    <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Thông tin chung
                                    </a>
                                </li> -->
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangnhap') }}">
                                        Đăng nhập hệ thống
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Thuật ngữ
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Câu hỏi thường gặp
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Quy tắc và điều kiện tìm kiếm
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Định dạng dữ liệu
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Tiêu chuẩn kỹ thuật
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Văn bản pháp quy
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Điều khoản sử dụng
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Chính sách dữ liệu
                                    </a>
                                </li>

                            </ul>
                        </li >
                        <li class="last-elements"style="height:40px;" >
                            <a class="" href="{{ route('lienhe') }}">
                                <i class="fa fa-address-book"></i> LIÊN HỆ
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

        </div>
    </header>
    <!-- /Top Nav -->

</div>
<!-- Navigation Bar-->

