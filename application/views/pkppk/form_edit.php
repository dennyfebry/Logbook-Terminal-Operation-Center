<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.ico"/>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url()?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url()?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>dist/bootstrap-clockpicker.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-plane"></i> <span>Angkasa Pura II</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url()?>assets/img/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $this->session->userdata('nama') ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Keterangan</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-table"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>index.php/c_pkppk/pkppk">PKPPK</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url(); ?>index.php/c_pkppk/laporan"><i class="fa fa-print"></i> Laporan </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url()?>assets/img/logo.png" alt=""><?php echo $this->session->userdata('level')?>, <?php echo $this->session->userdata('nama') ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url('c_login/keluar')?>"><i class="fa fa-power-off pull-right"></i> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= $title ?> <!-- <small>Some examples to get you started</small> --></h3>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Data <!-- <small>Users</small> --></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php
                        $id_unit = "";
                        $tanggal = "";
                        $shift = "";
                        $waktu_awal = "";
                        $waktu_akhir = "";
                        $kegiatan = "";
                        $unit = "";
                        if($op=="edit"){
                          foreach ($sql->result() as $obj) {
                            $id_unit = $obj->id_unit;
                            $tanggal = $obj->tanggal;
                            $shift = $obj->shift;
                            $waktu_awal = $obj->waktu_awal;
                            $waktu_akhir = $obj->waktu_akhir;
                            $kegiatan = $obj->kegiatan;
                            $unit = $obj->unit;
                            }
                        }

                      ?>
                    <form role="form" action="<?php echo base_url(); ?>index.php/c_pkppk/simpan" method="POST">
                      <input type="hidden" class="form-control"  name="op" value="<?php echo $op;?>">
                      <input type="hidden" class="form-control"  name="id_unit"  value="<?php echo $id_unit;?>">
                      <input type="hidden" class="form-control"  name="unit"  value="<?php echo $unit;?>">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control"  name="tanggal" min="2000-01-02" value="<?php echo $tanggal;?>"required="">
                      </div>
                      <div class="form-group">
                        <label>Shift : </label>
                        <select name="shift">
                          <option value="Pagi" <?php $obj->shift == 'Pagi' ? print "selected": "" ?>>Pagi</option>
                          <option value="Malam" <?php $obj->shift == 'Malam' ? print "selected": "" ?>>Malam</option>
                        </select>
                      </div>
                      <label>Waktu Mulai</label>
                      <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" name="waktu_awal" value="<?php echo $waktu_awal;?>" required="">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                      <label>Waktu Selesai</label>
                      <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">                        
                        <input type="text" class="form-control" name="waktu_akhir"  value="<?php echo $waktu_akhir;?>">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                      <div class="form-group">
                        <label>Kegiatan</label>
                        <input type="text" class="form-control"  name="kegiatan" placeholder="Kegiatan" value="<?php echo $kegiatan;?>" required="">
                      </div>
                        <button type="submit" value="submit" class="btn btn-default">Simpan</button>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; Aplikasi Logbook Report - Dikembangkan oleh IT Non Public Service,  Soekarno-Hatta International Airport
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url()?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url()?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url()?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url()?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url()?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>
    <script src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>

    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>dist/bootstrap-clockpicker.min.js"></script>

    <script type="text/javascript">
    $('.clockpicker').clockpicker()
      .find('input').change(function(){
        console.log(this.value);
      });
    </script>
    
  </body>
</html>