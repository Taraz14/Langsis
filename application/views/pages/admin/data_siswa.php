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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_siswa" id="#modalScroll" style=" float:right">Tambah Siswa</button>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover nowrap" width="100%" id="dataTableHover">
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
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->

<!-- Modal -->
<!-- Modal Scrollable -->
<div class="modal fade" id="tambah_siswa" tabindex="-1" role="dialog" aria-labelledby="tambah_siswa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_siswa">
                    <span><i class="fa fa-users"></i> Registrasi Siswa</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formsiswa" action="<?= site_url('admin/siswaController/create') ?>" method="post">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" aria-describedby="nisHelp" placeholder="Masukkan NIS">
                        <small id="nisHelp" class="form-text text-muted">siswa yang belum memiliki NIS dapat menggunakan NISN</small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                        <small id="namaHelp" class="form-text text-muted">Nama lengkap siswa</small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"></textarea>
                        <small id="alamatHelp" class="form-text text-muted">Alamat lengkap domisili</small>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="genderL" name="gender" class="custom-control-input" value="Laki-laki">
                            <label class="custom-control-label" for="genderL">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="genderP" name="gender" class="custom-control-input" value="Perempuan">
                            <label class="custom-control-label" for="genderP">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option hidden>--Pilih Jurusan--</option>
                            <?php foreach ($jurusan as $val) : ?>
                                <option value="<?= $val->jurusan_id ?>"><?= $val->jurusan_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small id="kelasHelp" class="form-text text-muted">Pilihan kelas akan muncul sesuai jurusan yang dipilih</small>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option hidden>--Pilih jurusan dulu--</option>
                        </select>
                        <small id="kelasHelp" class="form-text text-muted">Pilih jurusan terlebih dahulu</small>
                    </div>
                    <div class="form-group">
                        <label for="religion">Agama</label>
                        <select class="form-control" name="religion" id="religion">
                            <option hidden>--Pilih Agama--</option>
                            <?php foreach ($agama as $relig) : ?>
                                <option value="<?= $relig->agama_id ?>"><?= $relig->agama_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <small id="religionHelp" class="form-text text-muted">Pilih jurusan terlebih dahulu</small> -->
                    </div>
                    <div class="form-group">
                        <label for="telepon">No. Telepon</label>
                        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan Nomor Telepon Siswa 0813xxxxxxxxx">
                        <small id="teleponHelp" class="form-text text-muted">Contoh : 0813xxxxxxxxx</small>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mx-auto text-white">Submit</button> -->
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
                "processing": true,
                "serverSide": true,
                // "scrollX": "200 px",
                "ajax": "<?= site_url('admin/siswaController/get') ?>",

            }); // ID From dataTable with Hover
        });

        //Select option kelas berdasarkan jurusan
        $('#jurusan').change(function() {
            var id = $('#jurusan').val();
            $.ajax({
                type: 'post',
                url: '<?= site_url('admin/siswaController/getKelas/') ?>' + id,
                async: true,
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kelas_id + '>' + data[i].kelas_nama + '</option>';
                    }
                    $('#kelas').html(html);
                }
            })
            return false;
        })

        $(function() {
            $('#save').click(function() {
                var data = new FormData($('#formsiswa')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('admin/siswaController/create') ?>',
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
                    url: "<?= site_url('admin/siswaController/delete/') ?>" + id,
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