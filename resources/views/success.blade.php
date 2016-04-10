<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    @include('partials.css')
    <![endif]-->
<meta http-equiv="refresh" content="2; URL='/index2'" />
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('partials.home.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('partials.home.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
  <section class="content">
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Done!</h4>
                Redirect after 5 second to ticket page
              </div>
        
     </section>
     </div>
    <!-- /.content-wrapper -->
    @include('partials.home.footer')

    <!-- Control Sidebar -->
    @include('partials.home.darkSidebar')<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
@include('partials.js')
</body>
</html>


