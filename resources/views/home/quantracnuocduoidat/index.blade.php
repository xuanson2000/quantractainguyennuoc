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

<div class="main" style="background-color: white; padding-top: 10px;">
	<div class="Conten" style="margin: 0 auto; width: 85%;">

		<form class="row" action="{{route('quantracnuocduoidattheovung')}}" method="get" style="background-color: #6295B1; padding-bottom: 10px;">
		

				<div class="col-md-4" style="margin-top:10px;"> 
					<select style="color: blue;"  class="form-control" name="vungquantrac" id="vungquantrac" required>
						<option value='0'>Tất cả vùng quan trắc</option>
						@foreach($monitoring_networks as $vqt)
						<option value="{{$vqt->id}}">{{$vqt->network_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2"><button style="margin-top:12px;" type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button></div>
			</form>
          <!-- </form> -->
	</div>

	@if( isset($wellseachs))



	<div class="containerr" style="margin-top: 10px; width: 87%; padding-bottom: 50px; margin: 0 auto;">   
		<label style="font-weight: bold; float:left; font-size: 17px; ">DỮ LIỆU QUAN TRẮC NƯỚC DƯỚI ĐẤT VÙNG :   
        @if($namemonitoring_network !='')
			{{$namemonitoring_network->network_name}}
         @endif
		</label>          
		<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2">MÃ CÔNG TRÌNH</th>
					<th colspan="2" style="text-align: center;">VỊ TRÍ TỌA ĐỘ</th>
					
					<th colspan="3" style="text-align: center;">VỊ TRÍ HÀNH CHÍNH</th>
				
					<th rowspan="2"  style="width: 100px;">CHI TIẾT</th>

				</tr>
				<tr>
					
					<th >Tọa độ X</th>
					<th >Tọa độ Y</th>
					<th >Xã, Phường</th>
					<th > Quận,Huyện</th>
					<th >Tỉnh, Thành phố</th>
				</tr>

			</thead>
			<tbody>
				@foreach($wellseachs as $wellseach)
				<tr>
					<td>{{$wellseach->well_code}}</td>
					<td>{{$wellseach->x_coor}}</td>
					<td>{{$wellseach->y_coor}}</td>
					<td>{{$wellseach->commune}}</td>
					<td>{{$wellseach->district}}</td>
					<td>{{$wellseach->province}}</td>
					<td><a style="color: blue;" href="{{route('chitiethquantracnuocduoidat',[$wellseach->well_code])}}">XEM</a></td>
				</tr>
			   @endforeach
			</tbody>
		</table>
		   {!! $wellseachs->links() !!}
	</div>
	@else


	

	<div class="containerr" style="margin-top: 10px; max-width: 87%; padding-bottom: 50px; margin: 0 auto;">   
		<label style="font-weight: bold; float:left; font-size: 17px; ">DỮ LIỆU QUAN TRẮC NƯỚC DƯỚI ĐẤT</label>       
		<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2">MÃ CÔNG TRÌNH</th>
					<th colspan="2" style="text-align: center;">VỊ TRÍ TỌA ĐỘ</th>
					
					<th colspan="3" style="text-align: center;">VỊ TRÍ HÀNH CHÍNH</th>
				
					<th rowspan="2"  style="width: 100px;">CHI TIẾT</th>

				</tr>
				<tr>
					
					<th >Tọa độ X</th>
					<th >Tọa độ Y</th>
					<th >Xã, Phường</th>
					<th > Quận,Huyện</th>
					<th >Tỉnh, Thành phố</th>
				</tr>

			</thead>
			<tbody>
				@foreach($wells as $wel)
				<tr>
					<td>{{$wel->well_code}}</td>
					<td>{{$wel->st_x}}</td>
					<td>{{$wel->st_y}}</td>
					<td>{{$wel->commune}}</td>
					<td>{{$wel->district}}</td>
					<td>{{$wel->province}}</td>
					<td><a style="color: blue;" href="{{route('chitiethquantracnuocduoidat',[$wel->well_code])}}">XEM</a></td>
				</tr>
			   @endforeach
			</tbody>
		</table>
		   {!! $wells->links() !!}
	</div>

	@endif
</div>

<style type="text/css">
	th{

		font-size: 13px;
		background-color: #7F93A8;
		color: white;
	
	}
</style>


@endsection