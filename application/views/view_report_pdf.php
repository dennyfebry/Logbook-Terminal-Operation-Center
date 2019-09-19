<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<table>
	<tr>
		<td><h3>Report TOC Unit,PT ANGKASA PURA II Soekarno-Hatta International Airport</h3></td>
		<td><img style="padding-left:100px;" align="right" width="180px" src="<?=base_url('');?>/assets/img/logoo.png"></td>
	</tr>
</table>
<table>
	<tr>
		<td>Dari Tanggal :</td>
		<td width='20%'><?=$g_dob_from;?></td>
		<td>Data Unit :</td>
		<td width='20%'><?=$g_unid;?></td>
		<td>User Cetak :</td>
		<td width='20%'><?=$this->session->userdata['nama']?></td>
	</tr>
	<tr>
		<td>Ke Tanggal :</td>
		<td width='20%'><?=$g_dob_to;?></td>
		<td>Tanggal Cetak :</td>
		<td width='20%'><?=date('Y-m-d');?></td>
		<td>Jumlah Data :</td>
		<td width='20%'><?=$jml;?></td>
	</tr>
</table>
<hr>
<br>


    <table border="1" class="display table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                          <th width="5%" style="background-color:#1c1382; color:white;">No</th>
                          <th width="10%" style="background-color:#1c1382; color:white;">Tanggal</th>
                          <th width="10%" style="background-color:#1c1382; color:white;">Unit</th>
                          <th width="10%" style="background-color:#1c1382; color:white;">Shift</th>
                          <th width="10%" style="background-color:#1c1382; color:white;">Mulai</th>
                          <th width="10%" style="background-color:#1c1382; color:white;">Selesai</th>
                          <th width="45%" style="background-color:#1c1382; color:white;">Kegiatan</th>
                        </tr>
        </thead>
        <tbody>
        	<?php $no=1;foreach ($isi as $row) { ?>
        		<tr style="background-color: white;">
                          <td><?=$no;?></td>
                          <td><?=$row['tanggal'];?></td>
                          <td><?=$row['unit'];?></td>
                          <td><?=$row['shift'];?></td>
                          <td><?=$row['waktu_awal'];?></td>
                          <td><?=$row['waktu_akhir'];?></td>
                          <td><?=$row['kegiatan'];?></td>
                        </tr>
        	<?php $no++; }?>
        </tbody>
    </table>

<script type="text/javascript">
	$(document).ready(function() {
		
	});
</script>