<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SKP ONLINE | Pemerintah Provinsi Kalimantan Selatan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/bootstrap/dist/css/bootstrap.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/font-awesome/css/font-awesome.min.css');?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/plugins/Ionicons/css/ionicons.min.css'); ?>" >
	<link rel="stylesheet" href= "<?= base_url('asset/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/dist/css/AdminLTE.min.css'); ?>" >
  <link rel="stylesheet" href= "<?= base_url('asset/dist/css/skins/_all-skins.min.css'); ?>" >
  <link rel="stylesheet" href="<?= base_url('asset/plugins/select2/dist/css/select2.min.css'); ?>" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <?= isset($style) ? $this->load->view($style) : ''; ?>
  <style>.has-error .select2-selection {border: 1px solid #a94442;border-radius: 0px;}.typeahead { z-index: 1051; }</style>
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php $this->load->view("partials/header"); ?>
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <?php $this->load->view("partials/navigasi"); ?>
 <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SKP ONLINE KALSEL
        <small>Beta 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <?php $this->load->view($content); ?>
      <!-- Page Content -->
      <!-- /#page-wrapper -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> Beta 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Badan Kepegawaian Daerah Provinsi Kalimantan Selatan</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?= base_url('asset/plugins/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('asset/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"> </script>
<script src="<?= base_url('asset/plugins/fastclick/lib/fastclick.js'); ?>"></script>
<script src="<?= base_url('asset/dist/js/adminlte.min.js'); ?>"> </script>
<script src="<?= base_url('asset/plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('asset/app.js'); ?>"> </script>
<?= isset($js) ? $this->load->view($js) : ''; ?>
</body>
</html>