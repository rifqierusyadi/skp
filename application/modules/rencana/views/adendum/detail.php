<dl>
<dt>URAIAN KEGIATAN</dt>
<dd><?= $record->uraian ?></dd>
</dl>
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>Bulan</th>
        <th>Kuantitas</th>
        <th>Output</th>
        <th width="30px"></th>
    </tr>
</thead>
<tbody>
<?php if($detail): ?>
<?php foreach($detail as $row): ?>
    <tr>
        <td><?= bulan($row->bulan); ?></td>
        <td><?= $row->kuantitas; ?></td>
        <td><?= $row->satuan; ?></td>
        <td><a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted_detail(<?= $row->id; ?>)"><i class="fa fa-edit"></i></a></td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="4">Belum Ada Data</td>
    </tr>
<?php endif; ?>
</tbody>
</table>