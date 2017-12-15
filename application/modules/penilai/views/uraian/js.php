<script src="<?= base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script>
$(document).on('click', '#getUraian', function(e){
		e.preventDefault();
		var uid = $(this).data('id'); // get id of clicked row
		$('#dynamic-content').html(''); // leave this div blank
		$('#modal-loader').show(); // load ajax loader on button click
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
			//save_modal();
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
});

$(document).on('click', '#getDetail', function(e){
		e.preventDefault();
		var uid = $(this).data('id'); // get id of clicked row
		$('#detail-content').html(''); // leave this div blank
		$('#modal-loader').show(); // load ajax loader on button click
		$.ajax({
			url: '<?php echo site_url('rencana/uraian/get_detail'); ?>',
			type: 'POST',
			data: {
				   'id': uid,
				   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
			},
			dataType: 'html'
		})
		.done(function(data){
			$('#detail-content').html(''); // blank before load.
			$('#detail-content').html(data); // load here
			$('#modal-loader').hide(); // hide loader  
			$('#keterangan').wysihtml5();
			//save_modal();
		})
		.fail(function(){
			$('#detail-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
});

function save_modal()
{   
	var key = $("#key").text();
	$.ajax({
        url : "<?= site_url('rencana/uraian/save_modal'); ?>",
        type: "POST",
        data: $('#formID').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.success == true){
			  $('#message').append('<div class="alert alert-success">' +
                    '<span class="glyphicon glyphicon-ok"></span>' +
                    ' Data berhasil disimpan.' +
                    '</div>');
			  
                    $('.form-group').removeClass('has-error')
                                    .removeClass('has-success');
                    $('.text-danger').remove();
                    $('#formID')[0].reset();
                    
                    // tutup pesan
                    $('.alert-success').delay(250).show(10, function() {
                        $(this).delay(1000).hide(10, function() {
                        $(this).remove();
                        });
					})
					$('#uraian-modal').modal('hide');
                    reload_table();
            }else{
                $.each(data.messages, function(key, value) {
                    var element = $('#' + key);
                    element.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                    element.after(value);
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
			alert('Ada kesalahan dalam proses penyimpanan/pembaharuan data.');
			//$('#view-modal').modal('hide');
            //reload_table();
        }
    });
}

function deleted_detail(id)
{
    if(confirm('Anda yakin akan menghapus data ?'))
    {
	  // ajax delete data to database
	  	var key = $("#key").text();
	  	$.ajax({
            url : "<?= site_url('rencana/uraian/delete_modal/'); ?>"+id,
            type: "POST",
            data: {tokensys:key},
            dataType: "JSON",
            success: function(data)
            {
                $('#message').append('<div class="alert alert-danger">' +
                        '<span class="glyphicon glyphicon-ok"></span>' +
                        ' Data berhasil di hapus.' +
                        '</div>');
                        
                // tutup pesan
                $('.alert-danger').delay(250).show(10, function() {
                    $(this).delay(1000).hide(10, function() {
                    $(this).remove();
                    });
                })
                $('#detail-modal').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
</script>