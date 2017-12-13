<script>
var table;
$(function () {
table = $('#tableIDX').DataTable({
    ajax: "http://localhost/pegawai/api/satker",
    columns: [
        { "data": "kode_satker" },
        { "data": "satker" },
        { "data": "kode_unker" }
    ],
    paging: true,
    lengthChange: false,
    searching: true,
    ordering: true,
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
    }
});
});
</script>