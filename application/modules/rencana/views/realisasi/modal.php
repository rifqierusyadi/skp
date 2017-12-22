<dl>
<dt>URAIAN KEGIATAN</dt>
<dd><?= $record->uraian ?></dd>
</dl>
<form id="formID" role="form" action="" method="post">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<input type="hidden" name="uraian" value="<?= $uraian; ?>" />
<input type="hidden" name="detail" value="<?= $detail; ?>" />
<div class="row">
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('kuantitas') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Jumlah Realisasi','kuantitas');
            $data = array('class'=>'form-control','name'=>'kuantitas','id'=>'kuantitas','type'=>'text','value'=>set_value('kuantitas',0));
            echo form_input($data);
            echo form_error('kuantitas') ? form_error('kuantitas', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('biaya') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Biaya Realisasi','biaya');
            $data = array('class'=>'form-control','name'=>'biaya','id'=>'biaya','type'=>'text','value'=>set_value('biaya', 0));
            echo form_input($data);
            echo form_error('biaya') ? form_error('biaya', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('nilai') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Nilai Yang Di Ajukan','nilai');
            $data = array('class'=>'form-control','name'=>'nilai','id'=>'nilai','type'=>'text','value'=>set_value('nilai', 0));
            echo form_input($data);
            echo form_error('nilai') ? form_error('nilai', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Keterangan','keterangan');
            ?>
            <textarea class='form-control' name='keterangan' id='keterangan'><?= set_value('keterangan'); ?></textarea>
            <?php
            echo form_error('keterangan') ? form_error('keterangan', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
</div>
<!-- ./box-body -->
<div class="box-footer">
    <button type="button" class="btn btn-sm btn-flat btn-success" onclick="save_modal()" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
    <button type="button" class="btn btn-sm btn-flat btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
</div>
</form>
