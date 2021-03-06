<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PEMERINTAH PROVINSI KALIMANTAN SELATAN</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?= base_url('asset/dist/css/print_fullpage.css'); ?>" />
		<style>.select{border:1 solid #000;font-size:14px;margin-left:12px;}</style>
	</head>
<body>
<br>
<?php
echo form_dropdown('periode', $periode, '', "class='select' name='periode' id='periode1'");
?>
<div class="book">
    <div class="page">
	<div class="title">
            <div class="logo"><img src="<?php echo base_url('asset/dist/img/kalsel-114.png'); ?>" width="36px"></div>
            <div class="judul"><h3>FORMULIR SASARAN KERJA PEGAWAI NEGERI SIPIL<br>PEMERINTAH PROVINSI KALIMANTAN SELATAN</h3></div>
    </div>
	<!-- identitas -->
	<div class="pencarian" id="pencarian">
	</div>
	<div class="tabel" id="tabel">
	<table class="print" id="tableID">
		<tr style="font-weight:bold;">
			<td width="3%">NO</td>
			<td colSpan="2">I.PEJABAT PENILAI</td>
			<td width="3%">NO</td>
			<td colSpan="2">II.PNS YANG DINILAI</td>
		</tr>
		<tr>
			<td>1</td>
			<td>Nama</td>
			<td><?= $penilai ? $penilai[0]->nama : '-'; ?></td>
			<td>1</td>
			<td>Nama</td>
			<td><?= $profil ? $profil[0]->nama : '-'; ?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>NIP</td>
			<td><?= $penilai ? $penilai[0]->nip : '-'; ?></td>
			<td>2</td>
			<td>NIP</td>
			<td><?= $profil ? $profil[0]->nip : '-'; ?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Pangkat/Go.Ruang</td>
			<td><?= $penilai ? $penilai[0]->golongan : '-'; ?></td>
			<td>3</td>
			<td>Pangkat/Gol.Ruang</td>
			<td><?= $profil ? $profil[0]->golongan : '-'; ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Jabatan</td>
			<td><?= $penilai ? $penilai[0]->jabatan : '-'; ?></td>
			<td>4</td>
			<td>Jabatan</td>
			<td><?= $profil ? $profil[0]->jabatan : '-'; ?></td>
		</tr>
		<tr>
			<td>5</td>
			<td>Unit Kerja</td>
			<td><?= $penilai ? $penilai[0]->unker : '-'; ?></td>
			<td>5</td>
			<td>Unit Kerja</td>
			<td><?= $profil ? $profil[0]->unker : '-'; ?></td>
		</tr>
	</table>
	<br>
	<div id="hasil">
	<table class="print" id="tableID">
		<thead>
			<tr>
				<th rowSpan="2" width="3%">NO</th>
				<th colSpan="2" rowSpan="2">III.KEGIATAN TUGAS JABATAN</th>
				<th rowSpan="2">AK</th>
				<th colspan="4">TARGET</th>
			</tr>
			<tr>
				<th>OUTPUT</th>
				<th>MUTU</th>
				<th>WAKTU</th>
				<th>BIAYA</th>
			</tr>
		</thead>
		<tbody>
			<?php if($record): ?>
			<?php $i = 1; ?>
			<?php foreach($record as $row): ?>
			<tr>
				<td><?= $i; ?></td>
				<td colSpan="2"><?= $row->uraian; ?></td>
				<td><?= $row->ak; ?></td>
				<td><?= $row->kuantitas .' '.$row->satuan; ?></td>
				<td><?= 100; ?></td>
				<td><?= uraian($row->id).' Bulan'; ?></td>
				<td><?= rupiah($row->biaya); ?></td>
			</tr>
			<?php $detail = detail_uraian($row->id); ?>
                    <?php if($detail): ?>
                    <?php foreach($detail as $rox): ?>
                    <tr>
                      <td></td>
					  <td colSpan="2"><?= bulan($rox->bulan); ?></td>
					  <td class="text-center"><?= $rox->ak; ?></td>
                      <td class="text-right"><?= $rox->kuantitas.' '.$row->satuan; ?></td>
                      <td class="text-center"><?= 100; ?></td>
                      <td class="text-center"><?= '-' ?></td>
                      <td class="text-center"><?= rupiah($rox->biaya); ?></td>
                    </tr>
			<?php endforeach; ?>
			<?php endif; ?> 
			<?php $i++; ?>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	</div>
	<br><br>
	<table width="100%" style="text-align:center;">
		<tr>
		<td width="50%">
		Pejabat Penilai
		<br><br><br><br><br><br>
		<u><?= $penilai ? $penilai[0]->nama : '-'; ?></u><br>
		<?= $penilai ? $penilai[0]->nip : '-'; ?>
		</td>
		<td width="50%">
		Pegawai Yang Dinilai
		<br><br><br><br><br><br>
		<u><?= $profil ? $profil[0]->nama : '-'; ?></u><br>
		<?= $profil ? $profil[0]->nip : '-'; ?>
		</td>
		</tr>
	</table>
	</div>
</div>
</div>
<script src="<?= base_url('asset/plugins/jquery/dist/jquery.min.js'); ?>"></script>
<script>
$("#periode1").change(function(){
 var periode = $("#periode1").val();
	if(periode){
		$.ajax({
				type: "POST",
				async: false,
				url : "<?php echo site_url('rencana/cetak/get_detail')?>",
				data: {
				   'periode': periode,
				   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				},
				success: function(msg){
						$('#hasil').html(msg);
				}
		});
	}
});
</script>
</body>
</html>