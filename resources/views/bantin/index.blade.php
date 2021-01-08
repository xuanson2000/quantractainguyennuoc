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

	 <div class="col-md-12">
                    <div id="news-reports">
                        <div class="heading-title heading-dotted" style="background: #4A85B2; padding:5px 10px 5px 10px; margin-bottom: 15px;" >
                            <h4 style="background: #4A85B2; color: white;">TIN CẢNH BÁO -
                                DỰ BÁO TNN MẶT</h4>
                        </div>
                        @foreach($sw_articless as $item1 )

                        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        	<div class="col-md-3">
                        		@if($item1->image=='')
                        		<img class="img-fluid" src="{{ asset('images/12-min.jpg') }}" alt="">
                        		@else
                        		<img style="width: 300px; height: 180px;" class="img-fluid" src="source/imganh/product/{{$item1->image}}" alt="">
                        		@endif

                        	</div>
                             <div class="col-md-7"> 
                             	<p style="font-weight: bold;"><a style="color: #358122;" href="{{ route('articles.article.show', $item1->id ) }}"> {{$item1->title}}</a></p>
                             	<p>
                             		{!!$item1->excerpt!!}

                             	</p>
                              
                             </div>

                        </div>
                       @endforeach

                        {{ $sw_articless->links() }}
                         <div class="heading-title heading-dotted" style="background: #4A85B2; padding:5px 10px 5px 10px; margin-bottom: 15px;" >
                            <h4 style="background: #4A85B2; color: white;"> TIN CẢNH BÁO -
                                DỰ BÁO  TNN DƯỚI ĐẤT</h4>
                        </div>

                        @foreach($gw_articles as $item2 )

                        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        	<div class="col-md-3">
                        		
                               @if($item2->image=='')
                        		<img class="img-fluid" src="{{ asset('images/12-min.jpg') }}" alt="">
                               @else
                                 <img style="width: 300px; height: 180px;" class="img-fluid" src="source/imganh/product/{{$item2->image}}" alt="">
                               @endif

                        	</div>
                        	<div class="col-md-7"> 
                        		<p style="font-weight: bold;"><a style="color: #358122;" href="{{ route('articles.article.show', $item1->id ) }}"> {{$item2->title}}</a></p>
                        		<p>
                        			{!!$item2->excerpt!!}
                        		</p>

                        	</div>

                        </div>
                        @endforeach

                        {{ $sw_articless->links() }}





                        <!-- /POST ITEM -->
                    </div>
                </div>


</div>







@endsection