<!DOCTYPE html> 
<html> 
  <head>
      <meta charset="utf-8">
      <title><?php echo (isset($title)) ? $title : 'Untitled' ;?></title>
      <meta name="description" content="">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.ico" type="image/x-icon">

      <link href="<?php  echo base_url() ?>assets/css/ext/normalize.css" rel="stylesheet" type="text/css" media="all"/>  
      <link href="<?php  echo base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/> 
      <link href="<?php  echo base_url() ?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="<?php  echo base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css" media="all"/>
      <!-- <link href="https://fonts.googleapis.com/css2?family=Varta:wght@300;400;600;700&display=swap" rel="stylesheet">  -->
      <link href="<?php  echo base_url() ?>assets/frontcss/main-style.css" rel="stylesheet" type="text/css" media="all"/>
 
      <?php if(isset($css)) {foreach($css as $c) { ?>
        <link rel="stylesheet" href="<?php echo base_url($c);?>">
      <?php }} ?>
      <?php if(isset($js)) {foreach($js as $j) { ?>
        <script src="<?php echo base_url($j);?>" type="text/javascript"></script>
      <?php }} ?>
      
      <script>
        var BASE_URL = '<?php echo site_url();?>';
      </script>
  </head>
  <body>
    <!-- main navigation  -->
    <div class="nav">
      <div class="container">  
        <a href="<?php echo site_url() ?>" class="nav-logo"> 
            <div class="logo-img">
              <img src="<?php echo base_url() ?>assets/images/logo-dark.png">   
            </div> 
        </a> 
        <div class="nav-menu">
          <ul>  
            <li><a target="_blank" href="https://play.google.com/store/apps/details?id=com.vanameid">Download aplikasi</a></li>
            <li><a data-animate="true" href="#about">Tentang Kami</a></li> 
            <li><a data-animate="true" href="#geo">Tambak udang</a></li> 
            <li><a data-animate="true" href="#faq">FAQ</a></li> 
            <li>
              <a href="<?php echo base_url('login'); ?>"><b>Masuk</b></a>
            </li>
            <li class="ml-2"><a class="btn btn-primary-inline btn-sm" href="<?php echo base_url('register'); ?>">Mendaftar</a></li>  
          </ul>
        </div> 

        <div class="menu-toggle">
          <a class="btn-toggle" href="#"><i class="fa fa-bars"></i></a>
        </div> 

      </div>   <!-- end container -->

 

    </div><!-- end nav -->



<!-- 
            <li class="has-sub"> 
              <a href="<?php echo base_url('geodestination'); ?>">Geodestination</a>
              <ul class="sub-menu">
                <li><a href="#">Top Five</a></li>
                <li><a href="#">Top Ten</a></li>
                <li><a href="#">All Geo</a></li>
              </ul>
            </li> -->