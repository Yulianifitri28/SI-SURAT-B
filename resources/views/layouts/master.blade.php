<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SURAT JSI</title>
    <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
	  <link href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
	  <link href="{{ asset('css/widgets.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
	  <link href="{{ asset('css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">


  </head>

  <body>
  <section id="container" class="">
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>
            <a href="index.html" class="logo">Surat <span class="lite">JSI</span></a>
            <div class="top-nav notification-row">
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"> {{Auth::user()->name}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="/ubahpwd"><i class="icon_profile"></i>Ubah Password</a>
                            </li>
                            <li class="eborder-top">
                                <a href="{{url('/logout')}}"><i class="icon_profile"></i>Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="/">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Tulis Surat</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/lihatsm">Surat Masuk</a></li>
                          <li><a class="" href="/admin/lihatsk">Surat Keluar</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Kotak Masuk</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          <span class="badge bg-important">{{$request->data[3]}}</span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/permintaansurat">Permintaan<span class="badge bg-important">{{$request->data[0]}}</span></a></li>
                          <li><a class="" href="/admin/disposisi">Disposisi<span class="badge bg-important">{{$request->data[1]}}</span></a></li>
                          <li><a class="" href="/admin/statusurat">Persetujuan<span class="badge bg-important">{{$request->data[2]}}</span></a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Arsip Surat</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/arsipsm">Surat Masuk</a></li>
                          <li><a class="" href="/admin/arsipdisp">Disposisi</a></li>
                          <li><a class="" href="/admin/arsipsk">Surat Keluar</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pengaturan</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/registeruser">Manajemen Pengguna</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					@yield('konten1')
				</div>
			</div>
           <div class="row">
		    <div class="col-lg-9 col-md-12">
				</div>
           </div>
    @yield('konten')
          </section>
      </section>
  </section>
    <script src="{{ asset('js/jquery.js') }}"></script>
	  <script src="{{ asset('js/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- nice scroll -->
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--script for this page only-->
	  <script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset('js/jquery.customSelect.min.js') }}" ></script>
	  <script src="{{ asset('assets/chart-master/Chart.js') }}"></script>

    <!--custome script for all page-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- custom script for this page-->
    <script src="{{ asset('js/sparkline-chart.js') }}"></script>
  	<script src="{{ asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
  	<script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
  	<script src="{{ asset('js/xcharts.min.js') }}"></script>
  	<script src="{{ asset('js/jquery.autosize.min.js') }}"></script>
  	<script src="{{ asset('js/jquery.placeholder.min.js') }}"></script>
  	<script src="{{ asset('js/gdp-data.js') }}"></script>
  	<script src="{{ asset('js/morris.min.js') }}"></script>
  	<script src="{{ asset('js/sparklines.js') }}"></script>
  	<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

   

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
