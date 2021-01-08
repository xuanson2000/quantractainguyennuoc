<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\web_articles;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\vanban;
use Hash;



class controllerQuantri extends Controller
{
    //

   public function getdangnhap(){

    return view('quantri.getdangnhap');

    }



    public function dangnhappost(Request $request)

    {

      $arr = [
        'username' => $request->uname,
        'password' => $request->psw,
     ];

      if(Auth::guard('quantri')->attempt($arr)) {

       //  $item=Auth::guard('nguoidung')->user()->truycap;
       //  $itemid=Auth::guard('nguoidung')->id();

       //  if( $item==null)
       //  {
       //   return redirect()->route('reset_dangnhap',[$itemid]);
       // }
       // else{
       //  if(Auth::guard('quantri')->user()->index=='TD')
       //  {
       //    return redirect()->route('thamdinh');
       //  }else if(Auth::guard('quantri')->user()->index=='x'){
       //    return redirect()->route('wp_admin');
       //  }else
         return redirect()->route('quantriindex');
        //dd('đăng nhập thành công');
       

     } 
       else {

       //    dd(' chưa chính xác');

      return redirect()->back()->with('loginb','Tài khoản hoặc mật khẩu không đúng!');

  }
  }

   public function getlogoutdangnhap(){
            Auth::logout();
          return redirect()->route('dangnhap');

   }



    public function index(){

    return view('quantri.index');

    }

    
      public function lisloaibantin(){

      	$lisloaibantins=DB::table('web_categories')->paginate(5);

      	return view('quantri.lisloaibantin',['lisloaibantins'=>$lisloaibantins]);

    }
    
        public function bantin(){

      	$lisbantin=DB::table('web_articles')->orderBy('id','DESC')->paginate(5);

      	return view('quantri.bantin',['lisbantin'=>$lisbantin]);
      	unset($lisbantin);

    }

    public function addbantin(){

    	$loaitins=DB::table('web_categories')->get();
    	return view('quantri.addbantin',['loaitins'=>$loaitins]);

    }

    public function addbantinpost( Request $req){

    	 $itembantin= new web_articles;

    	// $itembantin=new table('web_articles');
    	$itembantin->title= $req->tieude;
    	$itembantin->excerpt= $req->tomtat;
    	$itembantin->content= $req ->noidung;
    	$itembantin->category_id= $req ->id_type;
    	
      if($req ->hasFile('imganh')){

       $file =$req->file('imganh');
       $name =$file ->getclientoriginalname();
       $Hinh =str_random(4)."_".$name;

       while(file_exists("source/imganh/product/".$Hinh))
       {

           $Hinh =str_random(4)."_".$name;
       }
        $file->move("source/imganh/product/",$Hinh);
       $itembantin ->image=$Hinh;
        }
            else{

          $itembantin->image="erro";
          }



    	$itembantin->save();

        $lisbantin=DB::table('web_articles')->paginate(9);

        return redirect('quantri/quan-tri-ban-tin/ban-tin')->with('messgthem','Lưu thành công công');
    	// return view('quantri.bantin',['lisbantin'=>$lisbantin])->with('messgthem','Them thanh cong');
    	unset($lisbantin);
    }


    public function deletebantin($id){

      $deletebantin = web_articles::find($id);
      $deletebantin->delete();

      return redirect('quantri/quan-tri-ban-tin/ban-tin')->with('messgxoa','Xóa thành công');

    }


    

    public function editbantin($id){


      $loaitins=DB::table('web_categories')->get();
      $idbantins=Article::find($id);

      
      return view('quantri.editbantin',['loaitins'=>$loaitins,'idbantins'=>$idbantins]);
      unset($idbantins);
      unset($loaitins);
    }

    

       public function editbantinpost(Request $req,$id){

      $idbantinpost=Article::find($id);
      $idbantinpost->category_id= $req ->id_type;
      $idbantinpost->title= $req ->tieude;
      $idbantinpost->excerpt= $req ->tomtat;
      $idbantinpost->content= $req ->noidung;

      if($req ->hasFile('imganh')){

        $file =$req->file('imganh');
        $name =$file ->getclientoriginalname();
        $Hinh =str_random(4)."_".$name;

        while(file_exists("source/imganh/product/".$Hinh))
        {

          $Hinh =str_random(4)."_".$name;
        }
        $file->move("source/imganh/product/",$Hinh);
        unlink("source/imganh/product/".$idbantinpost->image);
        $idbantinpost->image=$Hinh;

      }
      
      $idbantinpost->save();
      return redirect('quantri/quan-tri-ban-tin/ban-tin')->with('messgsua','Sửa thành công');
      unset($idbantinpost);


    }


    

      public function vanbanphapquy(){
        $lisloaivanbans=DB::table('loaivanban')->get();

        $VBS=DB::table('vanban')->orderBy('id','DESC')->paginate(5);


        return view('quantri.listvanban',['VBS'=>$VBS,'lisloaivanbans'=>$lisloaivanbans]);

    }



public function addvanbanphapquy( Request $req){

       $vanban= new vanban;

      // $itembantin=new table('web_articles');
      $vanban->Sovanban= $req->Sovanban;
      $vanban->Coquanbanhanh= $req->Coquanbanhanh;
      $vanban->Noidung= $req ->Noidung;
      $vanban->id_loaivanban= $req ->id_loaivanban;
       $vanban->Ngaybanhanh= $req ->Ngaybanhanh;
      
      
      if($req ->hasFile('imganh')){

       $file =$req->file('imganh');
       $name =$file ->getclientoriginalname();
       $Hinh =str_random(4)."_".$name;

       while(file_exists("upload/".$Hinh))
       {

           $Hinh =str_random(4)."_".$name;
       }
        $file->move("upload/",$Hinh);
       $vanban ->tenfile=$Hinh;
        }
            else{

          $vanban->tenfile="erro";
          }


      $vanban->save();

        return redirect()->back()->with('messgthem','Thêm thành công');
      unset($vanban);
    }


}
