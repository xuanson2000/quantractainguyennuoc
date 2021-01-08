<div id="header" class="navbar-toggleable-md sticky shadow-after-3 clearfix">
    <!-- TOP NAV -->
    <header id="topNav">
        <div class="container">

            <!-- Mobile Menu Button -->
            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Logo -->
            <a class="logo float-left" href="{{ route('home') }}">
                <img src="{{ asset('images/nawapi.png') }}" alt="">
            </a>

            <div class="navbar-collapse collapse float-right nav-main-collapse submenu-dark">
                <nav class="nav-main">
                    <ul id="topMain" class="nav nav-pills nav-main has-topBar">
                        <li class="has-submenu">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> TRANG CHỦ</a>
                        </li>
                        <li class="dropdown mega-menu nav-animate-fadeIn nav-hover-animate hover-animate-bounceIn"><!-- THEMATIC -->
                            <a class="dropdown-toggle noicon" href="#">
                                <i class="fa fa-bell-o"></i> THÔNG TIN CẢNH BÁO - DỰ BÁO TNN
                            </a>
                            <ul class="dropdown-menu dropdown-menu-clean has-topBar">
                                <li>
                                    <div class="row">
                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>LĨNH VỰC</span></li>
                                                <li class="divider"></li>
                                                <li>
                                                    <span class="fs-11 mt-0 pb-15 pt-15 text-info">PHÂN LOẠI BẢN TIN THEO LĨNH VỰC</span>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('articles.article.category', 2 ) }}">TÀI NGUYÊN NƯỚC MẶT</a></li>
                                                <li><a href="{{ route('articles.article.category', 1 ) }}">TÀI NGUYÊN NƯỚC DƯỚI ĐẤT</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>VÙNG QUAN TRẮC</span></li>
                                                <li class="divider"></li>
                                                <li>
                                                    <span class="fs-11 mt-0 pb-15 pt-15 text-info">PHÂN LOẠI BẢN TIN THEO VÙNG QUAN TRẮC</span>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="pack-realestate-home-1.html">ĐÔNG BẮC BỘ</a></li>
                                                <li><a href="pack-megashop-home-1.html">ĐỒNG BẰNG BẮC BỘ</a></li>
                                                <li><a href="pack-caffe-home-1.html">TÂY BẮC BỘ</a></li>
                                                <li><a href="pack-hotel-home-1.html">BẮC TRUNG BỘ</a></li>
                                                <li><a href="pack-hotel-v2-home-1.html">DUYÊN HẢI NAM TRUNG BỘ</a></li>
                                                <li><a href="pack-photography-home-1.html">TÂY NGUYÊN</a></li>
                                                <li><a href="pack-caffe-onepage.html">ĐỒNG BẰNG NAM BỘ</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>CHUYÊN ĐỀ</span></li>
                                                <li class="divider"></li>
                                                <li>
                                                    <span class="fs-11 mt-0 pb-15 pt-15 text-info">PHÂN LOẠI BẢN TIN THEO CHUYÊN ĐỀ</span>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="pack-realestate-home-1.html">BẢN TIN CHUYÊN ĐỀ</a></li>
                                                <li><a href="pack-megashop-home-1.html">BẢN TIN VIDEO</a></li>
                                                <li><a href="pack-caffe-home-1.html">BẢN TIN THÁNG</a></li>
                                                <li><a href="pack-hotel-home-1.html">BẢN TIN QUÝ</a></li>
                                                <li><a href="pack-hotel-v2-home-1.html">BẢN TIN NĂM</a></li>
                                                <li><a href="pack-photography-home-1.html">NIÊN GIÁM - THỐNG KÊ</a></li>
                                                <li><a href="pack-caffe-onepage.html">BÁO CÁO KẾT QUẢ QUAN TRẮC</a></li>
                                            </ul>
                                        </div>


                                        <div class="col-md-6 hidden-sm text-center">
                                            <div class="p-15 block">
                                                <img class="img-fluid" src="{{ asset('images/water_monitoring.png') }}" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown active"><!-- HOME -->
                            <a class="dropdown-toggle" href="#">
                                <i class="fa fa-database"></i> DỮ LIỆU THUỘC TÍNH
                            </a>
                            <ul class="dropdown-menu has-topBar">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('wells.well.index') }}">
                                        Quan trắc nước dưới đất
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('swstations.station.index') }}">
                                        Quan trắc nước mặt
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('tramdomuas.tramdomua.index') }}">
                                        Quan trắc nước mưa
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('gw_exploitations.gw_exploitation.index') }}">
                                        Khai thác nước dưới đất
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('hy_exploitations.hy_exploitation.index') }}">
                                        Khai thác nước mặt
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('waste_waters.waste_water.index') }}">
                                        Xả thải vào nguồn nước
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('meteorology_stations.meteorology_station.index') }}">
                                        Quan trắc lồng ghép
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="http://gw.hydronet.co.kr:8001/monitoring/MainView.aspx">
                                        Quan trắc thí điểm
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown mega-menu nav-animate-fadeIn nav-hover-animate hover-animate-bounceIn">
                            <a class="dropdown-toggle noicon" href="#">
                                <i class="fa fa-map-o"></i> BẢN ĐỒ - BÁO CÁO
                            </a>
                            <ul class="dropdown-menu dropdown-menu-clean has-topBar">
                                <li>
                                    <div class="row">
                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>BẢN ĐỒ CƠ SỞ</span></li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('maps.map.hanhchinh') }}">BẢN ĐỒ HÀNH CHÍNH</a></li>
                                                <li><a href="{{ route('maps.map.diahinh') }}">BẢN ĐỒ ĐỊA HÌNH</a></li>
                                                <li><a href="{{ route('maps.map.diachat') }}">BẢN ĐỒ ĐỊA CHẤT</a></li>
                                                <li><a href="{{ route('maps.map.diachatthuyvan') }}">BẢN ĐỒ ĐỊA CHẤT THUỶ VĂN</a></li>
                                                <li><a href="{{ route('maps.map.luuvucsong') }}">BẢN ĐỒ LƯU VỰC SÔNG</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>BẢN ĐỒ QUAN TRẮC - GIÁM SÁT</span></li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('maps.map.quantracmua') }}">TÀI NGUYÊN NƯỚC MƯA</a></li>
                                                <li><a href="{{ route('maps.map.swmap') }}">TÀI NGUYÊN NƯỚC MẶT</a></li>
                                                <li><a href="{{ route('maps.map.gwmap') }}">TÀI NGUYÊN NƯỚC DƯỚI ĐẤT</a></li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('maps.map.quantracktnm') }}">KHAI THÁC NƯỚC MẶT</a></li>
                                                <li><a href="{{ route('maps.map.quantracktndd') }}">KHAI THÁC NƯỚC DƯỚI ĐẤT</a></li>
                                                <li><a href="{{ route('maps.map.quantracxathai') }}">XẢ THẢI VÀO NGUỒN NƯỚC</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>BẢN ĐỒ CHUYÊN ĐỀ</span></li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('maps.map.tainguyennuocmua') }}">BẢN ĐỒ TÀI NGUYÊN NƯỚC MƯA</a></li>
                                                <li><a href="{{ route('maps.map.tainguyennuocmat') }}">BẢN ĐỒ TÀI NGUYÊN NƯỚC MẶT</a></li>
                                                <li><a href="{{ route('maps.map.tainguyenndd') }}">BẢN ĐỒ TÀI NGUYÊN NƯỚC DƯỚI ĐẤT</a></li>
                                                <li><a href="pack-hotel-home-1.html">BẢN ĐỒ CHẤT LƯỢNG NƯỚC MẶT</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>BẢN ĐỒ CẢNH BÁO</span></li>
                                                <li class="divider"></li>
                                                <li><a href="pack-realestate-home-1.html">QUAN TRẮC NƯỚC DƯỚI ĐẤT</a></li>
                                                <li><a href="pack-megashop-home-1.html">QUAN TRẮC NƯỚC MẶT</a></li>
                                                <li><a href="pack-caffe-home-1.html">QUAN TRẮC NƯỚC MƯA</a></li>
                                                <li><a href="pack-hotel-home-1.html">GIÁM SÁT KHAI THÁC NƯỚC DƯỚI ĐẤT</a></li>
                                                <li><a href="pack-hotel-home-1.html">GIÁM SÁT KHAI THÁC NƯỚC MẶT</a></li>
                                                <li><a href="pack-hotel-home-1.html">GIÁM SÁT XẢ THẢI VÀO NGUỒN NƯỚC</a></li>
                                                <li><a href="pack-hotel-home-1.html">QUAN TRẮC LỒNG GHÉP</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5th">
                                            <ul class="list-unstyled has-topBar">
                                                <li><span>BÁO CÁO</span></li>
                                                <li class="divider"></li>
                                                <li><a href="pack-realestate-home-1.html">CẢNH BÁO QUAN TRẮC NƯỚC DƯỚI ĐẤT</a></li>
                                                <li><a href="pack-megashop-home-1.html">CẢNH BÁO QUAN TRẮC NƯỚC MẶT</a></li>
                                                <li><a href="pack-caffe-home-1.html">CẢNH BÁO QUAN TRẮC NƯỚC MƯA</a></li>
                                                <li><a href="pack-hotel-home-1.html">CẢNH BÁO GIÁM SÁT KHAI THÁC NƯỚC DƯỚI ĐẤT</a></li>
                                                <li><a href="pack-hotel-home-1.html">CẢNH BÁO GIÁM SÁT KHAI THÁC NƯỚC MẶT</a></li>
                                                <li><a href="pack-hotel-home-1.html">CẢNH BÁO GIÁM SÁT XẢ THẢI VÀO NGUỒN NƯỚC</a></li>
                                                <li><a href="pack-hotel-home-1.html">CẢNH BÁO QUAN TRẮC LỒNG GHÉP</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown last-elements">
                            <a class="dropdown-toggle" href="index.html#">
                                <i class="fa fa-question-circle-o"></i> TRỢ GIÚP
                            </a>
                            <ul  class="dropdown-menu has-topBar">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Thông tin chung
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Tin cập nhật hệ thống
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
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{ route('dangcapnhat') }}">
                                        Liên hệ
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>

        </div>
    </header>
    <!-- /Top Nav -->

</div>
<!-- Navigation Bar-->
