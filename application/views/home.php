<div class="main-content" style="min-height: 1200px;">
  <section class="banner" style="background-image: url('<?php echo base_url() ?>assets/images/sample/3.jpg');">
    <div class="layer-overlay"></div>
    <div class="banner-container container">
      <div class="text-banner">Aplikasi Crowdfunding Tambak Udang Vaname<span
          class="text-warning">Indonesia</span></div>
      <div class="text-banner-detail">Download aplikasinya dan mulai crowdfunding</div>
      <div class="banner-footer">
        <b>Bergabung bersama kami menjadi investor</b>
        <div class="banner-footer-logo"><i class="fas fa-circle"></i></div>
        <div class="row pt-5">
          <div class="col-md-5 pr-0">
            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vanameid">
              <img height="40px" src="<?= base_url() ?>/assets/images/google-play.png" alt="vanameid google playstore">
            </a>
          </div>
          <div class="col-md-2 py-2 pl-lg-3"><small><b>atau</b></small></div>
          <div class="col-md-5 pl-lg-4">
            <button class="btn btn-md btn-primary-inline btn-block"><i class="fal fa-plus"></i> Mendaftar</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="about section">
    <div class="container">
      <div class="content">
        <div class="content-title"><span class="ext">Tentang</span><span class="text-primary">Vanameid</span></div>
        <div class="content-text">
          Vanameid merupakan program crowdfunding yang di gagas oleh PT. Bakti Udang Indonesia dengan tujuan menggalang dana untuk pembangunan tambak udang. Dimulai di pesisir pantai Sukabumi disusul daerah pesisir pantai Indonesia.
        </div>
        <button class="btn btn-lg btn-primary mt-5">Selengkapnya tentang kami</button>
      </div>
    </div>
    <div class="poster">
      <img src="<?php echo base_url() ?>assets/images/sample/5.jpg">
    </div>
  </section>

  <section id="geo" class="geodestination section">
    <div class="title">Tambak udang <span>Vanameid</span></div>
    <div class="container">
      <div class="row">
        <div id="map" class="canvas-map col-md-7 mx-auto"></div>
      </div>
      <div class="top-five-title">Tambak udang vanameid berlokasi di sukabumi dan akan menyebar keseluruh pesisir
        Indonesia</div>
        <div class="row">
          <div class="col-lg-5">
            <img src="<?= base_url("assets/images/udang/1.jpg") ?>" class="w-100">
          </div><div class="col-lg-5 offset-lg-2">
            <img src="<?= base_url("assets/images/udang/2.jpg") ?>" class="w-100">
          </div>
        </div>
    </div>
  </section>

  <section id="faq" class="faq section">
    <div class="title">Pertanyaan yang sering <span>diajukan</span></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 pr-lg-4">
          <section class="accdn">
            <h5>Keuangan</h5>
            <dl class="badger-accordion js-badger-accordion">
              <?php foreach($data_faq_keuangan as $idx => $dat)  { ?>
              <dt class="badger-accordion__header">
                <button class="badger-accordion__trigger js-badger-accordion-header">
                  <div class="badger-accordion__trigger-title">
                    <?= $dat->pertanyaan ?>
                  </div>
                  <div class="badger-accordion__trigger-icon">
                  </div>
                </button>
              </dt>
              <dd class="badger-accordion__panel js-badger-accordion-panel">
                <div class="badger-accordion__panel-inner text-module js-badger-accordion-panel-inner">
                 <?= $dat->jawaban ?>
                </div>
              </dd> 
              <?php } ?>
            </dl>
          </section>
        </div>
        <div class="col-md-6 pl-lg-4">
          <section class="accdn pt-3 pt-lg-0">
            <h5>Budidaya</h5>
            <dl class="badger-accordion js-badger-accordion">
              <?php foreach($data_faq_budidaya as $idx => $dat)  { ?>
              <dt class="badger-accordion__header">
                <button class="badger-accordion__trigger js-badger-accordion-header">
                  <div class="badger-accordion__trigger-title">
                    <?= $dat->pertanyaan ?>
                  </div>
                  <div class="badger-accordion__trigger-icon">
                  </div>
                </button>
              </dt>
              <dd class="badger-accordion__panel js-badger-accordion-panel">
                <div class="badger-accordion__panel-inner text-module js-badger-accordion-panel-inner">
                 <?= $dat->jawaban ?>
                </div>
              </dd> 
              <?php } ?>
            </dl>
          </section>
          <section class="accdn pt-lg-5 pt-3">
            <h5>Keamanan</h5>
            <dl class="badger-accordion js-badger-accordion">
              <?php foreach($data_faq_keamanan as $idx => $dat)  { ?>
              <dt class="badger-accordion__header">
                <button class="badger-accordion__trigger js-badger-accordion-header">
                  <div class="badger-accordion__trigger-title">
                    <?= $dat->pertanyaan ?>
                  </div>
                  <div class="badger-accordion__trigger-icon">
                  </div>
                </button>
              </dt>
              <dd class="badger-accordion__panel js-badger-accordion-panel">
                <div class="badger-accordion__panel-inner text-module js-badger-accordion-panel-inner">
                 <?= $dat->jawaban ?>
                </div>
              </dd> 
              <?php } ?>
            </dl>
          </section>
        </div>
      </div>
    </div>
  </section>

   
  <section class="section-news with-bg section">
    <div class="container">
      <div class="category-title">
        <span class="title">Berita terbaru</span>
        <a class="btn btn-sm btn-primary-inline btn-expand-all" href="#">Lihat Semua</a>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box horizontal">
            <a href="#" class="link-overlay"></a>
            <div class="banner-img"><img src="<?php echo base_url() ?>assets/images/sample/1.jpg"></div>
            <div class="content">
              <div class="title">Maaf fitur ini masih dalam tahap pengembangan.</div>
              <div class="info">
                <span class="author"><i class="fas fa-user-circle"></i> Vanameid writter</span>
                <span class="date"><i class="far fa-clock"></i> few days ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box small">
            <a href="#" class="link-overlay"></a>
            <div class="banner-img"><img src="<?php echo base_url() ?>assets/images/sample/2.jpg"></div>
            <div class="content">
              <div class="title">Maaf fitur ini masih dalam tahap pengembangan.</div>
              <div class="info">
                <span class="author"><i class="fas fa-user-circle"></i> Vanameid writter</span>
                <span class="date"><i class="far fa-clock"></i> 2 Days Ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box small">
            <a href="#" class="link-overlay"></a>
            <div class="banner-img"><img src="<?php echo base_url() ?>assets/images/sample/3.jpg"></div>
            <div class="content">
              <div class="title">Maaf fitur ini masih dalam tahap pengembangan.</div>
              <div class="info">
                <span class="author"><i class="fas fa-user-circle"></i> Vanameid writter</span>
                <span class="date"><i class="far fa-clock"></i> 2 Days Ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box horizontal">
            <a href="#" class="link-overlay"></a>
            <div class="banner-img"><img src="<?php echo base_url() ?>assets/images/sample/4.jpg"></div>
            <div class="content">
              <div class="title">Maaf fitur ini masih dalam tahap pengembangan.</div>
              <div class="info">
                <span class="author"><i class="fas fa-user-circle"></i> Vanameid writter</span>
                <span class="date"><i class="far fa-clock"></i> 2 Days Ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box small">
            <a href="#" class="link-overlay"></a>
            <div class="banner-img"><img src="<?php echo base_url() ?>assets/images/sample/5.jpg"></div>
            <div class="content">
              <div class="title">Maaf fitur ini masih dalam tahap pengembangan.</div>
              <div class="info">
                <span class="author"><i class="fas fa-user-circle"></i> Vanameid writter</span>
                <span class="date"><i class="far fa-clock"></i> 2 Days Ago</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box small">
            <a href="#" class="link-overlay"></a>
            <div class="banner-img"><img src="<?php echo base_url() ?>assets/images/sample/6.jpg"></div>
            <div class="content">
              <div class="title">Rupiah Salemo Ipsum Sir Amet Domet Jos Golemon Okar imon.</div>
              <div class="info">
                <span class="author"><i class="fas fa-user-circle"></i> Euis Nunung</span>
                <span class="date"><i class="far fa-clock"></i> 2 Days Ago</span>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end row -->
    </div><!-- end container -->
  </section><!-- end section news -->

  <section class="email-subscribe section">
    <div class="container">
      <div class="cont">
        <b>Bergabung bersama kami menjadi investor</b>
        <div class="banner-footer-logo"><i class="fas fa-circle"></i></div>
        <div class="row pt-5">
          <div class="col-md-5 pr-0">
            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vanameid">
              <img height="40px" src="<?= base_url() ?>/assets/images/google-play.png" alt="vanameid google playstore">
            </a>
          </div>
          <div class="col-md-2 py-2 pl-lg-3"><small><b>atau</b></small></div>
          <div class="col-md-5 pl-lg-4">
            <button class="btn btn-md btn-primary-inline btn-block"><i class="fal fa-plus"></i> Mendaftar</button>
          </div>
        </div>
      </div>
      <div class="text">Download aplikasinya dan mulai <span class="text-primary">crowdfunding</span></div>
    </div>
  </section>

