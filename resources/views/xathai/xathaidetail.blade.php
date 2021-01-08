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

<div class="container" style="margin-top: 50px; ">
<h4 style="margin-bottom: 40px;">DỮ LIỆU CHI TIẾT XẢ THẢI VÀO NGUỒN NƯỚC</h4>


<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#home">THÔNG TIN NƯỚC THẢI</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#menu1">THÔNG TIN DIỂM KHẢO SÁT</a>
	</li>
	
</ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
     
      	<table class="table table-bordered">
		<thead>
			<tr><th>THÔNG TIN </th>
				<th>THUỘC TÍNH</th>
				
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td>Tên nguồn thải</td>
				<td>{{$xathaidetails->tennguonthai}}</td>
				
			</tr>
			<tr>
				<td>Lưu lượng </td>
				<td>{{$xathaidetails->luuluong}} (m3/ngày)</td>
				
			</tr>
			<tr>
				<td>Hình thức xả thải</td>
				@if($xathaidetails->xt_tructiep==true)
				<td>Trực tiếp</td>
				@else
                   <td>Gián tiếp</td>
				@endif
			</tr>
			<tr>
				<td>Tình trạng xử lý</td>

				@if($xathaidetails->xt_daxuly==true)
				<td>Đã quan xử lý</td>
				@else
                   <td>Chưa quan xử lý</td>
				@endif
				
			</tr>
			<tr>
				<td>Nơi tiếp nhận</td>
				<td>{{$xathaidetails->noitiepnhan}}</td>
				
			</tr>
			<tr>
				<td>Màu nước</td>
				<td>{{$xathaidetails->mau}}</td>
				
			</tr>
			<tr>
				<td>Mùi nước</td>
				<td>{{$xathaidetails->mui}}</td>
				
			</tr>
			
		</tbody>
	</table>


    </div>
    <div id="menu1" class="container tab-pane fade"><br>
     
    	<table class="table table-bordered">
    		<thead>
    			<tr><th>THÔNG TIN </th>
    				<th>THUỘC TÍNH</th>

    			</tr>
    		</thead>
    		<tbody>

    			<tr>
    				<td>Số hiệu điểm khảo sát</td>
    				<td>{{$xathaidetails->sohieu_dks}}</td>

    			</tr>
    			<tr>
    				<td>Địa điểm  </td>
    				<td>{{$xathaidetails->xa}} - {{$xathaidetails->huyen}}- {{$xathaidetails->tinh}} </td>

    			</tr>
    			<tr>
    				<td>Tuyến khảo sát</td>
    					<td>{{$xathaidetails->tuyen_ks}}</td>
    			</tr>
    			<tr>
    				<td>Ngày khảo sát</td>

    				<td>{{$xathaidetails->ngay_ks}}</td>
    			</tr>
    			<tr>
    				<td>Người khảo sát</td>
    				<td>{{$xathaidetails->nguoi_ks}}</td>

    			</tr>
    			<tr>
    				<td>Đơn vị</td>
    				<td>{{$xathaidetails->coquan_ks}}</td>

    			</tr>
    			<tr>
    				<td>Tọa độ X</td>
    				<td>{{$xathaidetails->toado_x}}</td>

    			</tr>
    			<tr>
    				<td>Tọa độ Y</td>
    				<td>{{$xathaidetails->toado_y}}</td>

    			</tr>
    			<tr>
    				<td>Độ cao</td>
    				<td>{{$xathaidetails->caodo_z}}</td>

    			</tr>

    		</tbody>
    	</table>
    </div>
   
  </div>




</div>




<style type="text/css">
	th {

		font-size: 12px;
		background-color: #415676;
		color: white;
	}
</style>




@endsection