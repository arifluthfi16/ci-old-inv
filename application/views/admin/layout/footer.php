
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/notify.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"/>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"/>


<?php if (isset($js)) {foreach ($js as $j) { ?>
  <script src="<?php echo base_url($j); ?>" type="text/javascript"></script>
<?php }} ?>

<script type="text/javascript">

  $(document).ready(function() {

    //data table
    if(typeof $('#table-regular').DataTable !== 'undefined'){
      $('#table-regular').DataTable( {
          "paging":   true,
          "ordering": true,
          "bLengthChange": false,
          "info":     true,
          columnDefs: [
             { orderable: false, targets: -1 }
          ],
          "oLanguage": {
               "sSearch": "Pencarian : ",
               "oPaginate": {
                      "sNext": "<i class='fa fa-angle-double-right'></i>",
                      "sPrevious": "<i class='fa fa-angle-double-left'></i>"
                    }
             }
      });
    }

  });

  $('.only-number').keyup(function(e){
    if (/\D/g.test(this.value))
    {
      // Filter non-digits from input value.
      this.value = this.value.replace(/\D/g, '');
    }
    if($(this).attr('max')){
      var max = parseInt($(this).attr('max'));
      console.log(max);
      if(parseInt(this.value) > max){
        this.value = max;
      }
    }
  });

   <?php
if ($this->session->flashdata('sukses')) {
  echo alert_sukses($this->session->flashdata('sukses'));
}
if ($this->session->flashdata('warning')) {
  echo alert_warning($this->session->flashdata('warning'));
}
if ($this->session->flashdata('error')) {
  echo alert_error($this->session->flashdata('error'));
}
if ($this->session->flashdata('info')) {
  echo alert_info($this->session->flashdata('info'));
}
?>

</script>
</body>
</html>
