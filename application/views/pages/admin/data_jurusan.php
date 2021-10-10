<div class="row">

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Input Jurusan</h6>
            </div>
            <div class="card-body">
                <form id="savejurusan" action="<?= site_url('admin/jurusanController/create') ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jurusan">Nama Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="jurusanHelp" placeholder="Masukkan Nama Jurusan">
                            <small id="jurusanHelp" class="form-text text-muted">Tuliskan nama lengkap jurusan</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="kd_jurusan">Kode Jurusan</label>
                            <input type="text" class="form-control" name="kd_jurusan" id="kd_jurusan" aria-describedby="kd_jurusanHelp" placeholder="Masukkan Kode Jurusan">
                            <small id="kd_jurusanHelp" class="form-text text-muted">Tuliskan nama kode jurusan</small>
                        </div>
                    </div>
                    <a class="btn btn-primary mx-auto text-white" id="save">Submit</a>
                    <!-- <button type="submit" class="btn btn-primary mx-auto text-white" id="save">Submit</button> -->
                </form>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Jurusan Sekolah</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" width="100%" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Kode Jurusan</th>
                            <th>Jurusan</th>
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
    var jurusan;

    function reload_table() {
        jurusan.ajax.reload(null, false); //reload datatable ajax 
    }

    window.onload = () => {
        $(document).ready(function() {
            jurusan = $('#dataTableHover').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?= site_url('admin/jurusanController/get') ?>",

            }); // ID From dataTable with Hover
        });

        $(function() {
            $('#save').click(function() {
                var data = new FormData($('#savejurusan')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('admin/jurusanController/create') ?>',
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
                                title: 'Jurusan telah disimpan',
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
            text: "Jurusan tidak dapat dihapus jika memliki ruangan kelas dan siswa",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('admin/JurusanController/delete/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terhapus!',
                            'Data jurusan telah dihapus.',
                            'success'
                        )
                        reload_table();
                    }
                })
            }
        })
    }
</script>