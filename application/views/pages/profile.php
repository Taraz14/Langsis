<style>
    .dataTables_scrollHeadInner,
    .table {
        width: 100% !important;
    }

    .image-upload>input {
        display: none;
    }

    .gambarx {
        object-fit: cover;
        width: 150px;
        height: 150px;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .container {
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .gambar {
        position: relative;
        object-fit: cover;
        display: block;
        width: 150px;
        height: 150px;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-16%, 0%);
    }

    .overlay {
        position: absolute;
        border-radius: 50%;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: #23272E;
        cursor: pointer;
    }

    .container:hover .overlay {
        opacity: 0.5;
    }

    .image-hover {
        max-width: 30%;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .textnya {
        color: white;
        font-size: 10px;
        position: absolute;
        top: 70%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>
<div class="row">

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <form method="post" action="<?= site_url('profile/upload') ?>" id="profile" runat="server" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="text-center image-upload container">
                        <label for="imgInp">
                            <img class="circular--square link gambar" id="foto" src="<?= base_url('public/admin/img/profile/') . $user->users_avatar ?>">
                            <div class="overlay">
                                <img src="<?= base_url('public/admin/img/upload.png') ?>" class="image-hover">
                                <div class="textnya">Klik untuk upload foto</div>
                            </div>
                        </label>
                        <input accept="image/*" type='file' name="avatar" id="imgInp" />
                    </div>
                    <div class="form-group mt-4">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username baru" value="<?= $user->users_username ?>">
                        <small id="usernameHelp" class="form-text text-muted">Username baru</small>
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?= $user->users_username ?>" autocomplete="false">
                        <small id="usernameHelp" class="form-text text-muted">Username baru</small>
                    </div>
                    <div class="form-group mt-4">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $user->users_nama ?>">
                        <small id="namaHelp" class="form-text text-muted">Nama lengkap beserta gelar</small>
                    </div>
                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Nama" value="<?= $user->users_email ?>">
                        <small id="namaHelp" class="form-text text-muted">Email Google (gmail)</small>
                    </div>

                    <div class="form-group mt-4">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat sekarang"><?= $user->users_alamat ?></textarea>
                        <small id="namaHelp" class="form-text text-muted">Alamat sekarang</small>
                    </div>
                    <div class="form-group mt-4">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama">
                            <option value="" hidden>--Pilih Agama--</option>
                            <?php foreach ($agama as $val) : ?>
                                <option value="<?= $val->agama_id ?>" <?= $val->agama_id == $user->users_agama ? 'selected' : '' ?>><?= $val->agama_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <small id="namaHelp" class="form-text text-muted">Email Google (gmail)</small> -->
                    </div>
                    <div class="form-group mt-4">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="genderL" name="gender" class="custom-control-input" value="Laki-laki" <?= $user->users_gender == 'Laki-laki' ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="genderL">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="genderP" name="gender" class="custom-control-input" value="Perempuan" <?= $user->users_gender == 'Perempuan' ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="genderP">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="tlp">Telepon</label>
                        <input type="text" class="form-control" name="tlp" id="tlp" placeholder="0812345678910" value="<?= $user->users_telpon ?>">
                        <small id="tlpHelp" class="form-text text-muted">08139xxxxxxxx</small>
                    </div>
                    <div class="form-group mt-4">
                        <!-- <a class="btn btn-success text-white" id="save"><i class="fa fa-save"></i> Simpan</a> -->
                        <button type="submit" class="btn btn-success text-white" id="save"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Row-->
<script>
    window.onload = () => {
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                foto.src = URL.createObjectURL(file)
            }
        }

        $(function() {
            $('#save').click(function() {
                var data = new FormData($('#profile')[0]);
                $.ajax({
                    type: 'post',
                    url: '<?= site_url('Profile/update') ?>',
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
</script>