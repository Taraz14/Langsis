<div class="row">
    <!-- DataTable with Hover -->
    <?php
    foreach ($kriteria as $index => $value) {
    ?>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger"><?= $value->kriteria_nama ?> | <small>Bobot <?= $value->bobot_kriteria ?>%</small></h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" width="100%" id="dataTableHover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Pelanggaran</th>
                                <th>Point</th>
                                <th>Tanggal dibuat</th>
                                <th>Waktu dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($jp as $val) :
                                if ($value->kriteria_id == $val->kriteria_id) :
                                    $no = $nomor++; ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $val->jp_nama ?></td>
                                        <td><?= $val->jp_skor ?></td>
                                        <td><?= date("d-F-Y", strtotime($val->created_at)) ?></td>
                                        <td><?= date("H:i", strtotime($val->created_at)) . ' WIT' ?></td>
                                        <td><a href="#" class="btn btn-danger btn-sm" onclick="hapus(<?= $val->jp_id ?>)"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                            <?php endif;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!--Row-->

<script>
    var pelanggaran;

    // function reload_table() {
    //     jurusan.ajax.reload(null, false); //reload datatable ajax 
    // }

    window.onload = () => {
        // $(document).ready(function() {
        //     jurusan = $('#dataTableHover').DataTable({
        //         "processing": true,
        //         "serverSide": true,
        //         "ajax": "<?= site_url('admin/jurusanController/get') ?>",

        //     }); // ID From dataTable with Hover
        // });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Yakin untuk hapus jenis pelanggaran?',
            text: "Kriteria pelanggaran tidak akan terhapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('admin/Detail_pelanggaranController/delete/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: '1 pelanggaran berhasil dihapus',
                            showConfirmButton: false,
                            timer: 5000
                        })
                        location.reload();
                    }
                })
            }
        })
    }
</script>