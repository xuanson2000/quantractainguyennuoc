

@extends('quantri.layout')

@section("content")
<!-- đg -->

@if(Session::has('messgthem'))
<div class="alert alert-danger" style="background-color: #9ED9E5; color: red;"> <strong>{{Session::get('messgthem')}}</strong>
</div>
@endif

@if(Session::has('messgxoa'))
<div class="alert alert-danger" style="background-color: #9ED9E5; color: red;"> <strong>{{Session::get('messgxoa')}}</strong>
</div>
@endif

<p style=" color: blue; font-size: 17px; float: left; font-weight: bold;">DANH SÁCH BẢN TIN</p>

   
<table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>TIÊU ĐỀ BẢN TIN</th>
        <th>TÓM TẮT BẢN TIN</th>
        <th>NGÀY ĐĂNG</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
    	
    	@foreach($lisbantin as $lislt)
    	
    	<tr>
    		
    		<td>{{$loop->index+1}}</td>
    		<td>{!!$lislt ->title!!}</td>
    		<td>{!!$lislt ->excerpt!!}</td>
    		<td>{{$lislt ->created_at}}</td>
    		<td>
          <a title="Sửa" href="{{route('editbantin',[$lislt->id])}}"><i class="fa fa-cog" aria-hidden="true"></i></a>
          
          <a title="Xóa" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa không')"   href="{{route('deletebantin',[$lislt->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>      
            </td>
    	</tr>
    	@endforeach
      
    </tbody>
  </table>
     {{ $lisbantin->links() }}

    <!-- /#wrapper -->

  @endsection