    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <ol class="breadcrumb left">
             <li><a href="<?php  echo base_url('admin/kelola_pengguna') ?>"><i class="fa fa-penggunas"></i> List pengguna</a></li> 
             <li class="active">Tambah pengguna</li>
           </ol> 
        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-red">
                        <div class="card-header with-border">
                            <h3 class="card-title">Tambah pengguna</h3>
                        </div><!-- /.card-header -->
                        <form class="form" action="<?php echo site_url('admin/kelola_pengguna/tambah');?>" method="post">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-5">

                              <div class="form-group <?php echo (form_error('nama')) ? 'has-error' : '';?>">
                                <label class="control-label">Nama</label> 
                                <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama'); ?>">
                                <?php echo (form_error('nama')) ? '<span class="help-block">' . form_error('nama') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('email')) ? 'has-error' : '';?>">
                                <label class="control-label">Email</label> 
                                <input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>">
                                <?php echo (form_error('email')) ? '<span class="help-block">' . form_error('email') . '</span>' : '';?> 
                              </div>  
                            </div><!-- end col -->
                            <div class="col-md-5 col-md-offset-1">

                              <div class="form-group <?php echo (form_error('password')) ? 'has-error' : '';?>">
                                <label class="control-label">Password</label> 
                                <input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>">
                                <?php echo (form_error('password')) ? '<span class="help-block">' . form_error('password') . '</span>' : '';?> 
                              </div>

                              <div class="form-group <?php echo (form_error('cpassword')) ? 'has-error' : '';?>">
                                <label class="control-label">Konfirmasi Password</label> 
                                <input class="form-control" type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>">
                                <?php echo (form_error('cpassword')) ? '<span class="help-block">' . form_error('cpassword') . '</span>' : '';?> 
                              </div> 

                            </div><!-- end col -->
                          </div><!-- end row -->
                        </div><!-- /.card-body -->
                        <div class="card-footer c">
                            <button class="btn btn-primary" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah pengguna</button>
                        </div><!-- card-footer -->
                    </form>
                    </div><!-- /.card -->
        <a href="<?php  echo base_url('admin/kelola_pengguna') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list admin</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/layout/footer'); ?>
 