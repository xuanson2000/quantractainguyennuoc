

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>LOGIN</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<link href="web1/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="web1/css/style.css" type="text/css" media="all">

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

  <h2 style="margin-top: 50px; font-weight: bold; text-shadow: white 0.1em 0.1em 0.2em;">ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ CỔNG THÔNG TIN </h2>

  <div class="w3layoutscontaineragileits">
  <h2>LOGIN</h2>
    <form action="{{route('dangnhappost')}}" method="post">
      <input type="hidden"  name="_token" value="{{csrf_token()}}" >

      <input type="text" Name="uname" placeholder="USERNAME" required="">
      <input type="password" Name="psw" placeholder="PASSWORD" required="">
      <ul class="agileinfotickwthree">
        <li>
          <input type="checkbox" id="brand1" value="">
          <label for="brand1"><span></span>Remember me</label>
          <a href="#">Forgot password?</a>
        </li>
      </ul>
      <div class="aitssendbuttonw3ls">
        <input type="submit" value="LOGIN">
        <p> To register new account <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
        <div class="clear"></div>
      </div>
    </form>
  </div>
  
  <!-- for register popup -->
  <div id="small-dialog1" class="mfp-hide">
    <div class="contact-form1">
      <div class="contact-w3-agileits">
        <h3>Register Form</h3>
        <form action="#" method="post">
            <div class="form-sub-w3ls">
              <input placeholder="User Name"  type="text" required="">
              <div class="icon-agile">
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
            </div>
            <div class="form-sub-w3ls">
              <input placeholder="Email" class="mail" type="email" required="">
              <div class="icon-agile">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
              </div>
            </div>
            <div class="form-sub-w3ls">
              <input placeholder="Password"  type="password" required="">
              <div class="icon-agile">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
              </div>
            </div>
            <div class="form-sub-w3ls">
              <input placeholder="Confirm Password"  type="password" required="">
              <div class="icon-agile">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
              </div>
            </div>
          <div class="login-check">
             <label class="checkbox"><input type="checkbox" name="checkbox" checked="">I Accept Terms & Conditions</label>
          </div>
          <div class="submit-w3l">
            <input type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>  
  </div>
  <!-- //for register popup -->
  
  <div class="w3footeragile" style="margin-top: 20px;">
    <p> &copy; 2020 Existing Login Form. All Rights Reserved | Design by <a href="" target="_blank">Trung tâm dữ liệu tài nguyên nước</a></p>
  </div>

  
  <script type="text/javascript" src="web1/js/jquery-2.1.4.min.js"></script>

  <!-- pop-up-box-js-file -->  
    <script src="web1/js/jquery.magnific-popup.js" type="text/javascript"></script>
  <!--//pop-up-box-js-file -->
  <script>
    $(document).ready(function() {
    $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });
                                    
    });
  </script>

</body>
<!-- //Body -->

</html>