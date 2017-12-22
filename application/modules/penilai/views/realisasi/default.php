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
         <div class="row text-muted well well-sm no-shadow panel" style="margin-left:1px; margin-right:1px;padding-bottom:25px;">
					<div class="col-md-5">
						<?php
						echo form_label('Bulan');
						echo form_dropdown('bulan', $bulan, '', "class='form-control select2' name='bulan' id='bulan'");
						?>
					</div>
					<div class="col-md-5">
						<?php
						echo form_label('Periode');
						echo form_dropdown('periode', $periode, '', "class='form-control select2' name='periode' id='periode'");
						?>
					</div>
					<div class="col-md-2">
						<?php
							echo form_label('&nbsp;');
							$data = array(
								'name'          => 'filter',
								'id'            => 'filter',
								'type'          => 'button',
								'content'       => '<i class="fa fa-search"></i> Filter',
								'class'			=> 'form-control'
							);
							echo form_button($data);
						?>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<span id="key" style="display: none;"><?= $this->security->get_csrf_hash(); ?></span>
						<div id="result">
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
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			<!-- ./box-body -->
		</div>
	</div>
</div>

<div id="uraian-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg"> 
     <div class="modal-content">  
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">
           <i class="fa fa-calendar-o"></i> Penilaian Realisasi Uraian Tugas
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
    </div> 
  </div>
</div>