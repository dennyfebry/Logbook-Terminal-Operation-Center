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
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>index.php/c_unit">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Unit <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>index.php/c_unit/amc">AMC</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/c_unit/pkppk">PKPPK</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/c_unit/avsec">AVSEC</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url(); ?>index.php/c_unit/laporan"><i class="fa fa-print"></i> Laporan </a>
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
                    <li><a href="<?php echo base_url(); ?>index.php/c_unit/akun"><i class="fa fa-database pull-right"></i>Managemen User</a></li>
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
                    <h2>Tabel Unit <!-- <small>Users</small> --></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link btn btn-default btn-xs" ><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a href="" class="btn btn-default btn-xs"><i class="fa fa-refresh"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="<?php echo site_url('c_unit/hasil_laporan');?>" method="get">
                      <div class="form-group">
                        <div class="col-sm-2">
                          <label class="col-sm-9 control-label">Date From</label>
                            <input type="date" name="g_dob_from" id="g_dob_from" value="<?=date('Y-m');?>-01" class="form-control tgl" placeholder="From">
                        </div>
                        <div class="col-sm-2">
                          <label class="col-sm-7 control-label">Date  To</label>
                            <input type="date" name="g_dob_to" id="g_dob_to" value="<?=date('Y-m-d');?>" class="form-control tgl" placeholder="To">
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-2">
                            <label class="col-sm-7 control-label">From Unit</label>
                              <select name="g_unid" id="g_unid" class="form-control">
                                <option value="">All</option>
                                <option value="AMC">AMC</option>
                                <option value="PKPPK">PKPPK</option>
                                <option value="AVSEC">AVSEC</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-2">
                            <label class="col-sm-9 control-label">View Data</label>
                              <button type="submit" class="btn btn-primary hp" name="tampilkan" id="tampilkan"><span id="tampil">Tampilkan</span></button>
                            </div>
                          </div>
                    </form>
                    <hr>
                    <?=form_open('c_unit/export_pdf', 'id="view_report"')?>
                      <input type="hidden" name="g_dob_from" id="g_dob_from" value="<?=$g_dob_from;?>" class="form-control tgl" placeholder="From">
                      <input type="hidden" name="g_dob_to" id="g_dob_to" value="<?=$g_dob_to;?>" class="form-control tgl" placeholder="To">
                      <input type="hidden" name="g_unid" id="g_unid" value="<?=$g_unid;?>" class="form-control tgl" placeholder="To"><hr>
                      <button type="submit" target="_blank" id="export_pdf" class="btn btn-primary" style="font-size: 10px;"><i class="fa fa-print"></i> Export PDF</button>
                    <?=form_close()?>
            <hr>
            <div class="row">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Dari Tanggal :</label>
                  <div class="col-sm-2">
                      <?=$g_dob_from;?>
                  </div>
                  <label class="col-sm-2 control-label">Data Unit :</label>
                  <div class="col-sm-2">
                      <?=$g_unid;?>
                  </div>
                  <label class="col-sm-2 control-label">User Cetak :</label>
                  <div class="col-sm-2">
                      <?=$this->session->userdata['nama']?>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Ke Tanggal :</label>
                  <div class="col-sm-2">
                      <?=$g_dob_to;?>
                  </div>
                  <label class="col-sm-2 control-label">Tanggal Cetak:</label>
                  <div class="col-sm-2">
                      <?=date('Y-m-d');?>
                  </div>
                  <label class="col-sm-2 control-label">Jumlah Data :</label>
                  <div class="col-sm-2">
                      <?=$jml;?>
                  </div>
              </div>
            </div>
            <br>
            <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Unit</th>
                          <th>Shift</th>
                          <th>Mulai</th>
                          <th>Selesai</th>
                          <th>Kegiatan</th>
                        </tr>
                      </thead>
                      <?php
                      $no=1;
                          foreach ($isi as $row) {
                          ?>
                      <tbody>                       
                        <tr style="background-color: white;">
                          <td><?=$no;?></td>
                          <td><?=$row['tanggal'];?></td>
                          <td><?=$row['unit'];?></td>
                          <td><?=$row['shift'];?></td>
                          <td><?=$row['waktu_awal'];?></td>
                          <td><?=$row['waktu_akhir'];?></td>
                          <td><?=$row['kegiatan'];?></td>
                        </tr>
                      </tbody>
                    <?php $no++;} ?>
                    </table>
                </div>  
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

  
  </body>
</html>