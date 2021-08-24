    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">  
            <ol class="breadcrumb left"> 
                <li class="active"><i class="fa fa-penggunas"></i> List pengguna</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-red">
                        <div class="card-header with-border">
                            <h3 class="card-title">Daftar pengguna</h3>
                            <div class="card-tools pull-right"> 
                            </div><!-- /.card-tools -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-stripped">
                                <thead>
                                <tr>
                                    <th>Nama </th> 
                                    <th>Email</th>     
                                    <th>Whatsapp</th>     
                                    <th>Verified</th>     
                                    <th>KTP</th>     
                                    <th width="20%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $res) { ?>
                                    <tr>
                                        <td><img width="22px" style="border-radius: 11px; margin-right: 5px" src="<?= $res->display_pict ?>"/> <?php echo $res->name;?></td>

                                        <td><?php echo $res->email;?></td>
                                        <td><?php echo $res->phone_number;?></td>
                                        <td><i class="far fa-<?php echo $res->verified == 1 ? "check text-success" : "times text-danger";?>"></i></td>
                                        <td>
                                            <?php if(!is_null($res->identity_image)){ ?>
                                                <a style="border: 2px solid #333" target="_blank" href="<?= base_url("uploads/gambar/" . $res->identity_image) ?>">
                                                    <img class="lozad" width="22px" style="margin-right: 5px" data-src="<?= base_url("uploads/gambar/" . $res->identity_image) ?>"/>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                        <a href="<?php echo site_url('admin/kelola_pengguna/edit/' . $res->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> edit</a>
                                        <a href="<?php echo site_url('admin/kelola_pengguna/delete/' . $res->id);?>" class="btn_hapus btn  btn-danger btn-xs"><i class="fa fa-trash"></i> hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <?php echo $this->pagination->create_links();?>
                        </div><!-- card-footer -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 
    <?php $this->load->view('admin/layout/footer'); ?>
 <script type="text/javascript">
     $('.btn_hapus').click(function(){ 
         return confirm('apakah anda yakin?');
     });

    const observer = window.lozad('.lozad', {
        rootMargin: '0px 0px', // syntax similar to that of CSS Margin
        threshold: 0.1, // ratio of element convergence
        enableAutoReload: true // it will reload the new image when validating attributes changes
    });

</script>