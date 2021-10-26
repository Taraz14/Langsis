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
                <h6 class="m-0 font-weight-bold text-primary">Data siswa</h6>
            </div>
            <div class="table-responsive p-3">
                <table width="50%">
                    <tr>
                        <!-- <td width="30%">
                            <select class="form-control form-control-sm mb-3" id="searchjurusan">
                                <option hidden>Jurusan</option>
                                <?php foreach ($jurusan as $val) : ?>
                                    <option value="<?= $val->jurusan_id ?>"><?= $val->jurusan_kode ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td> -->
                        <td width="20%">
                            <!-- <label for="kelas">Kelas</label> -->
                            <select class="form-control form-control-sm mb-3" id="searchkelas">
                                <option value="" hidden>Kelas</option>
                                <?php foreach ($kelas as $val) : ?>
                                    <option value="<?= $val->kelas_id ?>"><?= $val->kelas_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>

                <table class="table align-items-center table-flush table-hover display nowrap" width="100%" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Tanggal dibuat</th>
                            <th>Waktu dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Tanggal dibuat</th>
                            <th>Waktu dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->
<!-- Modal Scrollable -->
<div class="modal fade" id="laporkan" tabindex="-1" role="dialog" aria-labelledby="laporkan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="laporkan">
                    <span><i class="fa fa-gavel"></i> Laporkan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formGuru" action="" method="post">
                    <div class="form-group">
                        <label for="kp">Kriteria Pelanggaran</label>
                        <select class="form-control" name="kp" id="kp">
                            <option value="">--Pilih Kriteria--</option>
                        </select>
                        <small id="kpHelp" class="form-text text-muted">Kriteria pelanggaran mengandung bobot total 100%</small>
                    </div>
                    <div class="form-group">
                        <label for="ktpel">kategori Pelanggaran</label>
                        <select class="form-control" name="ktpel" id="ktpel">
                            <option value="">--Pilih Kategori--</option>
                        </select>
                        <small id="ktpelHelp" class="form-text text-muted">Kategori pelanggaran memiliki nilai masing-masing</small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Pelanggaran</label>
                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                        <small id="deskripsiHelp" class="form-text text-muted">Deskripsi Pelanggaran</small>
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
    var siswa;

    function reload_table() {
        siswa.ajax.reload(null, false); //reload datatable ajax 
    }

    window.onload = () => {
        $("#telepon").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 13);
        });
        $("#nis").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 11);
        });

        //datatables
        $(document).ready(function() {
            siswa = $('#dataTableHover').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                info: false,
                // searching: false,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: "post",
                ajax: {
                    url: "<?= site_url('guru/siswaController/get') ?>",
                    data: function(data) {
                        var kelas = $('#searchkelas').val();
                        data.searchKelas = kelas;
                        // console.log(data.searchKelas);
                    }
                },
                columns: [{
                        data: "siswa_id"
                    },
                    {
                        data: "siswa_nis"
                    },
                    {
                        data: "siswa_nama"
                    },
                    {
                        data: "created_at"
                    },
                    {
                        data: "updated_at"
                    },
                    {
                        data: "aksi"
                    }
                ],

            });

            $("#searchkelas").change(function() {
                siswa.draw();
            });
        });



        $(function() {
            $('#save').click(function() {
                var data = new FormData($('#formsiswa')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('guru/siswaController/create') ?>',
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
                                title: 'siswa berhasil disimpan',
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
            // text: "siswa yang dihapus tidak akan dapat mengakses aplikasi LANGSIS",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('guru/siswaController/delete/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terhapus!',
                            '1 siswa telah dihapus.',
                            'success'
                        )
                        reload_table();
                    }
                })
            }
        })
    }

    function edit(id) {
        alert(id + ' Working in Progress');
    }
</script>