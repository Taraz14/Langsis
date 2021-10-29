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
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggaran Siswa</h6>
            </div>
            <div class="table-responsive p-3">
                <table width="60%" class="mb-3">
                    <tr>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm" id="kriteria"><i class="fa fa-plus"></i> Tambah Kriteria Pelanggaran</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm" id="sanksi"><i class="fa fa-plus"></i> Tambah Jenis Pelanggaran</a>
                        </td>
                        <td>
                            <a href="<?= site_url('0/detail-pelanggaran') ?>" class="btn btn-danger btn-sm"><i class="fa fa-gavel"></i> Detail Kriteria dan Jenis Pelanggaran</a>
                        </td>
                    </tr>
                </table>
                <table class="table align-items-center table-flush table-hover" width="100%" id="dataTableHover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Guru Pelapor</th>
                            <th>Tanggal & Wwaktu dibuat</th>
                            <th>Total Poin</th>
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

<!-- Modal Scrollable kriteria -->
<div class="modal fade" id="kriteria-modal" tabindex="-1" role="dialog" aria-labelledby="kriteria-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kriteria-modal">
                    <span><i class="fa fa-th-large"></i> Tambahkan Kriteria</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formKriteria" method="post">
                    <div class="form-group">
                        <label for="kriteria">Kriteria</label>
                        <input type="text" class="form-control" name="kriteria" id="kriteria" aria-describedby="kriteriaHelp" placeholder="Masukkan Kriteria">
                        <small id="kriteriaHelp" class="form-text text-muted">Nama Kriteria</small>
                    </div>
                    <div class="input-group form-group">
                        <!-- <label for="bobot">Bobot</label><br /> -->
                        <input type="text" class="form-control" name="bobot" id="bobot" aria-describedby="bobotHelp" placeholder="Masukkan Bobot">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                        <!-- <small id="bobotHelp" class="form-text text-muted">Bobot max 100%</small> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                    Tutup <span><i class="fa fa-times"></i></span>
                </button>
                <a class="btn btn-success text-white" id="saveBobot">
                    Simpan <span><i class="fa fa-save"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Scrollable sanksi -->
<div class="modal fade" id="sanksi-modal" tabindex="-1" role="dialog" aria-labelledby="sanksi-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sanksi-modal">
                    <span><i class="fa fa-deaf"></i> Tambahkan Jenis Pelanggaran</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPelanggaran" action="<?= site_url('admin/siswaController/create') ?>" method="post">
                    <div class="form-group">
                        <label for="kp">Kriteria Pelanggaran</label>
                        <select class="form-control" name="kp" id="kp">
                            <option value="">--Pilih Kriteria--</option>
                            <?php foreach ($kriteria as $value) : ?>
                                <option value="<?= $value->kriteria_id ?>"><?= $value->kriteria_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small id="kpHelp" class="form-text text-muted">Kriteria pelanggaran mengandung bobot total 100%</small>
                    </div>
                    <div class="form-group">
                        <label for="pelanggaran">Nama Pelanggaran</label>
                        <input type="text" class="form-control" name="pelanggaran" id="pelanggaran" aria-describedby="pelanggaranHelp" placeholder="Masukkan pelanggaran">
                        <small id="pelanggaranHelp" class="form-text text-muted">pelanggaran</small>
                    </div>
                    <div class="form-group">
                        <label for="point">Point</label>
                        <input type="text" class="form-control" name="point" id="point" aria-describedby="pointHelp" placeholder="Masukkan point">
                        <small id="pointHelp" class="form-text text-muted">Point max 100</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                    Tutup <span><i class="fa fa-times"></i></span>
                </button>
                <a class="btn btn-success text-white" id="savePelanggaran">
                    Simpan <span><i class="fa fa-save"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Scrollable Detail Pelanggar -->
<div class="modal fade" id="pelanggar-modal" tabindex="-1" role="dialog" aria-labelledby="pelanggar-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pelanggar-modal">
                    <span><i class="fa fa-deaf"></i> Detail Pelanggar</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPelanggaran" action="<?= site_url('admin/siswaController/create') ?>" method="post">
                    <div class="form-group">
                        <label for="kp">Kriteria Pelanggaran</label>
                        <select class="form-control" name="kp" id="kp">
                            <option value="">--Pilih Kriteria--</option>
                            <?php foreach ($kriteria as $value) : ?>
                                <option value="<?= $value->kriteria_id ?>"><?= $value->kriteria_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small id="kpHelp" class="form-text text-muted">Kriteria pelanggaran mengandung bobot total 100%</small>
                    </div>
                    <div class="form-group">
                        <label for="pelanggaran">Nama Pelanggaran</label>
                        <input type="text" class="form-control" name="pelanggaran" id="pelanggaran" aria-describedby="pelanggaranHelp" placeholder="Masukkan pelanggaran">
                        <small id="pelanggaranHelp" class="form-text text-muted">pelanggaran</small>
                    </div>
                    <div class="form-group">
                        <label for="point">Point</label>
                        <input type="text" class="form-control" name="point" id="point" aria-describedby="pointHelp" placeholder="Masukkan point">
                        <small id="pointHelp" class="form-text text-muted">Point max 100</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                    Tutup <span><i class="fa fa-times"></i></span>
                </button>
                <a class="btn btn-success text-white" id="savePelanggaran">
                    Simpan <span><i class="fa fa-save"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    var pelanggaran;

    function reload_table() {
        pelanggaran.ajax.reload(null, false); //reload datatable ajax 
    }

    window.onload = () => {
        $("#bobot").inputFilter(function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 3);
        });

        // Modal kriteria
        $("#kriteria").click(function() {
            $('#kriteria-modal').modal('show');
        });
        // --Modal

        // Modal kriteria
        $("#sanksi").click(function() {
            $('#sanksi-modal').modal('show');
        });
        // --Modal

        //datatables
        $(document).ready(function() {
            pelanggaran = $('#dataTableHover').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?= site_url('admin/PelanggaranController/get') ?>",

                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
            }); // ID From dataTable with Hover
        });

        $(function() {
            $('#saveBobot').click(function() {
                var data = new FormData($('#formKriteria')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('admin/PelanggaranController/createKriteria') ?>',
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
                                title: 'Kriteria berhasil disimpan',
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

        $(function() {
            $('#savePelanggaran').click(function() {
                var data = new FormData($('#formPelanggaran')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('admin/PelanggaranController/createPelanggaran') ?>',
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
                                title: 'Jenis Pelanggaran berhasil disimpan',
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

    function detail(id) {
        $('#pelanggar-modal').modal('show');
    }

    function hapus(id) {
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
                    url: "<?= site_url('admin/pelanggaranController/delete/') ?>" + id,
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

    function tolak(id) {
        Swal.fire({
            title: 'Tolak Request?',
            // text: "siswa yang dihapus tidak akan dapat mengakses aplikasi LANGSIS",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oke!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('admin/pelanggaranController/tolak/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terkirim!',
                            'Berhasil ditolak.',
                            'success'
                        )
                        reload_table();
                    }
                })
            }
        })
    }
</script>