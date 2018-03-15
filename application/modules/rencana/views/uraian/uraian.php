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
						<a class="btn btn-sm btn-flat btn-default" href="<?= site_url('rencana/uraian'); ?>"><i class="fa fa-arrow-left"></i> Kembali Ke Uraian Tugas</a>
						<span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
						<table id="tableIDX" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Kegiatan Tugas Jabatan</th>
									<th>Kuantitas</th>
									<th>Output</th>
                  <th>Ak</th>
                  <th>Biaya</th>
									<th>Waktu (Bulan)</th>
									<th>Periode</th>
								</tr>
							</thead>
							<tbody>
                <tr style="font-weight:bold">
                  <td><?= $record->uraian; ?></td>
                  <td class="text-right"><?= $record->kuantitas; ?></td>
                  <td class="text-center"><?= $record->satuan; ?></td>
                  <td class="text-right"><?= $record->ak; ?></td>
                  <td class="text-right"><?= $record->biaya; ?></td>
                  <td class="text-center"><?= uraian($record->id); ?></td>
                  <td class="text-right"><?= $record->periode; ?></td>
                </tr>
                <?php $detail = detail_uraian($record->id); ?>
                <?php if($detail): ?>
                <?php foreach($detail as $row): ?>
                <tr>
                  <td><?= bulan($row->bulan); ?></td>
                  <td class="text-right"><?= $row->kuantitas; ?></td>
                  <td class="text-center"><?= $record->satuan; ?></td>
                  <td class="text-right"><?= $row->ak; ?></td>
                  <td class="text-right"><?= $row->biaya; ?></td>
                  <td class="text-center"><?= '-' ?></td>
                  <td class="text-right"><?= $record->periode; ?></td>
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