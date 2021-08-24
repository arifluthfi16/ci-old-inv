    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"> 
         <ol class="breadcrumb left">
           <li><a href="<?php  echo base_url('admin/kelola_crowdfunding') ?>"><i class="fa fa-crowdfundings"></i> List crowdfunding</a></li> 
           <li class="active">Edit crowdfunding</li>
         </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-red">
                        <div class="card-header with-border">
                            <h3 class="card-title">Edit crowdfunding</h3>
                        </div><!-- /.card-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_crowdfunding/edit/' . $id);?>" method="post">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-5">

                              <div class="form-group <?php echo (form_error('title')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Judul</label> 
                                <input class="form-control" type="text" name="title" value="<?php echo set_value('title', $crowdfunding->title); ?>">
                                <?php echo (form_error('title')) ? '<span class="help-block">' . form_error('title') . '</span>' : '';?> 
                              </div>
 
                              <div class="form-group <?php echo (form_error('need')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Dana dibutuhkan</label> 
                                <input class="form-control" type="text" name="need" value="<?php echo set_value('need', $crowdfunding->need); ?>">
                                <?php echo (form_error('need')) ? '<span class="help-block">' . form_error('need') . '</span>' : '';?> 
                              </div>      
 
                              <div class="form-group <?php echo (form_error('earn')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Terkumpul</label> 
                                <input class="form-control" type="text" name="earn" value="<?php echo set_value('earn', $crowdfunding->earn); ?>">
                                <?php echo (form_error('earn')) ? '<span class="help-block">' . form_error('earn') . '</span>' : '';?> 
                              </div> 
  
                            </div><!-- end col -->
                            <div class="col-md-5 offset-md-1">

                              <div class="form-group <?php echo (form_error('desc')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Deskripsi</label> 
                                <textarea class="form-control" name="desc"><?php echo set_value('desc', $crowdfunding->desc); ?></textarea>
                                <?php echo (form_error('desc')) ? '<span class="help-block">' . form_error('desc') . '</span>' : '';?> 
                              </div> 
 
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="active_now" name="active_now">
                                  <label for="active_now" class="custom-control-label" style="padding-top: 1px">jadikan aktif sekarang</label>
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
        <a href="<?php  echo base_url('admin/kelola_crowdfunding') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list admin</a>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/layout/footer'); ?>

     