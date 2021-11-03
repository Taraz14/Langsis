<style>
    .dataTables_scrollHeadInner,
    .table {
        width: 100% !important;
    }
</style>
<div class="row">

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_guru" id="#modalScroll" style=" float:right">Tambah Guru</button>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover nowrap" width="100%" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Waktu dibuat</th>
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

<!-- Modal -->
<!-- Modal Scrollable -->
<div class="modal fade" id="tambah_guru" tabindex="-1" role="dialog" aria-labelledby="tambah_guru" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_guru">
                    <span><i class="fa fa-users"></i> Registrasi Guru</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formGuru" action="" method="post">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip" aria-describedby="nipHelp" placeholder="Masukkan NIP">
                        <small id="nipHelp" class="form-text text-muted">Guru yang tidak memiliki NIP dapat menggunakan NUPTK</small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                        <small id="namaHelp" class="form-text text-muted">Nama lengkap beserta gelar</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                    Tutup <span><i class="fa fa-times"></i></span>
                </button>
                <a class="btn btn-success text-white" id="save">
                    Simpan <span><i class="fa fa-save"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    var guru;

    function reload_table() {
        guru.ajax.reload(null, false); //reload datatable ajax 
    }

    window.onload = () => {
        $("#telepon").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 13);
        });
        $("#nip").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 18);
        });

        $(document).ready(function() {
            guru = $('#dataTableHover').DataTable({
                "processing": true,
                "serverSide": true,
                "scrollX": true,
                "ajax": "<?= site_url('admin/GuruController/get') ?>",

            }); // ID From dataTable with Hover
        });

        $(function() {
            $('#save').click(function() {
                var data = new FormData($('#formGuru')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('admin/GuruController/create') ?>',
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        // alert(data)
                        console.log(data.status);
                        if (data.status == true) {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Guru berhasil disimpan',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            reload_table();
                        }
                        if (data.status == false) {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'error',
                                // title: 'Harap periksa kembali',
                                title: data.errot,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })

            })
        })

    }

    function hapus(id) {
        Swal.fire({
            title: 'Yakin untuk menghapus?',
            text: "Guru yang dihapus tidak akan dapat mengakses aplikasi LANGSIS",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('admin/GuruController/delete/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terhapus!',
                            '1 Guru telah dihapus.',
                            'success'
                        )
                        reload_table();
                    }
                })
            }
        })
    }
</script>