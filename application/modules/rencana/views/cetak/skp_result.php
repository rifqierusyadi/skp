<?= '<b>Periode Penilaian :'. $tahun.'</b>'; ?>
<br>
<table class="print" id="tableID">
	<thead>
		<tr>
			<th rowSpan="2" width="3%">NO</th>
			<th colSpan="2" rowSpan="2">III.KEGIATAN TUGAS JABATAN</th>
			<th rowSpan="2">AK</th>
			<th colspan="3">TARGET</th>
			<th colspan="3">REALISASI</th>
			<th rowSpan="2">NILAI</th>
		</tr>
		<tr>
			<th>OUTPUT</th>
			<th>MUTU</th>
			<th>BIAYA</th>
			<th>OUTPUT</th>
			<th>MUTU</th>
			<th>BIAYA</th>
		</tr>
	</thead>
	<tbody>
		<?php if($record): ?>
		<?php $i = 1; ?>
		<?php foreach($record as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td colspan="2"><?= $row->uraian; ?></td>
			<td><?= real_ak($row->uraian_id, $row->id) ? real_ak($row->uraian_id, $row->id) : '-'; ?></td>
			<td><?= $row->kuantitas; ?></td>
			<td><?= real_nilai($row->uraian_id, $row->id) ? real_nilai($row->uraian_id, $row->id) : '-'; ?></td>
			<td><?= rupiah($row->biaya); ?></td>
            <td><?= real_kuantitas($row->uraian_id, $row->id) ? real_kuantitas($row->uraian_id, $row->id) : '-' ; ?></td>
			<td><?= real_hasil($row->uraian_id, $row->id) ? real_hasil($row->uraian_id, $row->id) : '-'; ?></td>
			<td><?= real_biaya($row->uraian_id, $row->id) ? real_biaya($row->uraian_id, $row->id) : rupiah(0); ?></td>
            <td>#na</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="10">TOTAL NILAI</th>
			<th></th>
		</tr>
	</tfoot>
</table>
