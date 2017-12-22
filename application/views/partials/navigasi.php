<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('asset/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

		<ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <li>
              <a href= "<?= site_url('dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                </span>
              </a>
          </li>

          <li>
              <a href= "<?= site_url('profil');?>">
            <i class="fa fa-user"></i> <span>Data Pegawai</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right"></span>
                </span>
          </a>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-list"></i> <span>SKP & Prilaku Kerja</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?= site_url('rencana/uraian'); ?>"><i class="fa fa-circle-o"></i> Rencana SKP </a></li>
                      <li><a href="<?= site_url('rencana/realisasi'); ?>"><i class="fa fa-circle-o"></i> Pengajuan Realisasi </a></li>
                      <li><a href="<?= site_url('rencana/adendum'); ?>"><i class="fa fa-circle-o"></i> Adendum </a></li>
                      <li><a href="<?= site_url('rencana/nilai'); ?>"><i class="fa fa-circle-o"></i> Nilai Prestasi Kerja </a></li>
                  </ul>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-check-square-o"></i> <span>Penilaian Staf</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?= site_url('penilai/uraian'); ?>"><i class="fa fa-circle-o"></i> Persetujuan Rencana </a></li>
                      <li><a href="<?= site_url('penilai/realisasi'); ?>"><i class="fa fa-circle-o"></i> Pengajuan Realisasi </a></li>
                      <li><a href="<?= site_url('penilai/adendum'); ?>"><i class="fa fa-circle-o"></i> Adendum </a></li>
                      <li><a href="<?= site_url('penilai/prilaku'); ?>"><i class="fa fa-circle-o"></i> Nilai Prestasi Kerja </a></li>
                  </ul>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span>Laporan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href=""><i class="fa fa-circle-o"></i> Nilai Prestasi Kerja </a></li>
                  </ul>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-book"></i> <span>Master</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?= site_url('referensi/instansi'); ?>"><i class="fa fa-circle-o"></i> Referensi Instansi </a></li>
                      <li><a href="<?= site_url('referensi/unker'); ?>"><i class="fa fa-circle-o"></i> Referensi Unit Kerja </a></li>
                      <li><a href="<?= site_url('referensi/satker'); ?>"><i class="fa fa-circle-o"></i> Referensi Satuan Kerja </a></li>
                  </ul>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-gears"></i> <span>Pengaturan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#"><i class="fa fa-circle-o"></i> Manajemen Pengguna </a></li>
                      <li><a href="<?= site_url('setting/informasi'); ?>"><i class="fa fa-circle-o"></i> Manajemen Informasi </a></li>
                  </ul>
          </li>
          <li>
              <a href= "<?= site_url('logout');?>">
                <i class="fa fa-sign-out"></i> <span>Keluar</span>
                <span class="pull-right-container">
                </span>
              </a>
          </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>