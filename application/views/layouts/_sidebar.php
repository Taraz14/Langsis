  <!-- active link -->
  <?php
    $segment = $this->uri->segment(2);
    $home = $this->uri->segment(1);

    ?>
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url() ?>">
          <div class="sidebar-brand-icon">
              <img src="<?= base_url() ?>/public/admin/img/logo/smk.png">
          </div>
          <!-- <div class="sidebar-brand-text mx-3">Smk Negeri 1 Kab. Sorong</div> -->
          <div class="sidebar-brand-text mx-3">Langsis <br />SMK</div>
      </a>
      <div class="sidebar-heading mb-3 mt-3">
          status :<span style="color:black !important"> Aktif</span>
          <span class="badge badge-success float-right">Online</span>
      </div>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?= $home == 'dashboard' ? 'active' : '' ?>">
          <a class="nav-link" href="<?= site_url('dashboard') ?>">
              <i class="fas fa-fw fa-home"></i>
              <span>Dashboard</span></a>
      </li>
      <!-- Admin Sidebar -->
      <?php if ($this->session->userdata('role') == 99) : ?>
          <hr class="sidebar-divider">
          <div class="sidebar-heading">
              Menu Utama
          </div>
          <li class="nav-item <?= $segment == 'jurusan' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= site_url('0/jurusan') ?>">
                  <i class="fas fa-fw fa-code-branch"></i>
                  <span>Jurusan</span>
              </a>
          </li>
          <li class="nav-item <?= $segment == 'kelas' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= site_url('0/kelas') ?>">
                  <i class="fas fa-fw fa-chalkboard-teacher"></i>
                  <span>Kelas</span>
              </a>
          </li>
          <li class="nav-item <?= ($segment == 'guru') || ($segment == 'siswa') ? 'active' : '' ?>">
              <a class="nav-link  <?= ($segment == 'guru') || ($segment == 'siswa') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                  <i class="far fa-fw fa-user"></i>
                  <span>User Management</span>
              </a>
              <div id="collapseBootstrap" class="collapse <?= ($segment == 'guru') || ($segment == 'siswa') ? 'show' : '' ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">User Management</h6>
                      <a class="collapse-item <?= $segment == 'guru' ? 'active' : '' ?>" href="<?= site_url('0/guru') ?>">Guru</a>
                      <a class="collapse-item <?= $segment == 'siswa' ? 'active' : '' ?>" href="<?= site_url('0/siswa') ?>">Siswa</a>
                  </div>
              </div>
          </li>
          <li class="nav-item <?= ($segment == 'pelanggaran') || ($segment == 'detail-pelanggaran') ? 'active' : '' ?>">
              <a class="nav-link" href="<?= site_url('0/pelanggaran') ?>">
                  <i class="fas fa-fw fa-gavel"></i>
                  <span>Pelanggaran</span>
              </a>
          </li>
          <hr class="sidebar-divider">
          <div class="sidebar-heading">
              System
          </div>

          <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Logout</span>
              </a>
          </li>
      <?php endif; ?>

      <!-- Guru Sidebar -->
      <?php if ($this->session->userdata('role') == 55) : ?>
          <hr class="sidebar-divider">
          <div class="sidebar-heading">
              Menu Utama
          </div>
          <li class="nav-item <?= $segment == 'jurusan' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= site_url('profile') ?>">
                  <i class="fas fa-fw fa-user"></i>
                  <span>Profile</span>
              </a>
          </li>
          <li class="nav-item <?= $segment == 'kelas' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= site_url('1/data-siswa') ?>">
                  <i class="fas fa-fw fa-chalkboard-teacher"></i>
                  <span>Data Siswa</span>
              </a>
          </li>
          <li class="nav-item <?= $segment == 'pelanggaran' ? 'active' : '' ?>">
              <a class="nav-link" href="<?= site_url('1/pelanggaran') ?>">
                  <i class="fas fa-fw fa-gavel"></i>
                  <span>Pelanggaran</span>
              </a>
          </li>
          <hr class="sidebar-divider">
          <div class="sidebar-heading">
              System
          </div>

          <li class="nav-item">
              <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-fw fa-sign-out-alt"></i>
                  <span>Logout</span>
              </a>
          </li>
      <?php endif; ?>
      <hr class="sidebar-divider">
      <div class="version">Langsis Version : Beta 1.0</div>
      <div class="version" id="version-ruangadmin" style="text-indent: -9999px;"></div>

  </ul>
  <!-- Sidebar -->

  <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">