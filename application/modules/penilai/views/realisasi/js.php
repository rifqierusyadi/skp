<script src="<?= base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script>
$('#tableIDX').DataTable({
      processing:true,
      paging: true,
      lengthChange: false,
      searching: true,
      ordering: false,
      info: true,
      autoWidth: true,
      language: {
        lengthMenu: "Tampilkan _MENU_ Baris",
        zeroRecords: "Maaf - Data Tidak Ditemukan",
        info: "Lihat Halaman _PAGE_ Dari _PAGES_",
        infoEmpty: "Tidak Ada Data Tersedia",
        infoFiltered: "(filtered from _MAX_ total records)",
        paginate: {
            first:"Awal",
            last:"Akhir",
            next:"Lanjut",
            previous:"Sebelum"
            },
        search:"Pencarian:",
        },
	  responsive: true,
        columnDefs: [
            { 
                targets:[ 0 ],
		    orderable: false,
		    responsivePriority: 1
            },
            { 
                targets:[ -1 ],
                orderable: false,
		    responsivePriority: 2
            },
        ]
});

$(document).on('click', '#getUraian', function(e){
		e.preventDefault();
        var nip = $(this).data('nip'); // get id of clicked row
        var bulan = $(this).data('bulan'); // get id of clicked row
        var periode = $(this).data('periode'); // get id of clicked row
		$('#dynamic-content').html(''); // leave this div blank
		$('#modal-loader').show(); // load ajax loader on button click
		$.ajax({
			url: '<?php echo site_url('penilai/realisasi/get_uraian'); ?>',
			type: 'POST',
			data: {
                   'nip': nip,
                   'bulan': bulan,
                   'periode': periode,
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

function save_modal()
{   
	var key = $("#key").text();
	$.ajax({
        url : "<?= site_url('penilai/realisasi/save_modal'); ?>",
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

// function deleted_detail(id)
// {
//     if(confirm('Anda yakin akan menghapus data ?'))
//     {
// 	  // ajax delete data to database
// 	  	var key = $("#key").text();
// 	  	$.ajax({
//             url : "<?= site_url('penilai/uraian/delete_modal/'); ?>"+id,
//             type: "POST",
//             data: {tokensys:key},
//             dataType: "JSON",
//             success: function(data)
//             {
//                 $('#message').append('<div class="alert alert-danger">' +
//                         '<span class="glyphicon glyphicon-ok"></span>' +
//                         ' Data berhasil di hapus.' +
//                         '</div>');
                        
//                 // tutup pesan
//                 $('.alert-danger').delay(250).show(10, function() {
//                     $(this).delay(1000).hide(10, function() {
//                     $(this).remove();
//                     });
//                 })
//                 $('#detail-modal').modal('hide');
//                 reload_table();
//             },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//                 alert('Error deleting data');
//             }
//         });
 
//     }
// }

$("#filter").on('click', function(){
	var bulan = $("#bulan").val();
	var periode = $("#periode").val();
	
	if(bulan){
		$.ajax({
				type: "POST",
				async: false,
				url : "<?php echo site_url('penilai/realisasi/get_detail')?>",
				data: {
				   'bulan': bulan,
				   'periode': periode,
				   '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
				},
				success: function(msg){
					$('#result').html(msg);
			}
		});
	}else{
		alert('Silahkan Periode Terlebih Dahulu');
	}
});
</script>