

@extends('quantri.layout')

@section("content")
<!-- đg -->




<div class="row" style="margin-bottom: 50px;">
	<div class="col-md-10">
		<p style=" color: blue; font-size: 17px; float: left; font-weight: bold;">DANH SÁCH VĂN BẢN PHÁP QUY</p>

	</div>
	<div class="col-md-2">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Thêm mới 
		</button>
	</div>

	<!-- The Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Thêm mới văn bản pháp quy</h4>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
		
					<form action="{{route('addvanbanphapquy')}}" method="POST" enctype="multipart/form-data">
						<input type="hidden"  name="_token" value="{{csrf_token()}}" >
						<div class="form-group">
							<label>Thể loại văn bản pháp quy</label>
							<select class="form-control" name="id_loaivanban" id="id_loaivanban">
								<option value="">chọn loại văn bản pháp quy</option>
								@foreach($lisloaivanbans as $lisloaivanban)
								<option value="{{$lisloaivanban->id}}">{{$lisloaivanban->name}}</option>
								@endforeach
							</select>
						</div>


						<div class="form-group">
							<label>Số hiệu văn bản</label>
							<input class="form-control" name="Sovanban" placeholder="Please Enter text" />
						</div>


						<div class="form-group">
							<label>Tên văn bản </label>
							<textarea class="form-control" rows="3" name="Noidung"></textarea>
						</div>
						<div class="form-group">
							<label>Cơ quan ban hành</label>
							<input type="text" class="form-control" name="Coquanbanhanh" placeholder="Please Enter text" />
						</div>
						<div class="form-group">
							<label>Ngày ban hành</label>
							<input type="date" class="form-control" name="Ngaybanhanh" placeholder="Please Enter text" />
						</div>


						<div class="form-group">
							<label>File đính kèm</label>
							<input type="file" name="imganh">
						</div>


						<button type="submit" class="btn btn-default">Lưu lại</button>
						<button type="reset" class="btn btn-default">Nhập lại</button>
					</form>



				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>
	<!-- gfdg -->
 </div>
   
<table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th>SỐ VĂN BẢN</th>
        <th>TÊN VĂN BẢN PHÁP QUY</th>
        <th>NGÀY BAN HÀNH</th>
        <th>CƠ QUAN BAN HÀNH</th>
        <th>FILE ĐÍNH KÈM</th>

      </tr>
    </thead>
    <tbody>
    	@foreach($VBS as $VB)
    	<tr>
    		
    		<td>{{$loop->index+1}}</td>
    		<td>{{$VB ->Sovanban}}</td>
    		<td>{{$VB ->Noidung}}</td>
    		
    		<td>{{$VB ->Ngaybanhanh}}</td>
    		<td>{{$VB ->Coquanbanhanh}}</td>
    		<td> <a href="upload/{{$VB ->tenfile}}"> {{$VB ->tenfile}}</a></td>
    		

    	</tr>
    	@endforeach
      
    </tbody>
  </table>
     {{ $VBS->links() }}

    <!-- /#wrapper -->

  @endsection