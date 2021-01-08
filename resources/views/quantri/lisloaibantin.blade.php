

@extends('quantri.layout')

@section("content")
<!-- đg -->



<p style=" color: blue; font-size: 17px; float: left; font-weight: bold;">DANH SÁCH LOẠI BẢN TIN</p>
   
<table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>TÊN LOẠI BẢN TIN</th>
        <th>GHI CHÚ</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($lisloaibantins as $lislt)
    	<tr>
    		
    		<td>{{$loop->index+1}}</td>
    		<td>{{$lislt ->name}}</td>
    		<td></td>
    	</tr>
    	@endforeach
      
    </tbody>
  </table>
     {{ $lisloaibantins->links() }}

    <!-- /#wrapper -->

  @endsection