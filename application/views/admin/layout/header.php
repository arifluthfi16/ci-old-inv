<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
--> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php  echo ($title) ? $title : 'untitled' ; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome/css/all.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700,700i" rel="stylesheet">

<?php if(isset($css)) {foreach($css as $c) { ?>
  <link rel="stylesheet" href="<?php echo base_url($c);?>">
<?php }} ?>

<?php $data_user = $this->model_admin->get($this->session->admin_id); ?>


  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
 
  <style type="text/css">
     #table-regular{
        visibility: hidden;
     }
    .dataTables_wrapper #table-regular {
        visibility: visible;
    } 

  </style>

  <script>
    var BASE_URL = '<?php echo base_url();?>';
  </script> 
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <ul class="navbar-nav"> 
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link btn btn-outline-warning btn-sm"><span class="hidden-xs">Administrator</span></a>
      </li> -->
    </ul>  
  
    <ul class="navbar-nav ml-auto">  
      <li class="nav-item">
        <a class="nav-link text-light btn btn-sm btn-secondary" href="<?php echo base_url('indonesia_logout'); ?>">
          <i class="fa fa-sign-out"></i> Log out</a>
        </a> 
      </li> 
    </ul>
  </nav>  <!-- /.navbar -->


<?php $this->load->view("admin/layout/sidebar");
 