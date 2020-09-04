<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Error 403 Access Forbidden </title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page skin-blue">
   <br><br><br><br><br><br><br><br>
   <div class="error-page">
      <h2 class="headline text-red">403</h2>

      <div class="error-content">
         <h3><i class="fa fa-warning text-red"></i> Access Forbidden.</h3>

         <p>
            We will work on fixing that right away.
            Meanwhile, you may <a href="<?= base_url('auth/logout') ?>">return to logout</a> or try using the search form.
         </p>

         <form class="search-form">
            <div class="input-group">
               <input type="text" name="search" class="form-control" placeholder="Search">

               <div class="input-group-btn">
                  <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                  </button>
               </div>
            </div>
            <!-- /.input-group -->
         </form>
      </div>
   </div>
   <!-- /.error-page -->

   <!-- jQuery 3 -->
   <script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap 3.3.7 -->
   <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- iCheck -->
   <script src="<?= base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
   <script>
      $(function() {
         $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
         });
      });
   </script>
</body>

</html>