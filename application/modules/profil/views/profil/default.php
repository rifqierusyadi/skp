<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
		<div class="box-header with-border">
			<i class="fa fa-user"></i>
			<h3 class="box-title">Pegawai Yang Dinilai</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">
			<dt>NIP</dt>
			<dd><?= $profil ? $profil[0]->nip : '-'; ?></dd>
			<dt>Nama Lengkap</dt>
			<dd><?= $profil ? $profil[0]->nama : '-'; ?></dd>
			<dt>Pangkat. Gol. Ruang</dt>
			<dd><?= $profil ? $profil[0]->golongan : '-'; ?></dd>
			<dt>Jabatan</dt>
			<dd><?= $profil ? $profil[0]->jabatan : '-'; ?></dd>
			<dt>Satuan Kerja</dt>
			<dd><?= $profil ? $profil[0]->satker : '-'; ?></dd>
			<dt>Unit Kerja</dt>
			<dd><?= $profil ? $profil[0]->unker : '-'; ?></dd>
			<dt>Instansi Kerja</dt>
			<dd><?= $profil ? $profil[0]->instansi : '-'; ?></dd>
			</dl>
		</div>
		<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
		<div class="box-header with-border">
			<i class="fa fa-user"></i>
			<h3 class="box-title">Pejabat Penilai</h3>
			<div class="pull-right">
			<a href="<?= site_url('profil/penilai'); ?>" class="btn btn-xs btn-success btn-flat"><i class="fa fa-pencil"></i> Set Data</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">
			<dt>NIP</dt>
			<dd><?= $penilai ? $penilai[0]->nip : '-'; ?></dd>
			<dt>Nama Lengkap</dt>
			<dd><?= $penilai ? $penilai[0]->nama : '-'; ?></dd>
			<dt>Pangkat. Gol. Ruang</dt>
			<dd><?= $penilai ? $penilai[0]->golongan : '-'; ?></dd>
			<dt>Jabatan</dt>
			<dd><?= $penilai ? $penilai[0]->jabatan : '-'; ?></dd>
			<dt>Satuan Kerja</dt>
			<dd><?= $penilai ? $penilai[0]->satker : '-'; ?></dd>
			<dt>Unit Kerja</dt>
			<dd><?= $penilai ? $penilai[0]->unker : '-'; ?></dd>
			<dt>Instansi Kerja</dt>
			<dd><?= $penilai ? $penilai[0]->instansi : '-'; ?></dd>
			</dl>
		</div>
		<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
		<div class="box-header with-border">
			<i class="fa fa-user"></i>
			<h3 class="box-title">Atasan Pejabat Penilai</h3>
			<div class="pull-right">
			<a href="<?= site_url('profil/atasan'); ?>" class="btn btn-xs btn-success btn-flat"><i class="fa fa-pencil"></i> Set Data</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<dl class="dl-horizontal">
			<dt>NIP</dt>
			<dd><?= $atasan ? $atasan[0]->nip : '-'; ?></dd>
			<dt>Nama Lengkap</dt>
			<dd><?= $atasan ? $atasan[0]->nama : '-'; ?></dd>
			<dt>Pangkat. Gol. Ruang</dt>
			<dd><?= $atasan ? $atasan[0]->golongan : '-'; ?></dd>
			<dt>Jabatan</dt>
			<dd><?= $atasan ? $atasan[0]->jabatan : '-'; ?></dd>
			<dt>Satuan Kerja</dt>
			<dd><?= $atasan ? $atasan[0]->satker : '-'; ?></dd>
			<dt>Unit Kerja</dt>
			<dd><?= $atasan ? $atasan[0]->unker : '-'; ?></dd>
			<dt>Instansi Kerja</dt>
			<dd><?= $atasan ? $atasan[0]->instansi : '-'; ?></dd>
			</dl>
		</div>
		<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>