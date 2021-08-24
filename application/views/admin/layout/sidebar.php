  <!-- 
  
  # MANAGER PROYEK

   -->
   
 <aside class="main-sidebar sidebar-dark-danger elevation-0">
  <a class="brand-link"> 
    <span class="brand-text text-light text-center d-block font-weight-bold"> 
      <small><span class="text-danger">Vaname</span>id</small> 
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
      
    <label class="badge badge-warning text-center menu-label"><?php echo $this->model_admin->getNama($this->session->admin_id) ?></label>

    <li class="nav-item">
      <a class="nav-link  <?php echo $menu == 'dashboard' ? 'active' : '' ; ?>"  href="<?php echo base_url('admin/dashboard') ?>"><i class="nav-icon fa fa-building"></i> <p>Dashboard</p></a>
    </li>   

    <li class="nav-item">
      <a class="nav-link  <?php echo $menu == 'kelola_pengguna' ? 'active' : '' ; ?>"  href="<?php echo base_url('admin/kelola_pengguna') ?>"><i class="nav-icon fa fa-users"></i> <p>Kelola Pengguna</p></a>
    </li>    

    <li class="nav-item">
      <a class="nav-link  <?php echo $menu == 'kelola_crowdfunding' ? 'active' : '' ; ?>"  href="<?php echo base_url('admin/kelola_crowdfunding') ?>"><i class="nav-icon fa fa-credit-card"></i> <p>Kelola Crowdfunding</p></a>
    </li>    
 <li class="nav-item">
      <a class="nav-link  <?php echo $menu == 'kelola_transparansi' ? 'active' : '' ; ?>"  href="<?php echo base_url('admin/kelola_transparansi') ?>"><i class="nav-icon fa fa-file"></i> <p>Kelola Transparansi</p></a>
    </li>    

    </ul> 
    
  </aside>
