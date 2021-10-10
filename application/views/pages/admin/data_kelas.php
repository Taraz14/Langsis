<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Input Kelas</h6>
            </div>
            <div class="card-body">
                <form id="savekelas" action="<?= site_url('admin/kelasController/create') ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option hidden>--Pilih Jurusan--</option>
                                <?php foreach ($jurusan as $val) : ?>
                                    <option value="<?= $val->jurusan_id . '|' . $val->jurusan_kode ?>"><?= $val->jurusan_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="jurusanHelp" class="form-text text-muted">Pilih jurusan</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kd_jurusan">Kelas</label>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="tingkat" id="tingkat" aria-describedby="kelasHelp" placeholder="XI">
                                </div>
                                <!-- <span>TKJ</span> -->
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="classcode" id="classcode" aria-describedby="kelasHelp" value="" placeholder="-" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="classnn" id="classnn" aria-describedby="kelasHelp" placeholder="1">
                                </div>
                            </div>
                            <!-- <small id="kelasHelp" class="form-text text-muted">Tulis kelas</small> -->
                        </div>
                    </div>
                    <a class="btn btn-primary mx-auto text-white" id="save">Submit</a>
                    <!-- <button type="submit" class="btn btn-primary mx-auto text-white" id="save">Submit</button> -->
                </form>
            </div>
        </div>
    </div>
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Ruangan Kelas</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" width="100%" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Kelas</th>
                            <th>Tanggal dibuat</th>
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
    var kelas;

    function reload_table() {
        kelas.ajax.reload(null, false); //reload datatable ajax 
    }

    window.onload = () => {
        $(document).ready(function() {
            kelas = $('#dataTableHover').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?= site_url('admin/kelasController/get') ?>",

            }); // ID From dataTable with Hover
        });

        var jurusan = $('#jurusan');
        var classcode = $('#classcode');
        var classnn = $('#classnn');

        $(jurusan).change(function() {
            var js = $(this).children("option:selected").val();
            // alert("You have selected the Jurusan - " + js);
            var result = $(jurusan).val().split('|');
            $(classcode).val(result[1]);
        });

        $(function() {
            $('#save').click(function() {
                var data = new FormData($('#savekelas')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('admin/kelasController/create') ?>',
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
                                title: 'Kelas telah disimpan',
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
            text: "Kelas tidak dapat dihapus jika memliki siswa",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('admin/KelasController/delete/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terhapus!',
                            'Data kelas telah dihapus.',
                            'success'
                        )
                        reload_table();
                    }
                })
            }
        })
    }
</script>