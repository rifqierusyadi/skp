<table class="print" id="tableID">
	<thead>
		<tr>
			<th rowSpan="2" width="3%">NO</th>
			<th colSpan="2" rowSpan="2">III.KEGIATAN TUGAS JABATAN</th>
			<th rowSpan="2">AK</th>
			<th colspan="4">TARGET</th>
		</tr>
		<tr>
			<th>OUTPUT</th>
			<th>MUTU</th>
			<th>WAKTU</th>
			<th>BIAYA</th>
		</tr>
	</thead>
	<tbody>
		<?php if($record): ?>
		<?php $i = 1; ?>
		<?php foreach($record as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td colSpan="2"><?= $row->uraian; ?></td>
			<td><?= $row->ak; ?></td>
			<td><?= $row->kuantitas .' '.$row->satuan; ?></td>
			<td><?= 100; ?></td>
			<td><?= uraian($row->id).' Bulan'; ?></td>
			<td><?= rupiah($row->biaya); ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
	