<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
		<div class="box-header with-border">
			<i class="fa fa-user"></i>
			<h3 class="box-title">Pejabat Penilai</h3>
		</div>
		<!-- /.box-header -->
		<form id="formID" role="form" action="<?= site_url('profil/atasan/saved'); ?>" method="post">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
		<input type="hidden" name="kode_unker" id="kode_unker" value="<?= $atasan ? $atasan[0]->kode_unker : ''; ?>" />
		<!-- box-body -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('nip') ? 'has-error' : null; ?>">
						<?php
						echo form_label('NIP','nip');
						$data = array('class'=>'form-control typeahead','name'=>'nip','id'=>'nip','type'=>'text','autocomplete'=>'off','value'=>set_value('nip'));
						echo form_input($data);
						echo form_error('nip') ? form_error('nip', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('nama') ? 'has-error' : null; ?>">
						<?php
						echo form_label('Nama Lengkap','nama');
						$data = array('class'=>'form-control','name'=>'nama','id'=>'nama','type'=>'text','value'=>set_value('nama'),'readonly'=>'readonly');
						echo form_input($data);
						echo form_error('nama') ? form_error('nama', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('gol') ? 'has-error' : null; ?>">
						<?php
						echo form_label('Golongan','gol');
						$data = array('class'=>'form-control','name'=>'gol','id'=>'gol','type'=>'text','value'=>set_value('gol'),'readonly'=>'readonly');
						echo form_input($data);
						echo form_error('gol') ? form_error('gol', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('jabatan') ? 'has-error' : null; ?>">
						<?php
						echo form_label('Jabatan','jabatan');
						$data = array('class'=>'form-control','name'=>'jabatan','id'=>'jabatan','type'=>'text','value'=>set_value('jabatan'),'readonly'=>'readonly');
						echo form_input($data);
						echo form_error('jabatan') ? form_error('jabatan', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('satker') ? 'has-error' : null; ?>">
						<?php
						echo form_label('Satuan Kerja','satker');
						$data = array('class'=>'form-control','name'=>'satker','id'=>'satker','type'=>'text','value'=>set_value('satker'),'readonly'=>'readonly');
						echo form_input($data);
						echo form_error('satker') ? form_error('satker', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('unker') ? 'has-error' : null; ?>">
						<?php
						echo form_label('Unit Kerja','unker');
						$data = array('class'=>'form-control','name'=>'unker','id'=>'unker','type'=>'text','value'=>set_value('unker'),'readonly'=>'readonly');
						echo form_input($data);
						echo form_error('unker') ? form_error('unker', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group <?php echo form_error('instansi') ? 'has-error' : null; ?>">
						<?php
						echo form_label('Instansi Kerja','instansi');
						$data = array('class'=>'form-control','name'=>'instansi','id'=>'instansi','type'=>'text','value'=>set_value('instansi'),'readonly'=>'readonly');
						echo form_input($data);
						echo form_error('instansi') ? form_error('instansi', '<p class="help-block">','</p>') : '';
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- ./box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-sm btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
			<button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
			<button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
		</div>
		</form>
		<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>