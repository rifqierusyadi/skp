<table id="tableIDX" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>Nilai Tambahan</th>
        <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Tugas Tambahan</b></td>
            <td></td>
        </tr>
        <tr>
            <td>
            <div class="radio">
                <label>
                    <input type="radio" name="tambahan" value="" onclick="$('#nilai_1').html('1'); $('#nilaiHidden_1').val('1')">
                    Tugas tambahan yang dilakukan dalam 1 (satu) tahun sebanyak 1 (satu) sampai 3 (tiga) kegiatan.
                </label>
            </div>
            </td>
            <td><div id="nilai_1">0</div></td>
        </tr>
        <tr>
            <td>
            <div class="radio">
                <label>
                    <input type="radio" name="tambahan" value="" onclick="$('#nilai_1').html('2'); $('#nilaiHidden_1').val('2')">
                    Tugas tambahan yang dilakukan dalam 1 (satu) tahun sebanyak 4 (empat) sampai 6 (enam) kegiatan.
                </label>
            </div>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
            <div class="radio">
                <label>
                    <input type="radio" name="tambahan" value="" onclick="$('#nilai_1').html('3'); $('#nilaiHidden_1').val('3')">
                    Tugas tambahan yang dilakukan dalam 1 (satu) tahun sebanyak 7 (tujuh) kegiatan atau lebih.
                </label>
            </div>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><b>Kreativitas</b></td>
            <td></td>
        </tr>
        <tr>
            <td>
            <div class="radio">
                <label>
                    <input type="radio" name="kreativitas" value="" onclick="$('#kreativitas_1').html('3'); $('#nilaiHidden_2').val('3')">
                    Apablia hasil yang ditemukan sesuatu yang baru dan bermanfaat bagi unit kerjanya dan dibuktikan dengan surat keterangan yang ditandatangani oleh kepala unit kerja setingkat eselon II.                                                    
                </label>
            </div>
            </td>
            <td><div id="kreativitas_1">0</div></td>
        </tr>
        <tr>
            <td>
            <div class="radio">
                <label>
                    <input type="radio" name="kreativitas" value="" onclick="$('#kreativitas_1').html('6'); $('#nilaiHidden_2').val('6')">
                    Apabila hasil yang ditemukan merupakan sesuatu yang baru dan bermanfaat bagi organisasinya serta dibuktikan dengan surat keterangan yang ditandatangani oleh PPK.
                </label>
            </div>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
            <div class="radio">
                <label>
                    <input type="radio" name="kreativitas" value="" onclick="$('#kreativitas_1').html('12'); $('#nilaiHidden_2').val('12')">
                    Apabila hasil yang ditemukan merupakan sesuatu yang baru dan bermanfaat bagi Negara dengan penghargaan yang diberikan oleh Presiden.                                                 
                </label>
            </div>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="box-footer">
    <form id="formID" role="form" action="" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <input type="hidden" name="uraian" value="<?= $uraian; ?>" />
    <input type="hidden" name="detail" value="<?= $detail; ?>" />
    <input type="hidden" name="nilaitambahan" id="nilaiHidden_1" value="0">
    <input type="hidden" name="nilaikreativitas" id="nilaiHidden_2" value="0">
    <button type="button" class="btn btn-sm btn-flat btn-success" onclick="save_tambahan()" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
    <button type="button" class="btn btn-sm btn-flat btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Keluar</button>
    </form>
</div>