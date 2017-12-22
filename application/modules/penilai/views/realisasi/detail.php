<table id="tableIDX" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th width="5px"><input type="checkbox" id="check-all"></th>
        <th>NIP</th>
        <th>Nama Lengkap</th>
        <th>Jabatan</th>
        <th>Unit Kerja</th>
        <th>Bulan</th>
        <th>Periode</th>
        <th>Status</th>
        <th width="80px"></th>
        </tr>
    </thead>
    <tbody>
    <?php if($record): ?>
        <?php foreach($record as $row): ?>
        <tr>
            <td></td>
            <td><?= $row->nip; ?></td>
            <td><?= get_profil($row->nip)->nama; ?></td>
            <td><?= get_profil($row->nip)->jabatan; ?></td>
            <td><?= get_profil($row->nip)->unker; ?></td>
            <td><?= bulan($row->bulan); ?></td>
            <td><?= $row->periode; ?></td>
            <td>
            <?php 
            $status = status_nilai($row->nip, $row->id, $row->uraian_id); 
            if($status){
               echo '<a class="btn btn-xs btn-default btn-flat" href="">Proses</a>';
            }else{
               echo '<a class="btn btn-xs btn-default btn-flat" href="">Belum Proses</a>';
            }
            ?>
            </td>
            <td>
            <a class="btn btn-xs btn-primary btn-flat" data-toggle="modal" data-target="#uraian-modal" data-nip="<?= $row->nip; ?>" data-bulan="<?= $row->bulan; ?>" data-periode="<?= $row->periode; ?>" id="getUraian" ><i class="fa fa-check-square"></i> Penilaian</button>
            </td>
        </tr>   
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="7">Tidak Ada Data !</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>