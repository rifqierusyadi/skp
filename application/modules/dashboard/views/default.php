<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Data Pegawai</span>
        <span class="info-box-number"><a href="<?= site_url('profil');?>">Lihat Data</a></span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-green"><i class="fa fa-calendar-o"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Rencana SKP</span>
        <span class="info-box-number"><a href="<?= site_url('rencana');?>">Buat Rencana</a></span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-check-o"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Realisasi SKP</span>
        <span class="info-box-number"><a href="<?= site_url('realisasi');?>">Realisasi SKP</a></span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
    <span class="info-box-icon bg-red"><i class="fa fa-gears"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">Pengaturan</span>
        <span class="info-box-number"><a href="">Pengaturan</a></span>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
</div>

<div class="row">
<div class="col-md-12">
<ul class="timeline">

<!-- timeline time label -->
<li class="time-label">
    <span class="bg-red">
        01 November 2017
    </span>
</li>
<li>
    <i class="fa fa-envelope bg-blue"></i>
    <div class="timeline-item">
        <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->
        <h3 class="timeline-header"><a href="#">Developer Team</a></h3>
        <div class="timeline-body">
            <p>Selamat Datang Di SKP Online Pemerintah Provinsi Kalimantan Selatan.</p>
        </div>
    </div>
</li>
<?php if($record): ?>
<?php foreach($record as $row): ?>
<li class="time-label">
    <span class="bg-red">
        <?= ddMMMyyyy($row->tanggal); ?>
    </span>
</li>
<li>
    <i class="fa fa-envelope bg-blue"></i>
    <div class="timeline-item">
        <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->
        <h3 class="timeline-header"><a href="#"><?= $row->judul; ?></a></h3>
        <div class="timeline-body">
            <?= $row->informasi; ?>
        </div>
    </div>
</li>
<?php endforeach; ?>
<?php endif; ?>
<li>
    <i class="fa fa-clock-o bg-gray"></i>
</li>
</ul>
</div>
</div>