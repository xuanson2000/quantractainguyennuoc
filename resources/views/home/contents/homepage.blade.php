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


    <section class="p-50">
        <div class="container" style="margin-top: -20px;">
            <div class="row">
                <div class="col-md-8">
                    <div id="news-reports">
                        <div class="heading-title heading-dotted" style="background: #4A85B2; padding:5px 10px 5px 10px; margin-bottom: 15px;" >
                            <p style="background: #4A85B2; color: white; font-size: 15px; font-weight: bold;">TIN CẢNH BÁO -
                                DỰ BÁO TNN DƯỚI ĐẤT</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?php  
                                $tin=$gw_articles->take(5);
                                $tin1=$tin->shift();
                                ?>
                                <div class="blog-post-item-top">
                                    <figure class="mb-20">
                                     <!--  <img class="img-fluid" src="{{ asset('images/12-min.jpg') }}" alt=""> -->
                                     <img style="width: 360px; height: 230px;" class="img-fluid" src="source/imganh/product/{{$tin1['image']}}" alt="">
                                 </figure>

                                 <h4 style=" text-align:justify;color: #358122;"><a href="{{ route('articles.article.show', $tin1['id'] ) }}">{{$tin1['title']}}</a></h4>

                             </div>
                            </div>

                            <div class="col-md-6">
                                <div id="tab_gw_articles" class="tab-pane active show">
                                    <ul >
                                        @foreach($tin->all() as $gw_article)
                                           
                                                <li style=" margin-bottom: 10px;  text-align:justify;">
                                                            <a style="color: black;" href="{{route('articles.article.show', $gw_article->id ) }}">{{$gw_article['title']}}</a>
                                        
                                                </li>
                                           @endforeach 
                                    </ul>
                                </div>
                            </div>
                        </div>

                         <div class="heading-title heading-dotted" style="background: #4A85B2; padding:5px 10px 5px 10px; margin-bottom: 15px;" >
                            
                                <p style="background: #4A85B2; color: white; font-size: 15px; font-weight: bold;">TIN CẢNH BÁO -
                                DỰ BÁO TNN MẶT</p>
                        </div>




                        <div class="row">
                            <div class="col-md-6">

                                 <?php  
                                $tinn=$sw_articles->take(5);
                                 $tin11=$tinn->shift();
                                  ?>
                                <div class="blog-post-item-top">
                                    <figure class="mb-20">
                                        <!-- <img class="img-fluid" src="{{ asset('images/12-min.jpg') }}" alt=""> -->
                                           <img style="width: 360px; height: 230px;" class="img-fluid" src="source/imganh/product/{{$tin11['image']}}" alt="">
                                    </figure>
                                     <h4 style=" text-align:justify;color: #358122;" ><a  href="{{ route('articles.article.show', $tin11['id'] ) }}">{{$tin11['title']}}</a></h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="tab_gw_articles" class="tab-pane active show">
                                    <ul>
                                        @foreach($tinn->all() as $nw_article)
                                           
                                                <li style="margin-bottom: 10px;  text-align:justify; ">
                                                            <a style="color:black;" href="{{route('articles.article.show', $nw_article->id ) }}">{{$nw_article['title']}}</a>
                                        
                                                </li>
                                           @endforeach 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- /POST ITEM -->
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- card card-default -->
                     <div class="p" style="background:#4A85B2; padding: 5px 5px 0px 20px; ">
                            <h4 style="color: white; "><i class="fa fa-globe" aria-hidden="true"></i>  <a href="" style="color: white;"> MẠNG QUAN TRẮC</a></h4>
                    </div>
                    <div class="khung" style="border: #9AA2A9 solid 2px; margin-top: -9px;">
                        <section id="slider" class="h-700" style="background-position: 50% 0px;">
                            @include('home.maps.homepage_map')
                        </section>
                    </div>
                   

                </div>
            </div>
        </div>
    </section>


    <div class="row" style="margin-top: 20px;">
        <h3 style=" margin: 0 auto; color:#E65E24;">DỮ LIỆU QUAN TRẮC TÀI NGUYÊN NƯỚC</h3>

    </div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-1"></div>

     <div class="col-md-5" style="text-align: center;">

        <a  type="button" class="btn btn-warning" href="{{ route('danhsachquantracnuocduoidat')}}" style="vertical-align: middle;"><img class="rounded" style="width: 70px; margin-top: 10px;" src="{{asset('images/groundwater.png') }}" alt=""> <br>  QUAN TRẮC TÀI NGUYÊN NƯỚC DƯỚI ĐẤT </a>

        

    </div>


    <div class="col-md-5" style=" text-align: center;">  


        <a  type="button" class="btn btn-info" href="{{ route('swstations.station.index')}}" style="vertical-align: middle;"><img class="rounded" style="width: 70px; margin-top: 10px;" src="{{asset('images/exploiting.png') }}" alt=""> <br>  QUAN TRẮC TÀI NGUYÊN NƯỚC MẶT </a>


       <!--  <a  type="button" class="btn btn-success" href="{{ route('swstations.station.index')}}" style="vertical-align: middle;"><img class="rounded" style="width: 50px;" src="{{  asset('images/exploiting.png') }}" alt=""> Quan trắc tài nguyên nước mặt</a> -->
   </div>

   <div class="col-md-1"></div>
