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
            <a class="btn btn-sm btn-flat btn-default" href="<?= site_url('penilai/adendum'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
            
						<span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
            <br><br>
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="https://simpeg.kalselprov.go.id/asset/dist/img/avatar5.png" alt="user image">
                <span class="username">
                <a href=""><?= $nama; ?></a>
                </span>
              <span class="description"><?= $nip; ?></span>
						</div>
						<table id="tableIDX" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Kegiatan Tugas Jabatan</th>
									<th>Kuantitas</th>
                  <th>Adendum</th>
									<th>Satuan</th>
                  <th>Adendum</th>
                  <th>AK</th>
                  <th>Adendum</th>
                  <th>Biaya</th>
                  <th>Adendum</th>
									<th>Waktu (Bulan)</th>
									<th>Periode</th>
                  <th>#</th>
								</tr>
							</thead>
							<tbody>
                <?php if($record): ?>
                <?php foreach($record as $row): ?>
                    <tr style="font-weight:bold">
                      <td><?= $row->uraian; ?></td>
                      <td class="text-right"><?= $row->kuantitas; ?></td>
                      <td class="text-right">-</td>
                      <td class="text-center"><?= $row->satuan; ?></td>
                      <td class="text-center">-</td>
                      <td class="text-center"><?= $row->ak; ?></td>
                      <td class="text-center">-</td>
                      <td class="text-center"><?= $row->biaya; ?></td>
                      <td class="text-center">-</td>
                      <td class="text-center"><?= uraian($row->id); ?></td>
                      <td class="text-right"><?= $row->periode; ?></td>
                      <td></td>
                    </tr>
                    <?php $detail = detail_adendum($row->id); ?>
                    <?php if($detail): ?>
                    <?php foreach($detail as $rox): ?>
                    <tr>
                      <td><?= bulan($rox->bulan); ?></td>
                      <td class="text-right"><?= $rox->kuantitas; ?></td>
                      <td class="text-right"><?= $rox->kuantitas; ?></td>
                      <td class="text-center"><?= $row->satuan; ?></td>
                      <td class="text-center"><?= $row->satuan; ?></td>
                      <td class="text-center"><?= $row->ak; ?></td>
                      <td class="text-center"><?= $row->ak; ?></td>
                      <td class="text-center"><?= $row->biaya; ?></td>
                      <td class="text-center"><?= $row->biaya; ?></td>
                      <td class="text-center"><?= '-' ?></td>
                      <td class="text-right"><?= $row->periode; ?></td>
                      <td><a href="<?= site_url('penilai/adendum/approve/'.$row->id) ?>" class="btn btn-xs btn-flat btn-success"><i class="fa fa-check"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?> 
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