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

    <style>
    #bg {
        width: 100%;
        height: auto;
        background: url(<?php echo base_url()?>assets/img/bg4.jpg);
        background-repeat: repeat;
        background-size: 100% 100%;
    }
    </style>

    <script type="text/javascript">        
        function tampilkanwaktu(){  
          var waktu = new Date();
          var sh = waktu.getHours() + "";
          var sm = waktu.getMinutes() + "";
          var ss = waktu.getSeconds() + "";
          document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
        }
    </script>
  </head>

  <body id="bg">
        <!-- page content -->
      <table>
        <tr>
         <td height="20px"></td>
        </tr>
        <tr>
          <td width="380px"> </td>
          <td width="180px" >
            <div style="margin-left: 10px;color: white;text-shadow: 2px 2px 4px #000000;">
              <strong>
                <?php
                $hari = date('l');
                if ($hari=="Sunday") {
                 echo "Minggu";
                }elseif ($hari=="Monday") {
                 echo "Senin";
                }elseif ($hari=="Tuesday") {
                 echo "Selasa";
                }elseif ($hari=="Wednesday") {
                 echo "Rabu";
                }elseif ($hari=="Thursday") {
                 echo("Kamis");
                }elseif ($hari=="Friday") {
                 echo "Jum'at";
                }elseif ($hari=="Saturday") {
                 echo "Sabtu";
                }
                ?>,

                <?php
                $tgl =date('d');
                echo $tgl;
                
                $bulan =date('F');
                if ($bulan=="January") {
                 echo " Januari ";
                }elseif ($bulan=="February") {
                 echo " Februari ";
                }elseif ($bulan=="March") {
                 echo " Maret ";
                }elseif ($bulan=="April") {
                 echo " April ";
                }elseif ($bulan=="May") {
                 echo " Mei ";
                }elseif ($bulan=="June") {
                 echo " Juni ";
                }elseif ($bulan=="July") {
                 echo " Juli ";
                }elseif ($bulan=="August") {
                 echo " Agustus ";
                }elseif ($bulan=="September") {
                 echo " September ";
                }elseif ($bulan=="October") {
                 echo " Oktober ";
                }elseif ($bulan=="November") {
                 echo " November ";
                }elseif ($bulan=="December") {
                 echo " Desember ";
                }
                $tahun=date('Y');
                echo $tahun; ?>
                <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">        
                <span id="clock"></span>
              </strong>
            </div>
          </td>
          <td width="250px"> </td>
          <td width="250px"><h3 style="color: white;text-shadow: 2px 2px 4px #000000; text-align: center;"><strong>LOGBOOK REPORT TOC</strong></h3> </td>
          <td width="250px"> </td>
          <td rowspan=""><div style="margin-left: 10px; margin-bottom: 10px; "><img src="<?php echo base_url()?>assets/img/Logoo.png" width="250" height="87"></div></td>
        </tr>
      </table>
          <?php
            $date1="";
            $date2="";
          ?>
          <div class="col-md-2"></div>
          <div class="col-md-7">
          <form class="form-inline" action="<?php echo site_url('c_index/search_date');?>" method = "post">
            <div class="form-group">
              <input class="form-control" type="date" name = "date1" value="<?=date('Y-m');?>-01"/>
            </div>
            <a style="color: white;text-shadow: 2px 2px 4px #000000;"> s/d </a>
            <div class="form-group">
              <input class="form-control" type="date" name = "date2" value="<?=date('Y-m-d');?>"/>
            </div>
            <button type="submit" class="btn btn-primary" style="font-size: 12px; background-color: #205182;"> Tampilkan</button>
          </form>
        </div>
        <div class="col-md-1"><a href="<?php echo site_url('c_login')?>" class="btn btn-primary" style="font-size: 12px; background-color: #205182;"> Login</a>
        </div>

      <center >
      <div class="container">
        <br>
        <br>
          <table class="table table-bordered" style="font-size: 11px;" >
            <thead>
              <tr style="background-color: #205182; color: white;">
                <th>Tanggal</th>
                <th>Unit</th>
                <th>Shift</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Kegiatan</th>
              </tr>
            </thead>
             <?php
                foreach ($sql->result() as $row) {
                ?>
                <tbody>                       
                  <tr style="background-color: white;">
                    <th><?php echo $row->tanggal; ?></th>
                    <th><?php echo $row->unit; ?></th>
                    <th><?php echo $row->shift; ?></th>
                    <th><?php echo $row->waktu_awal; ?></th>
                    <th><?php echo $row->waktu_akhir; ?></th>
                    <th><?php echo $row->kegiatan; ?></th>
                  </tr>
                </tbody>
                <?php } ?>
            </tbody>
          </table>
          
          <div class="row">
              <div class="col">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
                
                
              </div>
            </div>
          <h6 style="color: #ffa149;text-shadow: 2px 2px 4px #000000;">&copy; Aplikasi Logbook Report - Dikembangkan oleh IT Non Public Service,  Soekarno-Hatta International Airport</h6>
        </center>
      </div>
       
        <!-- /page content -->



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