</div>


 
    

<style type="text/css">
    .btn-warning{
     width: 400px; height: 150px;
     font-size: 18px;


      
    }
    .btn-info{
     width: 400px; height: 150px;
     font-size: 18px;


      
    }
    .btn-primary:hover{
       background-color: red;
    }
</style>



 


   <!--  alternate pt-50 pb-0 -->
   <!--  <section class="123" style="margin-top: -20px;background-color:#CCF7F3; ">
        <div id="data-information" style="background-color: #CCF7F3; margin-top: -80px; margin-bottom: -100px;" >
            <header class="text-center">
                <h3>DỮ LIỆU QUAN TRẮC TÀI NGUYÊN NƯỚC</h2>
                <hr>
            </header>
            <div class="data-list">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-4 mb-30 col-4">
                            <div class="text-center">
                                <figure>
                                   <a href="{{ route('danhsachquantracnuocduoidat')}}"><img class="rounded" src="{{ asset('images/groundwater.png') }}" alt=""></a>
                                     
                                </figure>
                                <h4><a href="{{ route('danhsachquantracnuocduoidat')}}">Quan trắc tài nguyên nước dưới đất</a></h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30 col-4">
                            <div class="text-center">
                                <figure>
                                   
                                    <a href="{{ route('swstations.station.index')}}"> <img class="rounded" src="{{ asset('images/surface_water.png') }}" alt=""></a>
                                </figure>
                                <h4><a href="{{ route('swstations.station.index')}}">Quan trắc tài nguyên nước mặt</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30 col-4">
                            <div class="text-center">
                                <figure>
                                    <img class="rounded" src="{{ asset('images/meteo.png') }}" alt="">
                                </figure>
                                <h4>Dữ liệu khí tượng</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30 col-4">
                            <div class="text-center">
                                <figure>
                                    <img class="rounded" src="{{ asset('images/groundwater.png') }}" alt="">
                                </figure>
                                <h4>Khai thác nước dưới đất</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30 col-4">
                            <div class="text-center">
                                <figure>
                                    <img class="rounded" src="{{ asset('images/exploiting.png') }}" alt="">
                                </figure>
                                <h4>Khai thác nước mặt</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-30 col-4">
                            <div class="text-center">
                                <figure>
                                    <img class="rounded" src="{{ asset('images/discharge.png') }}" alt="">
                                </figure>
                                <h4> Xả thải vào nguồn nước  </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <section class="pt-50 pb-0">
        <hr  width="100%" align="center" />
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="data-docs">
                        <header class="mb-30 text-center">
                            <h4 style="text-align: left; margin-left: 5px; color:#E65E24;">VĂN BẢN - TÀI LIỆU</h4>
                        </header>
                        <div class="card card-default">
                            <div class="card-block">
                                
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr style="background-color: #5F87AD; font-size:12px; color: white;">
                                                <th style="width: 70px;">SỐ /KÝ HIỆU</th>
                                                <th style="width: 200px;">TRÍCH YẾU</th>
                                                <th >NGÀY HIỆU LỰC</th>
                                                <th style="width: 100px;">CƠ QUAN BAN HÀNH</th>
                                                <th >CHI TIẾT</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($viewfile as $item)
                                            <tr>
                                                <td>{{$item -> Sovanban}}</td>
                                                <td>{{$item -> Noidung}}</td>
                                                <td>{{$item -> Ngaybanhanh}}</td>
                                                <td>{{$item -> Coquanbanhanh}}</td>
                                                <td><a href="{{route('chitiet',[$item->id])}}">XEM</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


            <!--             <div class="card card-default">
                            <div class="card-block">
                                <div class="heading-title heading-dotted">
                                    <h3><i class="fa fa-book" style="color: blueviolet;" aria-hidden="true"></i> VĂN BẢN PHÁP QUY - TÀI LIỆU</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-vertical-middle">
                                        <thead>
                                        <tr>
                                            <th class="fw-30">File</th>
                                            <th>Số hiệu</th>
                                            <th>Ngày đăng</th>
                                            <th>Tiêu đề/Trích yếu</th>
                                            <th>Tải về</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center file-icon"><i class="fa fa-file-word-o"></i></td>
                                            <td>Bản tin 1</td>
                                            <td>29/2/2019</td>
                                            <td>Bản tin thông báo, dự báo tài nguyên nước dưới đất tháng 1 năm 2018 vùng Bắc Trung Bộ</td>
                                            <td>
                                                <a href="#" class="btn btn-info">
                                                    <i class="fa fa-download p-0"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center file-icon"><i class="fa fa-file-pdf-o"></i></td>
                                            <td>Bản tin 1</td>
                                            <td>29/2/2019</td>
                                            <td>Bản tin thông báo, dự báo tài nguyên nước dưới đất tháng 1 năm 2018 vùng Bắc Trung Bộ</td>
                                            <td>
                                                <a href="#" class="btn btn-info">
                                                    <i class="fa fa-download p-0"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center file-icon"><i class="fa fa-file-word-o"></i></td>
                                            <td>Bản tin 1</td>
                                            <td>29/2/2019</td>
                                            <td>Bản tin thông báo, dự báo tài nguyên nước dưới đất tháng 1 năm 2018 vùng Bắc Trung Bộ</td>
                                            <td>
                                                <a href="#" class="btn btn-info">
                                                    <i class="fa fa-download p-0"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center file-icon"><i class="fa fa-file-pdf-o"></i></td>
                                            <td>Bản tin 1</td>
                                            <td>29/2/2019</td>
                                            <td>Bản tin thông báo, dự báo tài nguyên nước dưới đất tháng 1 năm 2018 vùng Bắc Trung Bộ</td>
                                            <td>
                                                <a href="#" class="btn btn-info">
                                                    <i class="fa fa-download p-0"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
                    </div>
            <!--     </div>
                <div class="col-md-4">
                    <div class="card card-default">
                    <div class="card-heading">
                        <h4 style="color: #5F87AD"><i class="fa fa-link"></i> WEBSITE LIÊN KẾT</h4>
                    </div>
                    <div class="card-block" style="text-align: center;  ">
                             <a href="http://www.monre.gov.vn/"><img style="height:110px; border: 2px solid #5F87AD;" src="images/A (1).png"></a>
                             
                             <a href="http://nawapi.gov.vn/"><img style="height:110px; border: 2px solid #5F87AD; margin-top: 3px;"  src="images/New Project.png"></a>
                              <a href="http://dwrm.gov.vn/"><img style="height:110px; border: 2px solid #5F87AD; margin-top: 3px;" src="images/A (2).png"></a>
                               <a href="http://dinte.gov.vn/SitePages/TrangChu.aspx"><img style="height:110px; border: 2px solid #5F87AD; margin-top: 3px;" src="images/A (3).png"></a>
                                <a href="http://www.nchmf.gov.vn/kttvsite/"><img style="height:110px; border: 2px solid #5F87AD; margin-top: 3px;" src="images/A (4).png"></a>
                    </div>
                    </div>
                </div> -->

                    </div>
                <div class="col-md-4">
                    <div class="card card-default">
                    <div class="card-heading">
                        <h4 style="color: #5F87AD"><i class="fa fa-link"></i> LIÊN KẾT WEBSITE </h4>
                    </div>
                    <div class="card-block" style="text-align: center;  ">
                             <a href="http://www.monre.gov.vn/"><img style="width: 75%; " src="http://nawapi.gov.vn/modules/mod_miniadspot/images/BTNMT.png"></a>
                             
                             <a href="http://ndwrpi.gov.vn/"><img style=" width: 75%; margin-top: 3px;"  src="http://nawapi.gov.vn/modules/mod_miniadspot/images/ldmb.png"></a>

                              <a href="http://ceviwrpi.gov.vn/"><img style="width: 75%; margin-top: 3px;" src="http://nawapi.gov.vn/modules/mod_miniadspot/images/LDMT.png"></a>

                               <a href="http://www.liendoan8.com.vn/"><img style="width: 75%; margin-top: 3px;" src="http://nawapi.gov.vn/modules/mod_miniadspot/images/LDMN.png"></a>

                                <a href="http://www.dawapi.gov.vn/"><img style="width: 75%; margin-top: 3px;" src="http://nawapi.gov.vn/modules/mod_miniadspot/images/dawapi.png"></a>
                    </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
