<div class="panel panel-default">
	<div class="panel-heading">
		<?= $judul; ?>
	</div>
	<!-- /.panel-heading -->
	<div class="panel-body">
	<div class="table-responsive">
		<?php if($record): ?>
			<a href="<?= site_url('userskp/created'); ?>" class="btn btn-success"> <i class="fa fa-plus"> </i> Buat Data Baru</a>
			<p></p>
		<table class="table table-bordered table-striped" id="data">
			<thead>
				<tr>
				<th>NO</th>	
				<th>NIP</th>
				<th>PASSWORD</th>
				<th>EMAIL</th>
				<th>NAMA LENGKAP</th>
				<th>PANGKAT</th>
				<th>GOLONGAN RUANG</th>
				<th>JABATAN</th>
				<th>UNIT KERJA</th>
				<th>KETERANGAN</th>
				<th>ACTIVE</th>
				<th>CREATED DATE</th>
				<th>CREATED ID</th>
				<th>UPDATED AT</th>
				<th>UPDATED ID</th>
				<th>DELETED AT</th>
				<th>DELETED ID</th>
				<th>ACTION</th>			
				</tr>
			</thead>
		<tbody>
			<?php $no=1;?>
			<?php foreach($record as $row): ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $row->nip; ?></td>
				<td><?= $row->password; ?></td>
				<td><?= $row->email; ?></td>
				<td><?= $row->nama_lengkap; ?></td>
				<td><?= $row->pangkat; ?></td>
				<td><?= $row->golongan_ruang; ?></td>
				<td><?= $row->jabatan; ?></td>
				<td><?= $row->unitkerja; ?></td>
				<td><?= $row->keterangan; ?></td>
				<td><?= $row->active; ?></td>
				<td><?= $row->created_date; ?></td>
				<td><?= $row->created_id; ?></td>
				<td><?= $row->updated_at; ?></td>
				<td><?= $row->updated_id; ?></td>
				<td><?= $row->deleted_at; ?></td>
				<td><?= $row->deleted_id; ?></td>
				<td><a href="<?= site_url('userskp/updated/'.$row->ID); ?>" class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></a>  <a href="<?= site_url('userskp/deleted/'.$row->ID); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash"> </a></td>
			</tr>

		</tbody>
		</table>
		 </div>
		 </div>
</div>
