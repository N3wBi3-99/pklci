<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= $title ?> </title>
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

<body class="hold-transition login-page" style="background: url('<?= base_url() ?>assets/admin/img/symphony.png')">
   <div class="login-box">
      <div class="login-logo">
         <img src="<?= base_url() ?>assets/admin/img/logo_kudus.png" width="140px" alt="Logo Kudus">
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
         <p class="login-box-msg"><b>Dinas Perumahan, Kawasan Permukiman Dan Lingkungan Hidup</b></p>

         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('auth') ?>" method="post">
            <div class="form-group has-feedback">
               <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="row">
               <div class="col-xs-8">
                  <div class="checkbox icheck">
                     <label>
                        <input type="checkbox"> Remember Me
                     </label>
                  </div>
               </div>
               <!-- /.col -->
               <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
               </div>
               <!-- /.col -->
            </div>
         </form>

         <!-- <a href="#">Lupa Kata Sandi?</a><br> -->

      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->

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