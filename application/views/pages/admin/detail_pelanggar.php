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
                <h6 class="m-0 font-weight-bold text-primary">Detail Pelanggar |<small> <?= $tag->siswa_nama ?> |</small> <small> <?= $tag->siswa_nis ?></small></h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover nowrap" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Kriteria</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Point</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelanggar as $value) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->kriteria_nama ?></td>
                                <td><?= $value->jp_nama ?></td>
                                <td><?= $value->jp_skor ?></td>
                                <td><?= date("d F Y / H:i", strtotime($value->created_at)) ?> WIT</td>
                                <td><a href="javascript:void(0)" onclick="hapus(<?= $value->pelanggaran_id ?>)" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Row-->

<script>
    function hapus(id) {
        Swal.fire({
            title: 'Hapus pelanggaran?',
            // text: "siswa yang dihapus tidak akan dapat mengakses aplikasi LANGSIS",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oke!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('admin/pelanggaranController/deletePelanggar/') ?>" + id,
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        Swal.fire(
                            'Terkirim!',
                            'Menunggu admin untuk melakukan penghapusan.',
                            'success'
                        )
                        location.reload();
                    }
                })
            }
        })
    }
</script>