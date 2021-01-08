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
<div class="main" style="background-color: #ECEDFA; padding-top: 50px; padding-bottom: 200px;">
	<table class="table" style="max-width: 75%; padding-bottom: 100px; margin: 0 auto;">
    <thead>
      <tr>
        <th colspan="2">CHI TIẾT VĂN BẢN QUY PHẠM PHÁP LUẬT</th>
        
       
      </tr>
    </thead>
    <tbody>
    	<tr>
    		<td style="width: 200px;">Số/ Ký hiệu</td>
    		<td>{{$vanbanchitiet->Sovanban}}</td>
    	</tr>
    	<tr>
    		<td>Loại văn bản</td>
    		<td>{{$vanbanchitiet->loaivanban->name}}</td>
    	</tr>
    	<tr>
    		<td>Nội dung</td>
    		<td>{{$vanbanchitiet->Noidung}}</td>
    	</tr>
    	<tr>
    		<td>Ngày ban hành</td>
    		<td>{{$vanbanchitiet->Ngaybanhanh}}</td>
    	</tr>
    	<tr>
    		<td>Tải về máy</td>
    		<td > <a href="{{route('taive',[$vanbanchitiet->tenfile])}}" style="color:blue;">Download</a> </td>
    	</tr>
    	<tr>
    		<td colspan="2">
    			<a href="{{route('danhsachvanban')}}" type="button" class="btn btn-primary">Trở về</a>   
    		</td> 

    	</tr>
    </tbody>
  </table>
</div>

<style type="text/css">
	th{
		font-size: 14px;
		background-color: #171F88;
		color: white;
		
	}
</style>




@endsection