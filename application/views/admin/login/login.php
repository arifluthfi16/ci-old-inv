 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DASHBOARD UDANG V LOGIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css"> 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style type="text/css">
    .card{
      background: transparent;
      box-shadow: none;
      border: none;
    }
    .login-card-body, .register-card-body{
      background: transparent;
    }
    .login-card-body .input-group .input-group-text, .register-card-body .input-group .input-group-text{
      background: #fff;
      border-radius: 0px 7px 7px 0px;
      border-color: #a5adb6;
    }
    .form-control, .btn{
      height: 45px;
      border-radius: 7px;
    }
    .form-control{
      border-color: #a5adb6;
    } 
    .form-control:focus{
      box-shadow: none;
    }
    .alert{
      font-size: 14px;
    }
    .alert h4{ 
      font-size: 16px;
      color: #333; 
      display: none;
    }

    .input-group-text{
      width: 40px;
      padding-left: 0px;
      padding-right: 0px;
    }
    .input-group-text:before{
      width: 100%;
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  

  <div class="login-logo"> 
    <a>UDANG V ADMIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form action="<?php echo base_url('admin/login/check') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username or Email">
          <div class="input-group-append">
              <span class="fa fa-envelope input-group-text"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
          </div>
        </div>
        <div class="row"> 
          <div class="col-12">
            <button type="submit" name="submit" value="1" class="btn btn-warning btn-block mb-1"><i class="fa fa-sign-in"></i> Masuk</button> 
          </div> 
        </div>
      </form>

      
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  
<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>

<script src="<?php echo base_url();?>assets/js/notify.min.js"></script>
<script type="text/javascript">
 

  setTimeout(function(){
    $('.alert').remove();
  }, 4000);


    <?php
  if($this->session->flashdata('sukses')) { 
    echo alert_sukses($this->session->flashdata('sukses'));
  }
  if($this->session->flashdata('warning')) { 
  echo alert_warning($this->session->flashdata('warning'));
  }
  if($this->session->flashdata('error')) { 
  echo alert_error($this->session->flashdata('error'));
  }
  if($this->session->flashdata('info')) { 
  echo alert_info($this->session->flashdata('info'));
  }
  
  ?>
</script>
 
</body>
</html>




