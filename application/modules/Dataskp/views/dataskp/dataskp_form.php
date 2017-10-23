<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: top;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	label{
		display: block;
	}
	
	button{
	margin-top: 10px;	
	display: block;
	}
	
	</style>
</head>
<body>

<div id="container">
	<h1><?= $judul; ?></h1>
	<div><?php echo validation_errors();?> </div>
	<div id="body">
			<form role="form" action="<?= site_url($action); ?>" method="post">
			<div class="form-group <?= form_error('nip') ? 'has-error' : null; ?>">
				<label class="control-label">NIP</label>
				<input name="nip_dinilai" id="nip_dinilai" type="text" value="<?= set_value('nip_dinilai',$record->nip_dinilai); ?>" class="form-control">
				<?php echo form_error('NIP', '<div class="help-block-">','</div>'); ?> 
			<br>
			<div class="form-group <?= form_error('nama_lengkap') ? 'has-error' : null; ?>">
				<label class="control-label">NAMA PNS DINILAI</label>
				
				<input name="nama_lengkap" id="nama_lengkap" type="text" value="<?= set_value('nama_lengkap',$record->nama_lengkap); ?>"class="form-control">
				<?php echo form_error('nama_lengkap','<div class="help-block-">','</div>'); ?>
				
			<div class="form-group <?= form_error('pangkat') ? 'has-error' : null; ?>">
				<label class="control-label">PANGKAT</label>
				<input name="pangkat" id="pangkat" type="text" value="<?= set_value('pangkat',$record->pangkat); ?>"class="form-control">
				<?php echo form_error('pangkat','<div class="help-block-">','</div>'); ?> 
			<br>
			<div class="form-group <?= form_error('golongan_ruang') ? 'has-error' : null; ?>">
				<label class="control-label">GOLONGAN RUANG</label>
				<input name="golongan_ruang" id="golongan_ruang" type="text" value="<?= set_value('golongan_ruang',$record->golongan_ruang); ?>"class="form-control">
				<?php echo form_error('golongan_ruang','<div class="help-block-">','</div>'); ?> 
			<br>
			<div class="form-group <?= form_error('jabatan') ? 'has-error' : null; ?>">
				<label class="control-label">JABATAN</label>
				<input name="jabatan" id="jabatan" type="text" value="<?= set_value('jabatan',$record->jabatan); ?>"class="form-control">
				<?php echo form_error('jabatan','<div class="help-block-">','</div>'); ?>
			<br>
			<div class="form-group <?= form_error('unitkerja') ? 'has-error' : null; ?>">
				<label class="control-label">UNITKERJA</label>
				<input name="unitkerja" id="unitkerja" type="text" value="<?= set_value('unitkerja',$record->unitkerja); ?>"class="form-control">
				<?php echo form_error('unitkerja','<div class="help-block-">','</div>'); ?> 
			<br> 
			
			<button type="submit" class="btn btn-primary default button"><i class="fa fa-save"></i>  SIMPAN</button>
		</form>
	</div>

</div>
</body>
</html>