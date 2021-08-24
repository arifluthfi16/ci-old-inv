    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
              Dashboard admin
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12"></div>
 
          </div><!--row-->                
          
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('admin/layout/footer'); ?>

    <script type="text/javascript">
      <?php  
      $bulan = array_keys($penjualan);
      array_walk($bulan, function(&$x) {$x = "'$x'";}); ?>
      var lineChartData = {
        labels : [<?php echo implode(',', $bulan);?>],
        datasets : [
          {
            label: "Bulan Sekarang",
            fillColor : "rgba(151,187,205,0.2)",
            strokeColor : "rgba(151,187,205,1)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(151,187,205,1)",
            data : [<?php echo implode(',', array_values($penjualan));?>]
          }
        ]

      }

      var line = new Morris.Line({
          element          : 'lineChart',
          resize           : true,
          data             : [
            <?php 
                $i = 0;
                foreach($penjualan as $bln => $total){  
                  echo "{ month: '$bln', value: $total }";
                  if($i != count($penjualan) - 1){
                    echo ",\n";
                  }
                  $i++;
             } ?> 
          ],
          xkey             : 'month',
          ykeys            : ['value'],
          labels           : ['Total Penjualan'],
          labelColors       : ['#0f573b'],
          lineColors       : ['#1694a8'],
          lineWidth        : 2,
          hideHover        : 'auto',
          gridTextColor    : '#1694a8',
          gridStrokeWidth  : 0.4,
          pointSize        : 2,
          pointStrokeColors: ['#1694a8'],
          gridLineColor    : '#aaa',
          gridTextFamily   : 'Open Sans',
          gridTextSize     : 10
        });
    </script>
 