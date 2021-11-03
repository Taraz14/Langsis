<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh Tidak!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                <a href="<?= site_url('logout') ?>" class="btn btn-primary">Keluar</a>
            </div>
        </div>
    </div>
</div>

</div>
<!---Container Fluid-->
</div>
<!-- Footer -->
<?php if ($this->uri->segment(1) != 'profile') { ?>
    <footer class="sticky-footer bg-white">

        <div class="container my-auto py-2">
            <div class="copyright text-center my-auto">
                <span>copyright &copy; <script>
                        document.write(new Date().getFullYear());
                    </script> - developed by
                    <b><a href="https://github.com/taraz14" target="_blank">Dante</a></b> templated by
                    <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>

                </span>
            </div>
        </div>
    </footer>
<?php } ?>
<!-- Footer -->
</div>
</div>