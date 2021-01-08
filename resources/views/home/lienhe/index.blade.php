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


<div class="row" >
	<div class="col-md-12" style="text-align: center; margin-bottom: 20px; ">
	<h4 style="background-color: #B7D4EE; width: 800px; margin: 0 auto; color: blue; padding-top: 10px; padding-bottom: 10px;">LIÊN HỆ</h4>
	</div>
	<div class="col-md-12" style="text-align: center;">
		<img style=" height:500px;width:600px; margin-bottom:20px; " src="anh/unnamed.jpg" class="img-fluid" alt="Responsive image">
	</div>

	<div class="col-md-12" style="text-align: center;">
		<p style="font-size: 19px; font-weight: bold; color: black;"> Bộ Tài nguyên và Môi trường</p>
		<p style="font-size: 22px; margin-top: -25px;color: black;" >Trung tâm Quy hoạch và Điều tra tài nguyên nước Quốc Gia </p>

	</div>
	
		
		<div class="sd" style="text-align: left; margin: 0 auto;">
			<p > <img src="anh/icon-dia-chi.png"> Số 93/95 Vũ Xuân Thiều - Phường Sài Đồng - Quận Long Biên - Thành phố Hà Nội <br><br>
             <img src="anh/icon-dien-thoai.png"> ĐT: 04.36740499  -  Fax: 04.36740491          <br>   <br>
             <img src="anh/email.png"> Email: ttqhdttnn@monre.gov.vn 
              <br><br>
             <img src="anh/icon-website.png"> Website: http://nawapi.gov.vn 
			</p>
		</div>
		<iframe style="margin: 0 auto; border: 1px solid #6F9ECE;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2633.25217090815!2d105.91395030863141!3d21.03344889713501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1587630833367!5m2!1svi!2s" width="800" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	

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