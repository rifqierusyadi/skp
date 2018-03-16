<script src="<?= base_url('asset/plugins/typehead/bootstrap3-typeahead.min.js'); ?>"></script>
<script>
$(function () {
 $('.select2').select2();
});

var $input = $(".typeahead");
var $unker = $("#kode_unker").val();
$.get('https://simpeg.kalselprov.go.id/api/identitas?unker='+$unker, function(data){
        $input.typeahead({
          source:data,
          afterSelect: function (data) {
            $('#nip').val(data.name);
			$('#nama').val(data.nama);
			$('#gol').val(data.golongan);
			$('#jabatan').val(data.jabatan);
			$('#satker').val(data.satker);
			$('#unker').val(data.unker);
			$('#instansi').val(data.instansi);
           }
        });
        console.log(data);
    },'json');
</script>