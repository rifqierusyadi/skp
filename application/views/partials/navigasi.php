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
              <a href= "<?= site_url('userskp');?>">
            <i class="fa fa-user"></i> <span>Profil PNS</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right"></span>
                </span>
          </a>
          </li>
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-list"></i> <span>Rencana SKP</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                  <li><a href="rencana.html"><i class="fa fa-circle-o"></i> Isian Rencana SKP </a></li>
                      <li><a href="konfigurasi.html"><i class="fa fa-circle-o"></i> Isian Pejabat Penilai </a></li>
                      <li><a href="persetujuan.html"><i class="fa fa-circle-o"></i> Persetujuan SKP </a></li>
                      <li><a href="cetak.html"><i class="fa fa-circle-o"></i> Cetak SKP </a></li>
                  <li><a href="cetak.html"><i class="fa fa-circle-o"></i> Daftar PNS Dinilai </a></li>
                  </ul>
          </li>
		
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-file-text"></i> <span>Realisasi SKP</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Isian Realisasi SKP </a></li>
                      <li><a href="profile.html"><i class="fa fa-circle-o"></i> Isian Pejabat Penilai </a></li>
                  <li><a href="konfigurasi.html"><i class="fa fa-circle-o"></i> Cetak SKP </a></li>
                      <li><a href="login.html"><i class="fa fa-circle-o"></i> Daftar PNS Dinilai </a></li>
                  </ul>
          </li>
		
          <li>
                <a href="#">
              <i class="fa fa-balance-scale"> </i><span> Banding </span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                  </span>
                </a>
          </li>
		
          <li class="treeview">
                    <a href="#">
                      <i class="fa fa-folder"></i> <span>Laporan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Rekap PNS </a></li>
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
                      <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Manajemen Pengguna </a></li>
                      <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Manajemen Informasi </a></li>
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

  