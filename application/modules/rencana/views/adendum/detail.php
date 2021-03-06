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
        <th>Ak</th>
        <th>Biaya</th>
        <th width="30px">#</th>
    </tr>
</thead>
<tbody>
<?php if($detail): ?>
<?php foreach($detail as $row): ?>
    <tr>
        <td><?= bulan($row->bulan); ?></td>
        <td><?= $row->kuantitas; ?></td>
        <td><?= $row->satuan; ?></td>
        <td><?= $row->ak; ?></td>
        <td><?= $row->biaya; ?></td>
        <td>
            <?php if(cek_status($row->uraian_id) == 0){ ?>
                <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted_detail(<?= $row->id; ?>)"><i class="glyphicon glyphicon-trash"></i></a>
            <?php }else{ echo '-'; } ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="4">Belum Ada Data</td>
    </tr>
<?php endif; ?>
</tbody>
</table>