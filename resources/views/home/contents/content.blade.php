@extends('home.layouts.main')
@section('global_js')
    <script type="text/javascript">
        var wellAjaxUri = "{{ route('wells.well.ajax')}}";
        var wellAjaxContentUri = "{{ route('wells.well.ajax_content')}}";
        var wellAjaxWaterLevelUri = "{{ route('wells.well.ajax_wl')}}";
        var wellAjaxWaterTemperatureUri = "{{ route('wells.well.ajax_wt')}}";
        var wellAjaxListUri = "{{ route('wells.well.ajax_well_list')}}";
        var wellAjaxSearchListUri = "{{ route('wells.well.ajax_well_search')}}";
        var wellAjaxLocationUri = "{{ route('wells.well.ajax_well_location')}}";

    </script>
@endsection
@section('content')
    <div class="wrapper dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">Slide ảnh</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <td>Nâng cấp phần mềm</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Cập nhật mới bản tin quan trắc</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ứng dụng di động</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Q4</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Q5</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Q6</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">Tin tức khác</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <td>Nâng cấp phần mềm</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Cập nhật mới bản tin quan trắc</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ứng dụng di động</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Q4</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Q5</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td>Q6</td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-plus"></i> Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">Tin cảnh báo - dự báo TNN Mặt</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 1</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 2</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 3</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 4</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 5</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 6</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-plus"></i> Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">Tin cảnh báo - dự báo TNN Dưới đất</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 1</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 2</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 3</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 4</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 5</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 6</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-plus"></i> Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="card-title font-20 mt-0 text-center">Niên giám thống kê</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 1</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 2</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 3</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 4</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 5</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    <tr>
                                        <td><a class="card-link" href="#">Bản tin dự báo tài nguyên nước tháng 6</a>
                                        </td>
                                        <td><span>18/03/29</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-plus"></i> Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h3>Dự báo tài nguyên nước</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab"
                                               href="ui-tabs-accordions.html#home"
                                               role="tab" aria-selected="true"><i class="fa fa-line-chart"></i> Đông Bắc</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="ui-tabs-accordions.html#profile"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Tây Bắc</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#messages"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Đồng
                                                bằng
                                                Bắc Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Bắc
                                                Trung
                                                Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Tây
                                                Nguyên</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Duyên
                                                hải
                                                Nam
                                                Trung
                                                Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Đồng
                                                bằng
                                                Nam Bộ</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="home" role="tabpanel">
                                            <h5 class="text-center">Bản đồ mực nước </h5>
                                            <div id="morris-containers" style="height: 650px;"></div>
                                        </div>
                                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                2
                                            </p>
                                        </div>
                                        <div class="tab-pane p-3" id="messages" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                3
                                            </p>
                                        </div>
                                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                4
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light">Xem chi tiết bản
                                        đồ
                                        <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h3>Mạng quan trắc tài nguyên nước</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div id="morris-containers" style="height: 766px;"></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light">Xem chi tiết bản
                                        đồ
                                        <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h3>Đặc trưng quan trắc</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" data-toggle="tab"
                                               href="ui-tabs-accordions.html#home"
                                               role="tab" aria-selected="true"><i class="fa fa-line-chart"></i> Đông Bắc</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="ui-tabs-accordions.html#profile"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Tây Bắc</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#messages"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Đồng
                                                bằng
                                                Bắc Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Bắc
                                                Trung
                                                Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Tây
                                                Nguyên</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Duyên
                                                hải
                                                Nam
                                                Trung
                                                Bộ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="ui-tabs-accordions.html#settings"
                                               role="tab" aria-selected="false"><i class="fa fa-line-chart"></i> Đồng
                                                bằng
                                                Nam Bộ</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="home" role="tabpanel">
                                            <h5 class="text-center">Bản đồ mực nước </h5>
                                            <div id="morris-container" style="height: 450px;"></div>
                                        </div>
                                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                2
                                            </p>
                                        </div>
                                        <div class="tab-pane p-3" id="messages" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                3
                                            </p>
                                        </div>
                                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                                            <p class="font-14 mb-0">
                                                4
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light">Xem chi tiết dữ
                                        liệu
                                        <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <div class="col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h3>Thông báo hệ thống</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div id="morris-container" style="height: 566px;"></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <a href="#" class="btn btn-outline-primary waves-effect waves-light"><i
                                                class="fa fa-plus"></i> Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- end row -->
            <!-- /.box -->
        </div>
    </div>
    <!-- end row -->
    <!-- end wrapper -->
@endsection