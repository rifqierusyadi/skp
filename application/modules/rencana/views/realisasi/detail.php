<table id="tableIDX" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>Kegiatan Tugas Jabatan</th>
        <th>Target<br>Kuantitas</th>
        <th>Realisasi<br>Kuantitas</th>
        <th>Target<br>Ak</th>
        <th>Realisasi<br>Ak</th>
        <th>Target<br>Biaya</th>
        <th>Realisasi<br>Biaya</th>
        <th>Pengajuan<br>Nilai</th>
        <th>Nilai<br>Atasan</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($record): ?>
        <?php foreach($record as $row): ?>
        <tr>
            <td><?= $row->uraian; ?></td>
            <td><?= $row->kuantitas; ?></td>
            <td><?= real_kuantitas($row->uraian_id, $row->id) ? real_kuantitas($row->uraian_id, $row->id) : '-' ; ?></td>
            <td><?= $row->ak; ?></td>
            <td><?= real_ak($row->uraian_id, $row->id) ? real_ak($row->uraian_id, $row->id) : '-'; ?></td>
            <td><?= rupiah($row->biaya); ?></td>
            <td><?= real_biaya($row->uraian_id, $row->id) ? real_biaya($row->uraian_id, $row->id) : rupiah(0); ?></td>
            <td><?= real_nilai($row->uraian_id, $row->id) ? real_nilai($row->uraian_id, $row->id) : '-'; ?></td>
            <td><?= real_hasil($row->uraian_id, $row->id) ? real_hasil($row->uraian_id, $row->id) : '-'; ?></td>
            <td>
            <?php if(!status_nilai($nip, $row->id, $row->uraian_id)): ?>
            <button class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#uraian-modal" data-uraian="<?= $row->uraian_id; ?>" data-detail="<?= $row->id; ?>" id="getUraian"><i class="fa fa-plus"></i> </button>
            <?php endif; ?>
            <button class="btn btn-xs btn-default btn-flat" data-uraian="<?= $row->uraian_id; ?>" data-detail="<?= $row->id; ?>" id="getReset"><i class="fa fa-refresh"></i> </button>
            </td>
        </tr>   
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="10">Tidak Ada Data !</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>