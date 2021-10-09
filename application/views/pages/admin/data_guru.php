<div class="row">

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_guru" id="#modalScroll" style=" float:right">Tambah Guru</button>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Waktu dibuat</th>
                            <th>Waktu diubah</th>
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
                    Tambah Guru <span><i class="fa fa-users"></i></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-bold">Data Guru</h5>
                <form>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" aria-describedby="nipHelp" placeholder="Masukkan NIP">
                        <small id="nipHelp" class="form-text text-muted">Guru yang tidak memiliki NIP dapat menggunakan NUPTK</small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                    Tutup <span><i class="fa fa-times"></i></span>
                </button>
                <button type="button" class="btn btn-success">
                    Simpan <span><i class="fa fa-save"></i></span>
                </button>
            </div>
        </div>
    </div>
</div>