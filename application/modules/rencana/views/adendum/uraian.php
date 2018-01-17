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
						<a class="btn btn-sm btn-flat btn-default" href="<?= site_url('rencana/adendum'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
						<span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
						<table id="tableIDX" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Kegiatan Tugas Jabatan</th>
									<th>Kuantitas</th>
									<th>Output</th>
									<th>Waktu (Bulan)</th>
									<th>Periode</th>
                  <th>Adendum</th>
								</tr>
							</thead>
							<tbody>
                <tr style="font-weight:bold">
                  <td><?= $record->uraian; ?></td>
                  <td class="text-right"><?= $record->kuantitas; ?></td>
                  <td class="text-center"><?= $record->satuan; ?></td>
                  <td class="text-center"><?= uraian($record->id); ?></td>
                  <td class="text-right"><?= $record->periode; ?></td>
                  <td class="text-right"></td>
                </tr>
                <?php $detail = detail_uraian($record->id); ?>
                <?php if($detail): ?>
                <?php foreach($detail as $row): ?>
                <tr>
                  <td><?= bulan($row->bulan); ?></td>
                  <td class="text-right"><?= $row->kuantitas; ?></td>
                  <td class="text-center"><?= $record->satuan; ?></td>
                  <td><?= '' ?></td>
                  <td class="text-right"><?= $record->periode; ?></td>
                  <td class="text-center"><a href="<?php echo site_url('adendum/request/'.$row->id); ?>" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-edit"></i> Adendum</a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
							</tbody>
						</table>
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