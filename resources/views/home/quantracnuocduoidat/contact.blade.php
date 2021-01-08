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
<!-- kdf background-image: url(https://duhocvic.com/wp-content/uploads/2020/03/hoc-khoa-hoc-may-tinh-720x389.jpg); background-position: center;background-repeat: no-repeat;background-size: cover; text-shadow: white 0.1em 0.1em 0.2em; -->

<div class="gg" style=" " >
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
	</div>
	@endif

<div class="row"  style="  width: 80%; margin: 0 auto; padding: 30px 30px 30px 30px; box-shadow: 3px 3px 5px 0px #666; margin-top: 30px; margin-bottom: 20px;">
	
		<p style="  background-color: #2462BE; font-size: 18px; padding:5px 10px 5px 10px; font-weight: bold; color:white;"> Để nhận dữ liệu quan trắc tài nguyên nước, xin vui lòng đăng ký thông tin cá nhân tại theo mẫu đăng ký dưới đây!</p>
	
	
	
						<form action="{{route('sendmail')}}" method="POST" style="width: 800px;">
							<input type="hidden"  name="_token" value="{{csrf_token()}}" >

							<div class="row">
								<div class="col-md-6 form-group">
									<label style="color:black;">Họ và tên <span style="color: red;"> (*)</span></label>
									<input class="form-control" name="name" placeholder="Nhập Họ và tên" required />
								</div>
								<div class="col-md-6 form-group">
									<label style="color:black;" >Điện thoại <span style="color: red;"> (*)</span></label>
									<input class="form-control" name="phone" placeholder=" Nhập Điện thoại" required/>
								</div>

							</div>
							<div class="row">
								
								<div class="col-md-6 form-group">
									<label style="color:black;">Địa chỉ </label>
									<input class="form-control" name="adree" placeholder=" Nhập Địa chỉ" required/>
								</div>
								<div class="col-md-6 form-group " >
									<label style="color:black;">Đơn vị làm việc <span style="color: red;"> (*)</span></label>
									<input class="form-control" name="coquan" placeholder=" Nhập Đơn vị làm việc" required/>
								</div>

							</div>
							<!-- <div class="row">
								<div class="col-md-6 form-group " >
									<label>Đơn vị làm việc <span style="color: red;"> (*)</span></label>
									<input class="form-control" name="adree" placeholder=" Nhập Địa chỉ" required/>
								</div>
								<div class="col-md-6 form-group " >
									<label>Đơn vị làm việc <span style="color: red;"> (*)</span></label>
									<input class="form-control" name="adree" placeholder=" Nhập Địa chỉ" required/>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-12 form-group">
									<label style="color:black;">Lời nhắn</label>

                                    <input style="height: 50px;" class="form-control" name="comment" placeholder=" Hãy gửi tin nhắn cho chúng tôi về vấn đề của bạn:" />
								
								</div>
							</div>
                            
							<button type="submit" class="btn btn-primary">Gửi</button>
							<button type="reset" class="btn btn-warning">Nhập lại</button>
							<form>

</div>


</div>






<style type="text/css">
	
</style>




@endsection