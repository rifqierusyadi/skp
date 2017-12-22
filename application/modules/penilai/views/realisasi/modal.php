<form id="formID" role="form" action="" method="post">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<div class="user-block">
<img class="img-circle img-bordered-sm" src="https://simpeg.kalselprov.go.id/asset/dist/img/avatar5.png" alt="user image">
<span class="username">
<a href=""><?= $nama; ?></a>
</span>
<span class="description"><?= $nip; ?></span>
</div>
<br>
<table id="tableIDX" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>Kegiatan Tugas Jabatan</th>
        <th>Target<br>Kuantitas</th>
        <th>Realisasi<br>Kuantitas</th>
        <th>Target<br>Biaya</th>
        <th>Realisasi<br>Biaya</th>
        <th>Pengajuan<br>Nilai</th>
        <th>Nilai<br>Atasan</th>
        </tr>
    </thead>
    <tbody>
    <?php if($record): ?>
        <?php foreach($record as $row): ?>
        <tr>
            <td><?= $row->uraian; ?></td>
            <td><?= $row->kuantitas; ?></td>
            <td><?= real_kuantitas($row->uraian_id, $row->id); ?></td>
            <td><?= $row->kuantitas; ?></td>
            <td><?= real_biaya($row->uraian_id, $row->id); ?></td>
            <td><?= real_nilai($row->uraian_id, $row->id); ?></td>
            <td><input type="hidden" name="uraian_id[]" value="<?= $row->uraian_id; ?>" /><input type="hidden" name="detail_id[]" value="<?= $row->id; ?>" /><input type="text" name="hasil[]" value="" /></td>
        </tr>   
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="7">Tidak Ada Data !</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
<!-- ./box-body -->
<div class="box-footer">
    <button type="button" class="btn btn-sm btn-flat btn-success" onclick="save_modal()" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
    <button type="button" class="btn btn-sm btn-flat btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
</div>
</form>
