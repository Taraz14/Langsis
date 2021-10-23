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
                <a href="#" class="m-0 btn btn-primary btn-sm">Laporkan Siswa</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover nowrap" width="100%" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th>Guru Pelapor</th>
                            <th>Tanggal dibuat</th>
                            <th>Waktu dibuat</th>
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

<script>
    window.onload = () => {
        //datatables
        $(document).ready(function() {
            pelanggaran = $('#dataTableHover').DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax": "<?= site_url('admin/siswaController/get') ?>",

                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
            }); // ID From dataTable with Hover
        });
    }
</script>