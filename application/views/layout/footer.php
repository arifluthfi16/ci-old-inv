
    <!-- ==================  start foooter ==================== -->
    <div class="footer">


      <div class="container">

        <div class="logo">
          <div class="logo-img">
            <img height="30px" width="143px" src="<?php echo base_url() ?>assets/images/logo-light.png"> 
          </div> 
        </div>
        
        <div class="footer-box-container"> 
          
          <section class="back-top"><i class="fa fa-chevron-up"></i></section>
          <div class="box left">  
            <div class="box-list"><a href="#">Tentang Kami</a></div> 
            <div class="box-list"><a href="#">Team Developer</a></div> 
            <div class="box-list"><a href="#">Hubungi Kami</a></div> 
            <div class="box-list"><a href="#">Kebijakan Privasi</a></div> 
          </div>
          <div class="box right"> 
            <div class="address">
              Jalan Supratman no 24A/120A<br> Hilir Kaler Bandung 20143
              <br>Indonesia<br>
              0812-0391-203 / 021-123-1223
            </div>
 
            <div class="sosmed">
              <a href=""><i class="fab fa-facebook"></i></a>
              <a href=""><i class="fab fa-twitter"></i></a>
              <a href=""><i class="fab fa-instagram"></i></a>
              <a href=""><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div><!-- footer box-contaier -->  


      </div><!-- end container -->

      <div class="box-copy">
        <i class="far fa-copyright"></i> Copyright 2019 <a href="">PT Bakti Udang Indonesia</a>
      </div>

    </div><!-- end footer -->
 

    <!-- javascript -->
    <script src="<?php  echo base_url() ?>assets/js/jquery.min.js"></script>    

    <?php if(isset($js)) {foreach($js as $j) { ?>
    <script src="<?php echo base_url($j);?>" type="text/javascript"></script>
    <?php }} ?>

    <script type="text/javascript">
      
      //toggle menu
      $('.btn-toggle').on('click', function(){   
        if($('.nav-menu > ul').is(":visible")){
          $('.nav-menu > ul').slideUp();
          $(this).removeClass('active');
        }else{
          $('.nav-menu > ul').slideDown(); 
          $(this).addClass('active');
        } 
      })
    </script>
 

  </body>
</html>