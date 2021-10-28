<style>
    .dataTables_scrollHeadInner,
    .table {
        width: 100% !important;
    }

    a {
        cursor: pointer;
    }
</style>
<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggaran Siswa</h6>
                <!-- <a href="#" class="m-0 btn btn-primary btn-sm">Laporkan Siswa</a> -->
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover wrap" width="100%" id="dataTableHover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Kelas</th>
                            <th>Kriteria</th>
                            <th>Tanggal dibuat</th>
                            <th>Waktu dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->

<script>
    var pelanggaran;

    function reload_table() {
        siswa.ajax.reload(null, false); //reload datatable ajax 
    }

    window.onload = () => {
        //datatables
        $(document).ready(function() {
            pelanggaran = $('#dataTableHover').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                info: false,
                // searching: false,
                responsive: true,
                processing: true,
                serverSide: true,
                // serverMethod: "post",
                ajax: {
                    url: "<?= site_url('guru/pelanggaran/get') ?>",
                    // data: function(data) {
                    //     var kelas = $('#searchkelas').val();
                    //     data.searchKelas = kelas;
                    //     // console.log(data.searchKelas);
                    // }
                },

                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
            }); // ID From dataTable with Hover
        });
    }

    function reqhapus(id) {
        Swal.fire({
            title: 'Yakin untuk membatalkan laporan?',
            // text: "siswa yang dihapus tidak akan dapat mengakses aplikasi LANGSIS",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oke!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('guru/pelanggaran/delete_req/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terkirim!',
                            'Menunggu admin untuk melakukan penghapusan.',
                            'success'
                        )
                        reload_table();
                    }
                })
            }
        })
    }
</script>