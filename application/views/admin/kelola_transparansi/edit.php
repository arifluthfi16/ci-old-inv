    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"> 
         <ol class="breadcrumb left">
           <li><a href="<?php  echo base_url('admin/kelola_transparansi') ?>"><i class="fa fa-transparansis"></i> List transparansi</a></li> 
           <li class="active">Edit transparansi</li>
         </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-red">
                        <div class="card-header with-border">
                            <h3 class="card-title">Tambah transparansi</h3>
                        </div><!-- /.card-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_transparansi/edit/' . $transparansi->id);?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-5">

                              <div class="form-group <?php echo (form_error('title')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Judul</label> 
                                <input class="form-control" type="text" name="title" value="<?php echo set_value('title', $transparansi->title); ?>">
                                <?php echo (form_error('title')) ? '<span class="help-block">' . form_error('title') . '</span>' : '';?> 
                              </div>
 
                              <div class="form-group <?php echo (form_error('short_desc')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Deskripsi singkat</label> 
                                <textarea class="form-control"  name="short_desc" ><?php echo set_value('short_desc', $transparansi->short_desc); ?></textarea> 
                                <?php echo (form_error('short_desc')) ? '<span class="help-block">' . form_error('short_desc') . '</span>' : '';?> 
                              </div>       
  
                            </div><!-- end col -->
                            <div class="col-md-5 offset-md-1"> 
                              <div class="form-group <?php echo (form_error('thumbnail')) ? 'has-error' : '';?>">
                                <div><label for="inputNama" class="control-label">Thumbnail</label> </div>
                                <?php if(!is_null($transparansi->thumbnail)){ ?>
                                  <div class="mb-2">
                                    <img src="<?= $transparansi->thumbnail ?>" width="200px">
                                  </div>
                                <?php } ?>
                                <input type="file" class="form-control"  name="thumbnail">
                                <?php echo (form_error('thumbnail')) ? '<span class="help-block">' . form_error('thumbnail') . '</span>' : '';?> 

                              </div>  
                            </div><!-- end col -->

                            <div class="col-md-12"> 
                              <div class="form-group <?php echo (form_error('content')) ? 'has-error' : '';?>">
                                <label for="inputNama" class="control-label">Konten</label> 
                                <textarea id="editor" class="form-control"  name="content" ><?php echo set_value('content', $transparansi->content); ?></textarea> 
                                <?php echo (form_error('content')) ? '<span class="help-block">' . form_error('content') . '</span>' : '';?> 
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
        <a href="<?php  echo base_url('admin/kelola_transparansi') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list admin</a>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/layout/footer'); ?>

<script type="text/javascript">
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
      ckfinder: {
          uploadUrl: BASE_URL + 'admin/kelola_transparansi/upload_gambar'
      }
    })
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
     