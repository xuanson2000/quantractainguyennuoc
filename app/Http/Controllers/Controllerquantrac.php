<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Charts;
use Excel;
use App\water_level;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class Controllerquantrac extends Controller
{
    //

 public function lienhedulieumucnuoc()
 { 

  return view('home.quantracnuocduoidat.contact');

}

public function sendmail(Request $req){

  $data = array(
    'name'      =>  $req->name,
    'phone'   =>   $req->phone,
    'adree'   =>   $req->adree,
    'coquan'   =>   $req->coquan,
    'comment'   =>   $req->comment

  );

  Mail::to('xuanson.stv@gmail.com')->send(new SendMail($data));
  return back()->with('success', 'Cảm ơn bạn đã đăng ký, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!');


}


  public function index()
  {
    $wells = DB::table('monitoring_well')
    ->select('gid', 'id', 'well_code', DB::raw('st_x(ST_Transform(geom, 3405))'),
      DB::raw('st_y(ST_Transform(geom, 3405))'), 'province', 'district', 'commune', 'id_monitoring_network',
      'id_monitoring_line', 'water_layer', 'elevation', 'static_water_level', 'water_flow', 'drawdown',
      'water_flow_coeff', 'coeff_k', 'coeff_km', 'coeff_a', 'coeff_muy', 'monitor_meteo', 'monitor_hydro',
      'monitor_meteo_irrig','monitor_hydro_irrig','monitor_tide','monitor_pressure','monitor_meteo_hydro',
      'monitor_level','monitor_water_flow','monitor_templature','monitor_chemistry','start_date','description',
      'phuongphapqt','chedoquantrac_kt')->paginate(20);

    $monitoring_networks = DB::table('monitoring_network')
    ->select('*')
    ->orderBy('id', 'DESC')->get();
    return view('home.quantracnuocduoidat.index',['wells'=>$wells,'monitoring_networks' => $monitoring_networks,]);
    unset($wells);
    unset($monitoring_networks);

  }

   
  
  public function quantracnuocduoidattheovung(Request $req)
  {

    if($req->vungquantrac ==0){
     $wellseachs=DB::table('monitoring_well')->paginate(20);
     $namemonitoring_network="";

   }
   else
   {
    $wellseachs=DB::table('monitoring_well')->where('region',$req->vungquantrac)->paginate(20);
    $namemonitoring_network=DB::table('monitoring_network')->find($req->vungquantrac);
    
  }

    $monitoring_networks = DB::table('monitoring_network')->select('*')->orderBy('id', 'DESC')->get();
    

   return view('home.quantracnuocduoidat.index',['wellseachs'=>$wellseachs,'monitoring_networks' => $monitoring_networks,'namemonitoring_network'=>$namemonitoring_network]);
   unset($wellseachs);
   unset($monitoring_networks);
  }


    public function chitiet($id)
    {

      $wells_detail=DB::table('monitoring_well')->where('well_code',$id)->first();
      $namnow=Carbon::now()->year;

      // $water_level_detail=DB::table('monitoring_well')->join('water_level', 'monitoring_well.well_code', '=', 'water_level.well_code')->where('water_level.well_code',$id)->select('water_level.*')->get();
      
      return view('home.quantracnuocduoidat.chitiet',['wells_detail'=>$wells_detail,'namnow'=>$namnow]);
      unset($wells_detail);
      unset($namnow);
      unset($water_level_detail);

    }

    
    public function chitietmucnuoc($id)
    { 
      $namnow=Carbon::now()->year;
      $wells_detail=DB::table('monitoring_well')->where('id',$id)->first();
      return view('home.quantracnuocduoidat.chitietmucnuoc',['wells_detail'=>$wells_detail,'namnow'=>$namnow]);
      unset($wells_detail);
      unset($namnow);
    }



    
    public function bieudomucnuoc($id, Request $req)
    { 
      
      $ids=$id;
      $reqs=$req->namquantrac;
      $namnow=Carbon::now()->year;
      $wells_detail=DB::table('monitoring_well')->where('well_code',$id)->first();
   

      $water_level_detail=water_level::where('well_code',$id)->whereYear('date_measure',$req->namquantrac)->select('well_code','date_measure','water_level')->get();


      // $water_level_detail_list=DB::table('water_level')->where('well_code',$id)->whereYear('date_measure',$req->namquantrac)->get();

       // $water_temperatures=DB::table('water_temperature')->where('well_code',$id)->whereYear('date_measure',$req->namquantrac)->get();

     $water_temperatures_char=DB::table('water_temperature')->where('well_code',$id)->whereYear('date_measure',$req->namquantrac)->get();


     

     $chart1 = Charts::database($water_temperatures_char, 'line', 'highcharts')
     ->title(" ")
     ->elementLabel("giá trị nhiệt độ")
     ->dimensions(750, 400)
     ->responsive(false)
     ->labels($water_temperatures_char->pluck('date_measure'))
     ->values($water_temperatures_char->pluck('temperature'));

// dd($chart1);

     $chart = Charts::database($water_level_detail, 'line', 'highcharts')
     ->title(" ")
     ->elementLabel("giá trị mực nước")
     ->dimensions(750, 400)
     ->responsive(false)
     ->labels($water_level_detail->pluck('date_measure'))
     ->values($water_level_detail->pluck('water_level'));
      
     return view('home.quantracnuocduoidat.chitiet',compact('chart'),['namnow'=>$namnow, 'wells_detail'=>$wells_detail,'water_level_detail'=>$water_level_detail,'ids'=>$ids,'reqs'=>$reqs,'water_temperatures_char'=>$water_temperatures_char,'chart1'=>$chart1]);


       //return view('bieudo.bieudocot',compact('chart'));
      // $namnow=Carbon::now()->year;
      // $wells_detail=DB::table('monitoring_well')->where('id',$id)->first();
      // return view('home.quantracnuocduoidat.chitietmucnuoc',['wells_detail'=>$wells_detail,'namnow'=>$namnow]);
       //$loop->index

     unset($wells_detail);
     unset($ids);
     unset($namnow);
     unset($reqs);

    }


  public function excel($id,$date){


      $excel=DB::table('monitoring_well')->join('water_level', 'monitoring_well.well_code', '=', 'water_level.well_code')->where('id',$id)->whereYear('date_measure',$date)->select('water_level.*')->get();



      $customer_array[] = array('STT','Thời Gian','Lượng Mưa');

      $stt=1;
      
      foreach($excel as $customer)
      {


       $stt=1;

       $customer_array[] = array(
        'STT'=>$stt++,
        'Thời Gian'  => $customer->date_measure,
        'Lượng Mưa'  => $customer->water_level,
      );

     }
     Excel::create('Customer Data', function($excel) use ($customer_array){
      $excel->setTitle('Customer Data');
      $excel->sheet('Customer Data', function($sheet) use ($customer_array){
        $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
    })->download('xlsx');

   }

   
    



}
