<div class="row">
	<div class="col-md-12">
		<div id="message"></div>
		<div class="box box-success box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?= isset($head) ? $head : ''; ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<!-- box-body -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<a class="btn btn-sm btn-flat btn-success" onclick="add_data();" href="<?= site_url('rencana/uraian/created'); ?>"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
						<button class="btn btn-sm btn-flat btn-danger" onclick="deleted_all();"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
						<button class="btn btn-sm btn-flat btn-default" data-toggle="tooltip" title="Reload Data" data-placement="right" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
						<span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
						<table id="tableID" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th width="5px"><input type="checkbox" id="check-all"></th>
									<th>Kegiatan Tugas Jabatan</th>
									<th>Kuantitas</th>
									<th>Output</th>
									<th>Waktu (Bulan)</th>
									<th width="30px"></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- ./box-body -->
		</div>
	</div>
</div>

<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content">  
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">
           <i class="fa fa-calendar-o"></i> Target Waktu SKP
           </h4> 
        </div> 
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="<?= base_url('asset/ajax-loader.gif'); ?> ">
           </div>             
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content"></div>
        </div> 
                        
        <div class="modal-footer"> 
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>   -->
        </div>         
    </div> 
  </div>
</div>