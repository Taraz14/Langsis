<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Input Kelas</h6>
            </div>
            <div class="card-body">
                <form id="savekelas" action="<?= site_url('admin/jurusanController/create') ?>" method="post">
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
                                    <input type="text" class="form-control" name="classcode" id="classcode" aria-describedby="kelasHelp" value="" placeholder="-" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" name="classnn" id="classnn" aria-describedby="kelasHelp" placeholder="1">
                                </div>
                            </div>
                            <small id="kelasHelp" class="form-text text-muted">Tulis kelas</small>
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
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Kode Kelas</th>
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
    window.onload = () => {
        $(document).ready(function() {
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
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
    }
</script>