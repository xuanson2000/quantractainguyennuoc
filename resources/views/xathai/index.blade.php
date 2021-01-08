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
<h4>DỮ LIỆU XẢ THẢI VÀO NGUỒN NƯỚC</h4>
	<table class="table table-bordered">
		<thead>
			<tr><th>STT</th>
				<th>TÊN NGUỒN THẢI</th>
				<th>LƯU LƯỢNG (m3/ngày)</th>
				<th style="width: 200px;">MÀU NƯỚC</th>
				<th style="width: 200px;">MÙI NƯỚC</th>
				<th style="width: 100px;">CHI TIẾT</th>

			</tr>
		</thead>
		<tbody>
			@foreach($xathais as $xathai)
			<tr>
				<td>{{$loop->index+1}}</td>
				<td>{{$xathai -> tennguonthai}}</td>
				<td>{{$xathai -> luuluong}}</td>
				<td>{{$xathai -> mau}}</td>
				<td>{{$xathai -> mui}}</td>
				<td><a href="{{route('xathaidetail',[$xathai ->xt_id])}}">XEM</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
{{ $xathais->links() }}

</div>




<style type="text/css">
	th {

		font-size: 12px;
		background-color: #415676;
		color: white;
	}
</style>




@endsection