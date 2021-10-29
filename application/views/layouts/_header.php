        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $head ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
                    <?php if ($this->session->userdata('role') == 99) {
                        if ($this->uri->segment(2) == 'detail-pelanggaran') : ?>
                            <li class="breadcrumb-item"><a href="<?= site_url('0/pelanggaran') ?>"><?= $subhead ?></a></li>
                        <?php endif;
                        if (!$this->uri->segment(1) == 'dashboard') : ?>
                            <li class="breadcrumb-item active" aria-current="page"><?= $head ?></li>
                        <?php endif;
                    }
                    if ($this->session->userdata('role') == 55) {
                        if ($this->uri->segment(1) != 'dashboard') { ?>
                            <li class="breadcrumb-item active" aria-current="page"><?= $head ?></li>
                    <?php }
                    } ?>
                </ol>
            </div>