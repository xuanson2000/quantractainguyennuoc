<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>QUẢN TRỊ CƠ SỞ DỮ LIỆU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



    	<base href="{{asset('')}}"/> 

    <!-- Bootstrap Core CSS -->
    <link href="web/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="web/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="web/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="web/ower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="web/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="web/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>

</head>

<body>


	  <div id="wrapper">
        <!-- Navigation -->
      <!-- Navigation -->
             @include('quantri.header')

        <!-- Page Content -->
        <div id="page-wrapper" style="padding-top: 50px; background-color: white;">
         @yield('content')
       </div>

        <!-- Page Content -->
    
        <!-- /#page-wrapper -->

    </div>

	  <!-- jQuery -->
    <script src="web/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="web/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="web/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="web/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="web/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="web/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

        <script >
      
      function xacnhanxoa(msg){

        if(window.confirm(msg)){
          return true;

        }
        else

          return false;

      }
      function confirmAction() {
        return confirm("Thông báo?")
      }

    </script>
</body>

</html>