<!--     <section class="alternate pt-50 pb-0">
        <div class="container">
            <div id="data-map">
                <header class="mb-30 text-center">
                    <h2>BẢN ĐỒ</h2>
                    <hr>
                </header>

                <div class="row mix-grid">
                    <div class="col-md-3 col-sm-3 mix design mix_all mb-30" style="display: block;  opacity: 1;">
              
                        <div class="item-box">
                            <figure>
                                <img class="img-fluid" src="{{ asset('images/9-min.jpg') }}" alt="" width="600"
                                     height="399">
                            </figure>
                            <div class="item-box-desc">
                                <a href="{{ route('maps.map.gwmap') }}"><h3>Bản đồ dự báo khu vực Tây Nguyên tháng 3 -
                                        2018</h3></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mix design mix_all mb-30" style="display: block;  opacity: 1;">
                    
                        <div class="item-box">
                            <figure>
                                <img class="img-fluid" src="{{ asset('images/12-min.jpg') }}" alt="" width="600"
                                     height="399">
                            </figure>
                            <div class="item-box-desc">
                                <a href="{{ route('maps.map.gwmap') }}"><h3>Bản đồ dự báo khu vực Tây Nguyên tháng 5 -
                                        2018</h3></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mix design mix_all mb-30" style="display: block;  opacity: 1;">
                        
                        <div class="item-box">
                            <figure>
                                <img class="img-fluid" src="{{ asset('images/13-min.jpg') }}" alt="" width="600"
                                     height="399">
                            </figure>
                            <div class="item-box-desc">
                                <a href="{{ route('maps.map.gwmap') }}"><h3>Bản đồ dự báo khu vực Tây Nguyên tháng 6 -
                                        2018</h3></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mix design mix_all mb-30" style="display: block;  opacity: 1;">
                       
                        <div class="item-box">
                            <figure>
                                <img class="img-fluid" src="{{ asset('images/9-min.jpg') }}" alt="" width="600"
                                     height="399">
                            </figure>
                            <div class="item-box-desc">
                                <a href="{{ route('maps.map.gwmap') }}"><h3>Bản đồ dự báo khu vực Tây Nguyên tháng 7 -
                                        2018</h3></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mix design mix_all mb-30" style="display: block;  opacity: 1;">
                       
                        <div class="item-box">
                            <figure>
                                <img class="img-fluid" src="{{ asset('images/12-min.jpg') }}" alt="" width="600"
                                     height="399">
                            </figure>
                            <div class="item-box-desc">
                                <a href="{{ route('maps.map.gwmap') }}"><h3>Bản đồ dự báo khu vực Tây Nguyên tháng 8 -
                                        2018</h3></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 mix design mix_all mb-30" style="display: block;  opacity: 1;">
                    
                        <div class="item-box">
                            <figure>
                                <img class="img-fluid" src="{{ asset('images/13-min.jpg') }}" alt="" width="600"
                                     height="399">
                            </figure>
                            <div class="item-box-desc">
                                <a href="{{ route('maps.map.gwmap') }}"><h3>Bản đồ dự báo khu vực Tây Nguyên tháng 9 -
                                        2018</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



