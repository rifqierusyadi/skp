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
						<table id="tableIDX" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
                <th>Kegiatan Tugas Jabatan</th>
                <th>Kuantitas</th>
                <th>Adendum</th>
                <th>Satuan</th>
                <th>Adendum</th>
                <th>Ak</th>
                <th>Adendum</th>
                <th>Biaya</th>
                <th>Adendum</th>
                <th>Waktu (Bulan)</th>
                <th>Periode</th>
                <th>Status</th>
                <th></th>
								</tr>
							</thead>
							<tbody>
                <tr style="font-weight:bold">
                  <td><?= $record->uraian; ?></td>
                  <td class="text-right"><?= $record->kuantitas; ?></td>
                  <td class="text-right"><?= ''; ?></td>
                  <td class="text-center"><?= $record->satuan; ?></td>
                  <td class="text-right"><?= ''; ?></td>
                  <td class="text-right"><?= $record->ak; ?></td>
                  <td class="text-right"><?= ''; ?></td>
                  <td class="text-right"><?= $record->biaya; ?></td>
                  <td class="text-right"><?= ''; ?></td>
                  <td class="text-center"><?= uraian($record->id); ?></td>
                  <td class="text-center"><?= $record->periode; ?></td>
                  <td class="text-center">#</td>
                  <td class="text-center">#</td>
                </tr>
                <?php $detail = detail_uraian($record->id); ?>
                <?php if($detail): ?>
                <?php foreach($detail as $row): ?>
                <tr>
                  <td><?= bulan($row->bulan); ?></td>
                  <td class="text-right"><?= $row->kuantitas; ?></td>
                  <td class="text-right"><?= adendum($record->id, $row->bulan) != '' ? adendum($record->id, $row->bulan)->kuantitas : '-'; ?></td>
                  <td class="text-center"><?= $record->satuan; ?></td>
                  <td class="text-right"><?= adendum($record->id, $row->bulan) != '' ? adendum($record->id, $row->bulan)->satuan : '-'; ?></td>
                  <td class="text-right"><?= $row->ak; ?></td>
                  <td class="text-right"><?= adendum($record->id, $row->bulan) != '' ? adendum($record->id, $row->bulan)->ak : '-'; ?></td>
                  <td class="text-right"><?= rupiah($row->biaya); ?></td>
                  <td class="text-right"><?= adendum($record->id, $row->bulan) != '' ? adendum($record->id, $row->bulan)->biaya : '-'; ?></td>
                  <td class="text-center"><?= '-' ?></td>
                  <td class="text-center"><?= $record->periode; ?></td>
                  <td><?= adendum_status($record->id, $row->bulan) ? 'SETUJU' : '-'; ?></td>
                  <td class="text-center">
                  <?php 
                  $hasil = real_hasil($record->id, $row->id);
                  if($hasil){
                    echo '<a class="btn btn-xs btn-flat btn-default" title="Detail" href="#"><i class="fa fa-check"></i></a> ';
                  }else{
                    echo '<a class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#uraian-modal" data-id="'.$record->id.'" data-bulan="'.$row->bulan.'" id="getUraian" title="Uraian"><i class="glyphicon glyphicon-plus"></i></a> ';
                  }
                   
                  ?>
                  </td>
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
           <i class="fa fa-calendar-o"></i> Pengajuan Adendum Uraian Tugas
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