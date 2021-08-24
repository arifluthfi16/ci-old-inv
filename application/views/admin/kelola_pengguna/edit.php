    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"> 
         <ol class="breadcrumb left">
           <li><a href="<?php  echo base_url('admin/kelola_pengguna') ?>"><i class="fa fa-penggunas"></i> List pengguna</a></li> 
           <li class="active">Edit pengguna</li>
         </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-red">
                        <div class="card-header with-border">
                            <h3 class="card-title">Edit pengguna</h3>
                        </div><!-- /.card-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_pengguna/edit/' . $id);?>" method="post">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-5">

                              <div class="form-group <?php echo (form_error('nama')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Nama</label> 
                                <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama', $pengguna->name); ?>">
                                <?php echo (form_error('nama')) ? '<span class="help-block">' . form_error('nama') . '</span>' : '';?> 
                              </div>
 
                              <div class="form-group <?php echo (form_error('email')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Email</label> 
                                <input class="form-control" type="email" name="email" value="<?php echo set_value('email', $pengguna->email); ?>">
                                <?php echo (form_error('email')) ? '<span class="help-block">' . form_error('email') . '</span>' : '';?> 
                              </div>      
 
                              <div class="form-group <?php echo (form_error('phone_number')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Whatsapp</label> 
                                <input class="form-control" type="text" name="phone_number" value="<?php echo set_value('phone_number', $pengguna->phone_number); ?>">
                                <?php echo (form_error('phone_number')) ? '<span class="help-block">' . form_error('phone_number') . '</span>' : '';?> 
                              </div>

                              <a target="_blank" href="<?= base_url("uploads/gambar/" . $pengguna->identity_image) ?>"><img width="150px" style="margin-right: 5px" src="<?= base_url("uploads/gambar/" . $pengguna->identity_image) ?>"></a>
  
                            </div><!-- end col -->
                            <div class="col-md-5 offset-md-1">

                              <div class="form-group <?php echo (form_error('password')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Password</label> 
                                <input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>">
                                <span class="help-block text-muted">Kosongkan password jika tidak ingin di ubah!</span>
                                <?php echo (form_error('password')) ? '<span class="help-block">' . form_error('password') . '</span>' : '';?> 
                              </div>

                              <div class="form-group <?php echo (form_error('cpassword')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Konfirmasi Password</label> 
                                <input class="form-control" type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>">
                                <span class="help-block text-muted">Kosongkan password jika tidak ingin di ubah!</span>
                                <?php echo (form_error('cpassword')) ? '<span class="help-block">' . form_error('cpassword') . '</span>' : '';?> 
                              </div> 

                            </div><!-- end col -->
                          </div><!-- end row -->
                        </div><!-- /.card-body -->
                        <div class="card-footer c">
                            <button class="btn btn-primary" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </div><!-- card-footer -->
                    </form>
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        <a href="<?php  echo base_url('admin/kelola_pengguna') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list admin</a>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/layout/footer'); ?>

     