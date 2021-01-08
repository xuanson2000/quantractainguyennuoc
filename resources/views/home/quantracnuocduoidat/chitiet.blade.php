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


  <div class="row" style="margin-top:30px; margin-bottom: 30px;">
    <div class="col-md-4" style="background-color: #DCE5F5; "><h4 style="margin-top: 20px;">Dữ liệu công trình quan trắc nước dưới đất</h4>
        <h4 style="padding: 10px 10px 10px 10px; background-color: #616176; color: #FF800A;">Thông tin chung</h4>
     <table class="table table-bordered" style="background-color: white;">
      <thead>
        <tr>
          <th style="width: 150px;">Thuộc tính</th>
          <th>Giá trị</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mã công trình</td>
          <td>{{$wells_detail->well_code}}</td>

        </tr>
        <tr>
          <td>Tọa độ x</td>
          <td>{{$wells_detail->x_coor}}</td>

        </tr>
        <tr>
          <td>Tọa độ y</td>
          <td>{{$wells_detail->y_coor}}</td>

        </tr>
        <tr>
          <td>Vị trí hành chính</td>
          <td>{{$wells_detail->commune}} - {{$wells_detail->district}} - {{$wells_detail->province}}</td>

        </tr>
        <tr>
          <td>Thiết bị quan trắc</td>
          <td>{{$wells_detail->thietbiquantrac}}</td>

        </tr>
        <tr>
          <td>Cấp quản lý</td>
          <td>{{$wells_detail->network_type}}</td>

        </tr>
      </tbody>
    </table>

   </div>

    <div class="col-md-8">
      <div class="row" style=" border: 1px solid #B8BFC4; padding:10px 10px 0px 20px; margin: 0px 1px 5px 1px;">
        <div class="col-md-10" >

          <form  class="row"  action="{{route('bieudomucnuoc',[$wells_detail->well_code])}}" method="post" style=" padding-bottom: 10px; margin-left: 0px; margin-right: 0px;">
            @csrf
            <div class="col-md-5" style=""> 


              <select style="color:blue;" class="form-control" name="namquantrac" id="namquantrac" required>
                <option value=''>Chọn năm quan trắc</option>
                @for($i=0;$i<=20;$i++)
                <option value='{{$namnow-$i}}'>{{$namnow-$i}}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-2"><button style=" margin-top:2px;" type="submit" class="btn btn-primary">Tìm kiếm</button></div>
          </form>
        </div>
        <div class="col-md-2">

         <a href="{{route('danhsachquantracnuocduoidat')}}" type="button" style="float: right; margin-top: 0px;"> <i class="fa fa-times" aria-hidden="true"></i></a>
       </div>
      </div>


      <h4 style=" padding: 10px 10px 10px 10px; background-color: #DCE5F5; color: #FF800A;">Thông tin mực nước
      
     </h4>


 

      @if( isset($chart))

      {!! $chart->html() !!}

      {!! Charts::scripts() !!}
      {!! $chart->script() !!}

      <div class="lisluongmua">
        <div class="row">
         <h4 class="col-md-10" style="color: #1C4D84;">BẢNG DỮ LIỆU MỰC NƯỚC</h4>
         <div class="col-md-2">

          <a href="{{route('lienhedulieumucnuoc')}}" style="margin-bottom: 10px; width: 100%;" type="button" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Tải về </a>

        </div>

      </div>
      <div style="height: 350px; overflow-y:auto; ">
       <table class="table table-bordered" >
        <thead>
          <tr>
            <th style="width:80px;">STT</th>
             <th>Mã công trình</th>
            <th>Thời gian</th>
            <th>Mực nước</th>
          </tr>
        </thead>
        <tbody>
          @foreach($water_level_detail as $lis_water)
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$lis_water->well_code}}</td>
            <td>{{date( 'd-m-Y', strtotime($lis_water->date_measure))}}</td>

            <td>{{$lis_water->water_level}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

     

     
    </div>
    @else 

    @endif






     <h4 style="padding: 10px 10px 10px 10px; margin-top:0px; background-color: #DCE5F5; color: #FF800A; margin-top:30px;">Thông tin nhiệt độ</h4>
    @if( isset($chart1))

    {!!$chart1->html()!!}

    {!!Charts::scripts()!!}
    {!!$chart1->script()!!}



    <div style="height: 350px; overflow-y:auto; ">
      <table class="table table-bordered" >
        <thead>
          <tr>
            <th style="width:80px;">STT</th>
             <th>Mã công trình</th>
            <th>Thời gian</th>
            <th>Nhiệt độ </th>
          </tr>
        </thead>
        <tbody>
          @foreach($water_temperatures_char as $water_temperature)
          <tr>
            <td>{{$loop->index+1}}</td>
          <td>{{$water_temperature->well_code}}</td>
            <td>{{date('d-m-Y', strtotime($water_temperature->date_measure))}}</td>

            <td>{{$water_temperature->temperature}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    
      @else

      @endif

    </div>
  </div>



</div>

<script type="text/javascript">
$(document).ready(function(){
$('*').bind('cut copy paste contextmenu', function (e) {
    e.preventDefault();
})});
</script>

@endsection