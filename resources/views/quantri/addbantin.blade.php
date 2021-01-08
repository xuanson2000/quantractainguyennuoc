

@extends('quantri.layout')

@section("content")

 
<!-- đg -->
<p style=" color: blue; font-size: 17px; float: left; font-weight: bold;">THÊM BẢN TIN</p>
   <br>    <br>
   <div class="rows">
      <div class="col-md-10" style="margin-bottom: 50px;">

    <form action="{{route('addbantinpost')}}" method="POST" enctype="multipart/form-data">
      <input type="hidden"  name="_token" value="{{csrf_token()}}" >
      <div class="form-group">
        <label>Thể loại bản tin</label>
        <select class="form-control" name="id_type" id="theloai">
          <option value="">chọn thể loại</option>
          @foreach($loaitins as $loaitin)
          <option value="{{$loaitin->id}}">{{$loaitin->name}}</option>
          @endforeach
        </select>
      </div>


      <div class="form-group">
        <label>Tiêu đề bản tin</label>
        <input class="form-control" name="tieude" placeholder="Please Enter text" />
      </div>


      <div class="form-group">
        <label>Nội dung tóm tắt bản tin</label>
        <textarea class="form-control" rows="3" name="tomtat"></textarea>
      </div>

      <div class="form-group">
        <label>Nội dung tóm tắt bản tin</label>
        <textarea  id="editor1" class="form-control" rows="3" name="noidung"></textarea>


        <script type="text/javascript">  
         CKEDITOR.replace( 'editor1');
       </script> 

     </div>

     <div class="form-group">
      <label>Ảnh bản tin</label>
      <input type="file" name="imganh">
    </div>


    <button type="submit" class="btn btn-default">Lưu lại</button>
    <button type="reset" class="btn btn-default">Reset</button>
  </form>
</div>

   </div>
  


  @endsection