<div class="container"> 
 <h4 align="left">Thư viện ảnh</h4> 
 <div class="row"> 
  <div class="col-md-12"> 
   <div id="Carousel" class="carousel slide"> 
    <ol class="carousel-indicators"> 
     <li data-target="#Carousel" data-slide-to="0" class="active"></li> 
     <li data-target="#Carousel" data-slide-to="1"></li> 
     <li data-target="#Carousel" data-slide-to="2"></li> 
    </ol> 
    <div class="carousel-inner"> 
     <div class="item active"> 
      <div class="row"> 
       <div class="col-md-3"><a class="thumbnail"><img style="width: 250px; height:230px;" src="https://btnmt.onecmscdn.com/2019/03/21/1_76.jpg" alt="Image"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="anh/a1.jpg" alt="Image" style="width: 250px; height:230px;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="anh/a2.jpg" alt="Image" style="width: 250px; height:230px;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="anh/a4.jpg" alt="Image" style="width: 250px; height:230px;"></a>
       </div> 
      </div> 
     </div> 
     <!-- <div class="item"> 
      <div class="row"> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
      </div> 
     </div> 
     <div class="item"> 
      <div class="row"> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
       <div class="col-md-3"><a class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a>
       </div> 
      </div> 
     </div>  -->
    </div> <a data-slide="prev" class="left carousel-control">‹</a> <a data-slide="next" class="right carousel-control">›</a> 
   </div> 
  </div> 
 </div>
</div>




<style type="text/css">

.carousel { 
margin-bottom: 0;   
padding: 0 40px 30px 40px;
}
 
.carousel-control { 
left: -12px;    
height: 40px;   
width: 40px;    
background: none repeat scroll 0 0 #222222; 
border: 4px solid #FFFFFF;  
border-radius: 23px 23px 23px 23px; 
margin-top: 90px;
}
 
.carousel-control.right {   
right: -12px;
}
 
.carousel-indicators {  
right: 50%; top: auto;  
bottom: -10px;  margin-right: -19px;
}
/* The colour of the indicators */
.carousel-indicators li {   
background: #cecece;
}
.carousel-indicators .active {  
background: #428bca;
}</style>

@endsection