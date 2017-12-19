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
            echo form_dropdown('bulan', $bulan, $selected, "class='form-control select2' name='bulan' id='bulan'");
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
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('output') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Jumlah Output','output');
            $data = array('class'=>'form-control','name'=>'output','id'=>'output','type'=>'text','value'=>set_value('output'));
            echo form_input($data);
            echo form_error('output') ? form_error('output', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('satuan') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Satuan','satuan');
            $data = array('class'=>'form-control','name'=>'satuan','id'=>'satuan','type'=>'text','value'=>set_value('satuan', $record->satuan), 'readonly'=>'readonly');
            echo form_input($data);
            echo form_error('satuan') ? form_error('satuan', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('ak') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Angka Kredit','ak');
            $data = array('class'=>'form-control','name'=>'ak','id'=>'ak','type'=>'text','value'=>set_value('ak'));
            echo form_input($data);
            echo form_error('ak') ? form_error('ak', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group <?php echo form_error('biaya') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Biaya','biaya');
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
