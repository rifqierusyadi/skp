<script src="<?= base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>

<script>
$(document).on('click', '#getUser', function(e){
		e.preventDefault();
		var uid = $(this).data('id'); // get id of clicked row
		$('#dynamic-content').html(''); // leave this div blank
		$('#modal-loader').show();      // load ajax loader on button click
		$.ajax({
			url: '<?php echo site_url('rencana/uraian/get_uraian'); ?>',
			type: 'POST',
			data: {
				   'id': uid,
				   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			dataType: 'html'
		})
		.done(function(data){
			$('#dynamic-content').html(''); // blank before load.
			$('#dynamic-content').html(data); // load here
			$('#modal-loader').hide(); // hide loader  
			$('#keterangan').wysihtml5();
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
});
</script>