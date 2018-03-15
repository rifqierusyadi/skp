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
			<!-- box-body -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
            <a class="btn btn-sm btn-flat btn-default" href="<?= site_url('penilai/prilaku'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
            
						<span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
            <br><br>
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="https://simpeg.kalselprov.go.id/asset/dist/img/avatar5.png" alt="user image">
                <span class="username">
                <a href=""><?= $nama; ?></a>
                </span>
              <span class="description"><?= $nip; ?></span>
						</div>
            <br>
            <form id="formID" role="form" action="<?= site_url('penilai/prilaku/simpan'); ?>" method="post">
		      	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
						<input type="hidden" name="nip" value="<?php echo $nip; ?>" />
						<input type="hidden" name="periode" value="<?php echo $periode; ?>" />
						<div class="col-md-12">
						<div class="form-group <?php echo form_error('pelayanan') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Orientasi Pelayanan','pelayanan');
							$data = array('class'=>'form-control','name'=>'pelayanan','id'=>'pelayanan','type'=>'text','value'=>set_value('pelayanan', $record->pelayanan));
							echo form_input($data);
							echo form_error('pelayanan') ? form_error('pelayanan', '<p class="help-block">','</p>') : '';
							?>
						</div>
					  </div>

            <div class="col-md-12">
						<div class="form-group <?php echo form_error('integritas') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Integritas','integritas');
							$data = array('class'=>'form-control','name'=>'integritas','id'=>'integritas','type'=>'text','value'=>set_value('integritas', $record->integritas));
							echo form_input($data);
							echo form_error('integritas') ? form_error('integritas', '<p class="help-block">','</p>') : '';
							?>
						</div>
					  </div>

            <div class="col-md-12">
						<div class="form-group <?php echo form_error('komitmen') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Komitmen','komitmen');
							$data = array('class'=>'form-control','name'=>'komitmen','id'=>'komitmen','type'=>'text','value'=>set_value('komitmen', $record->komitmen));
							echo form_input($data);
							echo form_error('komitmen') ? form_error('komitmen', '<p class="help-block">','</p>') : '';
							?>
						</div>
					  </div>

            <div class="col-md-12">
						<div class="form-group <?php echo form_error('disiplin') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Disiplin','disiplin');
							$data = array('class'=>'form-control','name'=>'disiplin','id'=>'disiplin','type'=>'text','value'=>set_value('disiplin', $record->disiplin));
							echo form_input($data);
							echo form_error('disiplin') ? form_error('disiplin', '<p class="help-block">','</p>') : '';
							?>
						</div>
					  </div>

            <div class="col-md-12">
						<div class="form-group <?php echo form_error('kerjasama') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Kerjasama','kerjasama');
							$data = array('class'=>'form-control','name'=>'kerjasama','id'=>'kerjasama','type'=>'text','value'=>set_value('kerjasama', $record->kerjasama));
							echo form_input($data);
							echo form_error('kerjasama') ? form_error('kerjasama', '<p class="help-block">','</p>') : '';
							?>
						</div>
					  </div>

            <div class="col-md-12">
						<div class="form-group <?php echo form_error('kepemimpinan') ? 'has-error' : null; ?>">
							<?php
							echo form_label('Kepemimpinan','kepemimpinan');
							$data = array('class'=>'form-control','name'=>'kepemimpinan','id'=>'kepemimpinan','type'=>'text','value'=>set_value('kepemimpinan', $record->kepemimpinan));
							echo form_input($data);
							echo form_error('kepemimpinan') ? form_error('kepemimpinan', '<p class="help-block">','</p>') : '';
							?>
						</div>
					  </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-sm btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
							<a href="<?= site_url('penilai/prilaku'); ?>" class="btn btn-sm btn-flat btn-danger" onclick="back();"><i class="fa fa-close"></i> Keluar</a>
            </div>
            </form>
					</div>
				</div>
			</div>
			<!-- ./box-body -->
		</div>
	</div>
</div>

<div id="uraian-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content">  
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">
           <i class="fa fa-calendar-o"></i> Target Waktu SKP
           </h4> 
        </div> 
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="<?= base_url('asset/ajax-loader.gif'); ?> ">
           </div>             
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content"></div>
        </div>       
    </div> 
  </div>
</div>

<div id="detail-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content">  
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">
           <i class="fa fa-calendar-o"></i> Detail Waktu SKP
           </h4> 
        </div> 
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="<?= base_url('asset/ajax-loader.gif'); ?> ">
           </div>             
           <!-- mysql data will be load here -->                          
           <div id="detail-content"></div>
        </div>       
    </div> 
  </div>
</div>