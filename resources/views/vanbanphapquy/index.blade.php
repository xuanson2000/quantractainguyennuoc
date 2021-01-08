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
<div class="main" style="background-color: #E7ECEE; padding-top: 50px;">
	<div class="Conten" style="margin: 0 auto; width: 75%;">

		<form class="row" action="{{route('search')}}" method="post" style="background-color: #6295B1; padding-bottom: 30px;">
			@csrf

			<div class=" form-group col-md-3" style="margin-top:30px;" >
				<label style="font-weight: bold; float:left; color: black;">Tên văn bản</label>
				<input type="text" class="form-control" id="txtseach" name="txtseach" >
			</div>


				<div class="col-md-3" style="margin-top:30px;"> 
					<label style="font-weight: bold; float:left;color: black;">Loại văn bản</label>
					<select  class="form-control" name="loaivanban" id="loaivanban" required>
						<option value='0'>Tất cả văn bản</option>
						@foreach($loaiVB as $lvb)
						<option value="{{$lvb->id}}">{{$lvb->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2"><button style="margin-top:65px;" type="submit" class="btn btn-primary">Tìm kiếm</button></div>
			</form>
          <!-- </form> -->
	</div>

	@if( isset($viewseach))

	<div class="containerr" style="margin-top: 20px; max-width: 77%; padding-bottom: 50px; margin: 0 auto;">           
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>SỐ /KÝ HIỆU</th>
					<th >TRÍCH YẾU</th>
					<th style="width: 200px;">NGÀY HIỆU LỰC</th>
					<th style="width: 200px;">CƠ QUAN BAN HÀNH</th>
					<th style="width: 100px;">CHI TIẾT</th>

				</tr>
			</thead>
			<tbody>
				 @foreach($viewseach as $itemseach)
				<tr>
					<td>{{$itemseach -> Sovanban}}</td>
					<td>{{$itemseach -> Noidung}}</td>
					<td>{{$itemseach -> Ngaybanhanh}}</td>
					<td>{{$itemseach -> Coquanbanhanh}}</td>
					<td><a href="{{route('chitiet',[$itemseach->id])}}">XEM</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@else
	<div class="containerr" style="margin-top: 20px; max-width: 77%; padding-bottom: 50px; margin: 0 auto;">           
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>SỐ /KÝ HIỆU</th>
					<th >TRÍCH YẾU</th>
					<th style="width: 200px;">NGÀY HIỆU LỰC</th>
					<th style="width: 200px;">CƠ QUAN BAN HÀNH</th>
					<th style="width: 100px;">CHI TIẾT</th>

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

	@endif
</div>

<style type="text/css">
	th{

		font-size: 14px;
		background-color: #171F88;
		color: white;
	}
</style>




@endsection