</div><!-- end main content -->
<?php $this->load->view('layout/footer'); ?>


<script type="text/javascript">
  $(function () {
    var map,
      markers = [
        { latLng: [-7.04, 107.54], name: 'Bandung', wisata: 'Tambak udang batch 2' },
        { latLng: [-6.59, 106.81], name: 'Sukabumi', wisata: 'Tambak udang batch 1' },
      ]

    map = new jvm.Map({
      container: $('#map'),
      map: 'asia_merc',
      panOnDrag: false,
      zoomOnScroll: false,
      zoomButtons: false,
      markers: markers,
      backgroundColor: '#fff',
      markerStyle: {
        initial: {
          fill: '#706fd3',
          stroke: '#474787',
          r: 10,
        },
        selected: {
          fill: '#CA0020'
        }
      },
      regionStyle: {
        initial: {
          fill: '#fff',
          stroke: '#CA0020',
          "stroke-width": 0.4
        },
        hover: {
          cursor: 'default'
        },
      },
      onMarkerClick: function (e, code) {
        window.location = BASE_URL + 'dat/dat/' + code;
      },
      onMarkerTipShow: function (event, label, code) {
        $(label).addClass('tip-legend');
        $(label).append($("<br/>"));
        $(label).append($("<span/>", {
          'class': 'text-warning',
          'html': markers[code].wisata
        }));
        $(label).append($("<p/>", {
          'class': 'desc',
          'html': 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo'
        }));

        console.log(code);
      },
      onRegionTipShow: function (e, el, code) {
        e.preventDefault();
      }
    });

    map.setFocus({ region: 'ID' });
  });

  const accordions = document.querySelectorAll('.js-badger-accordion');

  Array.from(accordions).forEach((accordion) => {
      const ba = new BadgerAccordion(accordion);  
  }); 

  

  $('.nav-menu a[data-animate="true"]').click(function(event) { 
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) { 
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); 
      if (target.length) { 
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 50
        }, 500, function() { 
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) {  
            return false;
          } else {
            $target.attr('tabindex','-1');  
            $target.focus();  
          };
        });
      }
    }
  });
</script>