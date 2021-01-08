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

<div class="container mt-3">
  <h4 style="margin-top: 20px;">Dữ liệu công trình quan trắc nước dưới đất</h4>
  <h5>Mã công trình: <span style="color: red;"> {{$wells_detail->well_code}}</span></h5>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Mực Nước</a>
    </li>
    <li class="nav-item">
      <a  href="{{route('chitiethquantracnuocduoidat',[$wells_detail->well_code])}}">Thông tin chung</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Nhiệt độ</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      
      <div class="Conten" style="margin: 0 auto;">

        <form class="row" action="{{route('bieudomucnuoc',[$wells_detail->id])}}" method="post" style="background-color: #6295B1; padding-bottom: 30px;">
          @csrf
          <div class="col-md-4" style="margin-top:10px;"> 

            <label style="font-weight: bold; float:left;color: black;">Năm quan trắc</label>
            <select  class="form-control" name="namquantrac" id="namquantrac" required>
              <option value='0'>Chọn năm</option>
              @for($i=0;$i<=10;$i++)
              <option value='{{$namnow-$i}}'>{{$namnow-$i}}</option>
              @endfor
            </select>
          </div>
          <div class="col-md-2"><button style="margin-top:45px;" type="submit" class="btn btn-primary">Tìm kiếm</button></div>
        </form>
        <!-- </form> -->
      <h4 style="color: #1C4D84;">BIỂU ĐỒ DỮ LIỆU LƯỢNG MƯA</h4>

      @if( isset($chart))

       {!! $chart->html() !!}

       {!! Charts::scripts() !!}
       {!! $chart->script() !!}

       <div class="lisluongmua">
        <div class="row">
           <h4 class="col-md-10" style="color: #1C4D84;">BẢNG DỮ LIỆU LƯỢNG MƯA</h4>
        <div class="col-md-2">
          <a href="{{route('lienhedulieumucnuoc')}}" style="margin-bottom: 10px; width: 100%;" type="submit" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Tải về sf </a>
           
         </div>
         
        </div>
          
         <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width:80px;">STT</th>
              <th>Thời gian</th>
              <th>Mực nước</th>
            </tr>
          </thead>
          <tbody>
            @foreach($water_level_detail_list as $lis_water)
            <tr>
              <td>{{$loop->index+1}}</td>
              
              <td>{{date( 'd-m-Y', strtotime($lis_water->date_measure))}}</td>
             
              <td>{{$lis_water->water_level}}</td>
            </tr>
          @endforeach
            
          </tbody>
        </table>
        <div class="card-footer">
         
         
  
          {{ $water_level_detail_list->appends(Request::post('page'))->links()}}
        </div>
       </div>
        @else 

        @endif


      </div>

    </div>
    <div id="menu1" class="container tab-pane fade"><br>

      <p>Đang cập nhật .... </p>
    </div>


    <div id="menu2" class="container tab-pane fade"><br>
     
      <p>Đang cập nhật ....</p>
    </div>
  </div>
</div>

@endsection