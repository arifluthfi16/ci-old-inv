    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">  
            <ol class="breadcrumb left"> 
                <li class="active"><i class="fa fa-crowdfundings"></i> List crowdfunding</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-red">
                        <div class="card-header with-border">
                            <h3 class="card-title">Daftar crowdfunding</h3>
                            <div class="card-tools pull-right"> 
                            <a href="<?= base_url("admin/kelola_crowdfunding/tambah") ?>" class="btn btn-primary btn-md"><i class="fal fa-plus"></i> Tambah data</a>
                            </div><!-- /.card-tools -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-stripped">
                                <thead>
                                <tr> 
                                    <th>Judul</th>     
                                    <th>Dana dibutuhkan</th>     
                                    <th>Dana terkumpul</th>     
                                    <th>Tanggal dibuat</th>     
                                    <th>Deskripsi</th>     
                                    <th>Sedang aktif</th>     
                                    <th width="150px"></th>
                                </tr> 
                                </thead>
                                <tbody>
                                <?php foreach($result as $res) { ?>
                                <tr>
                                    <td><?php echo $res->title;?></td> 
                                    <td><?php echo $res->need;?></td>                
                                    <td><?php echo $res->earn;?></td>                
                                    <td><?php echo format_tanggal($res->date_created);?></td>                
                                    <td><?php echo $res->desc;?></td>                
                                    <td><i class="far fa-<?php echo $res->active_now == 1 ? "check text-success" : "strip text-danger";?>"></i></td>  
                                    <td>
                                        <a href="<?php echo site_url('admin/kelola_crowdfunding/edit/' . $res->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> edit</a>
                                        <a href="<?php echo site_url('admin/kelola_crowdfunding/delete/' . $res->id);?>" class="btn_hapus btn  btn-danger btn-xs"><i class="fa fa-trash"></i> hapus</a>
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
</script>