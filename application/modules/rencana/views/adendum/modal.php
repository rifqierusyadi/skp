<form id="formID" role="form" action="" method="post">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<input type="hidden" name="uraian_id" value="<?= $record->id; ?>" />
<div class="row">
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('bulan') ? 'has-error' : null; ?>">
            <?php 
            echo form_label('Bulan','bulan');
            $selected = set_value('bulan');
            $bulan = array('1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
            echo form_dropdown('bulan', $bulan, $selected, "class='form-control select2' name='bulan' id='bulan' readonly='readonly'");
            echo form_error('bulan') ? form_error('bulan', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('uraian') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Uraian Tugas','uraian');
            $data = array('class'=>'form-control','name'=>'uraian','id'=>'uraian','type'=>'text','value'=>set_value('uraian', $record->uraian),'readonly'=>'readonly');
            echo form_input($data);
            echo form_error('uraian') ? form_error('uraian', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_kuantitas') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Kuantitas','t_kuantitas');
            $data = array('readonly class'=>'form-control','name'=>'t_kuantitas','id'=>'t_kuantitas','type'=>'text','value'=>set_value('kuantitas', $record->kuantitas));
            echo form_input($data);
            echo form_error('t_kuantitas') ? form_error('t_kuantitas', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('kuantitas') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Adendum Kuantitas','kuantitas');
            $data = array('class'=>'form-control','name'=>'kuantitas','id'=>'kuantitas','type'=>'text','value'=>set_value('kuantitas'));
            echo form_input($data);
            echo form_error('kuantitas') ? form_error('kuantitas', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_satuan') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Satuan','t_satuan');
            $data = array('class'=>'form-control','name'=>'t_satuan','id'=>'t_satuan','type'=>'text','value'=>set_value('t_satuan', $record->satuan), 'readonly'=>'readonly');
            echo form_input($data);
            echo form_error('t_satuan') ? form_error('t_satuan', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('satuan') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Adendum Satuan','satuan');
            $data = array('class'=>'form-control','name'=>'satuan','id'=>'satuan','type'=>'text','value'=>set_value('satuan'));
            echo form_input($data);
            echo form_error('satuan') ? form_error('satuan', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_ak') ? 'has-error' : null; ?>">
            <?php
            echo form_label('AK','t_ak');
            $data = array('readonly class'=>'form-control','name'=>'t_ak','id'=>'t_ak','type'=>'text','value'=>set_value('t_ak', $record->ak));
            echo form_input($data);
            echo form_error('t_ak') ? form_error('t_ak', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('ak') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Adendum AK','ak');
            $data = array('class'=>'form-control','name'=>'ak','id'=>'ak','type'=>'text','value'=>set_value('ak'));
            echo form_input($data);
            echo form_error('ak') ? form_error('ak', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_biaya') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Biaya','t_biaya');
            $data = array('readonly class'=>'form-control','name'=>'t_biaya','id'=>'t_biaya','type'=>'text','value'=>set_value('t_biaya', $record->biaya));
            echo form_input($data);
            echo form_error('t_biaya') ? form_error('t_biaya', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('biaya') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Adendum Biaya','biaya');
            $data = array('class'=>'form-control','name'=>'biaya','id'=>'biaya','type'=>'text','value'=>set_value('biaya', 0));
            echo form_input($data);
            echo form_error('biaya') ? form_error('biaya', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Keterangan','keterangan');
            ?>
            <textarea class='form-control' name='keterangan' id='keterangan'><?php echo set_value('keterangan'); ?></textarea>
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
