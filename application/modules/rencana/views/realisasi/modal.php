<dl>
<dt>URAIAN KEGIATAN</dt>
<dd><?= $record->uraian ?></dd>
<dt>PERIODE</dt>
<dd><?= bulan($periode->bulan).'-'.$record->periode; ?></dd>
</dl>
<form id="formID" role="form" action="" method="post">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<input type="hidden" name="uraian" value="<?= $uraian; ?>" />
<input type="hidden" name="detail" value="<?= $detail; ?>" />
<div class="row">
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_kuantitas') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Target Jumlah','t_kuantitas');
            $data = array('readonly class'=>'form-control','name'=>'t_kuantitas','id'=>'t_kuantitas','type'=>'text','value'=>set_value('t_kuantitas',$periode->kuantitas));
            echo form_input($data);
            echo form_error('t_kuantitas') ? form_error('t_kuantitas', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('kuantitas') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Jumlah Realisasi','kuantitas');
            $data = array('class'=>'form-control','name'=>'kuantitas','id'=>'kuantitas','type'=>'text','value'=>set_value('kuantitas',0));
            echo form_input($data);
            echo form_error('kuantitas') ? form_error('kuantitas', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_ak') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Target AK','t_ak');
            $data = array('readonly class'=>'form-control','name'=>'t_ak','id'=>'t_ak','type'=>'text','value'=>set_value('t_ak', $periode->ak));
            echo form_input($data);
            echo form_error('t_ak') ? form_error('t_ak', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('ak') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Angka Kredit','ak');
            $data = array('class'=>'form-control','name'=>'ak','id'=>'ak','type'=>'text','value'=>set_value('ak', 0));
            echo form_input($data);
            echo form_error('ak') ? form_error('ak', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo form_error('t_biaya') ? 'has-error' : null; ?>">
            <?php
            echo form_label('Target Biaya','t_biaya');
            $data = array('readonly class'=>'form-control','name'=>'t_biaya','id'=>'t_biaya','type'=>'text','value'=>set_value('t_biaya', $periode->biaya));
            echo form_input($data);
            echo form_error('t_biaya') ? form_error('t_biaya', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <div class="col-md-6">
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
            echo form_label('Nilai Yang Di Usulkan','nilai');
            $data = array('class'=>'form-control','name'=>'nilai','id'=>'nilai','type'=>'text','value'=>set_value('nilai', 0));
            echo form_input($data);
            echo form_error('nilai') ? form_error('nilai', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div>
    <!-- <div class="col-md-12">
        <div class="form-group <?php //echo form_error('keterangan') ? 'has-error' : null; ?>">
            <?php
            //echo form_label('Keterangan','keterangan');
            ?>
            <textarea class='form-control' name='keterangan' id='keterangan'><?php //echo set_value('keterangan'); ?></textarea>
            <?php
            //echo form_error('keterangan') ? form_error('keterangan', '<p class="help-block">','</p>') : '';
            ?>
        </div>
    </div> -->
</div>
<!-- ./box-body -->
<div class="box-footer">
    <button type="button" class="btn btn-sm btn-flat btn-success" onclick="save_modal()" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
    <button type="button" class="btn btn-sm btn-flat btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
</div>
</form>
