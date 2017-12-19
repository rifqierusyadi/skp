<div class="row">
	<div class="col-md-12">
		<div id="message"></div>
		<div class="box box-success box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?= isset($head) ? $head : ''; ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<form id="formID" role="form" action="" method="post">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			<!-- box-body -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('periode') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Periode','periode');
							$selected = set_value('periode', $record->periode);
							echo form_dropdown('periode', $periode, $selected, "class='form-control select2' name='periode' id='periode'");
							echo form_error('periode') ? form_error('periode', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('uraian') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Uraian Tugas','uraian');
							$data = array('class'=>'form-control','name'=>'uraian','id'=>'uraian','type'=>'text','value'=>set_value('uraian', $record->uraian));
							echo form_input($data);
							echo form_error('uraian') ? form_error('uraian', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('kuantitas') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Kuantitas','kuantitas');
							$data = array('class'=>'form-control','name'=>'kuantitas','id'=>'kuantitas','type'=>'text','value'=>set_value('kuantitas', $record->kuantitas));
							echo form_input($data);
							echo form_error('kuantitas') ? form_error('kuantitas', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group <?php echo form_error('satuan') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Satuan','satuan');
							$data = array('class'=>'form-control','name'=>'satuan','id'=>'satuan','type'=>'text','value'=>set_value('satuan', $record->satuan));
							echo form_input($data);
							echo form_error('satuan') ? form_error('satuan', '<p class="help-block">','</p>') : '';
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- ./box-body -->
			<div class="box-footer">
				<button type="button" class="btn btn-sm btn-flat btn-success" onclick="save()"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-sm btn-flat btn-info" onclick="saveout();"><i class="fa fa-save"></i> Simpan & Keluar</button>
				<button type="reset" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset</button>
				<button type="button" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</button>
			</div>
			</form>
		</div>
	</div>
</div>