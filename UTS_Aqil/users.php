<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AdminLTE 4 | Users</title>

  <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
  <script>
    (() => {
      'use strict';
      const root = document.documentElement;

      // Applications with their own theming opt out of AdminLTE's color mode
      // entirely, here as well as in the bundle.
      if (root.getAttribute('data-lte-color-mode') === 'off') {
        return;
      }

      const STORAGE_KEY = 'lte-theme';
      let stored = null;
      try {
        stored = localStorage.getItem(STORAGE_KEY);
      } catch {
        // localStorage may be unavailable (private mode, sandboxed iframe).
      }
      // Mirror the precedence in color-mode.ts: the visitor's stored choice
      // wins, then a theme this page declared itself, then the OS preference.
      const authored = root.getAttribute('data-bs-theme');
      let resolved = 'light';
      if (stored === 'dark' || stored === 'light') {
        resolved = stored;
      } else if (authored === 'dark' || authored === 'light') {
        resolved = authored;
      } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
        resolved = 'dark';
      }
      root.setAttribute('data-bs-theme', resolved);
      root.style.colorScheme = resolved;
      // Flag values computed here, so the bundle does not mistake them for a
      // theme the page declared and stop following the OS preference.
      if (resolved !== authored) {
        root.setAttribute('data-lte-theme-resolved', '');
      }
    })();
  </script>
  <!--end::Theme Init-->

  <!--begin::Accessibility Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
  <!--end::Accessibility Meta Tags-->

  <!--begin::Primary Meta Tags-->
  <meta name="title" content="AdminLTE 4 | Users" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel" />
  <!--end::Primary Meta Tags-->

  <!--begin::Accessibility Features-->
  <!-- Skip links will be dynamically added by accessibility.js -->
  <meta name="supported-color-schemes" content="light dark" />
  <link rel="preload" href="./css/adminlte.css" as="style" />
  <!--end::Accessibility Features-->

  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous"
    media="print"
    onload="this.media = 'all'" />
  <!--end::Fonts-->

  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->

  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->

  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="./css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
</head>
<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h1 class="mb-0 fs-3">Data Nilai Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
          </nav>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-12">
          <!--begin::Card-->
          <div class="card mb-4">
            <!--begin::Card Header-->
            <div class="card-header">
              <div class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                  <h3 class="card-title">Nilai Mahasiswa</h3>
                </div>
                <div class="col-12 col-md-8">
                  <div class="d-flex flex-wrap justify-content-md-end gap-2">
                    <!-- Fitur 2.1: Pencarian berdasarkan Nama (search by name) -->
                    <div class="input-group input-group-sm w-auto">
                      <span class="input-group-text">
                        <i class="bi bi-search" aria-hidden="true"></i>
                      </span>
                      <input
                        type="search"
                        id="user-search"
                        class="form-control"
                        placeholder="Search by name..."
                        aria-label="Search by name"
                        style="width: 180px" />
                    </div>

                    <!-- Fitur 2.2: Pencarian berdasarkan Predikat (search by predicate) -->
                    <select id="filter-predikat" class="form-select form-select-sm" style="width: 175px;">
                      <option value="">Semua Predikat</option>
                      <option value="Sangat Memuaskan">Sangat Memuaskan</option>
                      <option value="Memuaskan">Memuaskan</option>
                      <option value="Cukup">Cukup</option>
                      <option value="Kurang">Kurang</option>
                      <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>

                    <!-- Dropdown Sorting Nilai Akhir & Nama -->
                    <select id="sort-nilai" class="form-select form-select-sm" style="width: 195px;">
                      <option value="">Urutkan Data (Default)</option>
                      <option value="nilai-asc">Nilai Terendah (Asc)</option>
                      <option value="nilai-desc">Nilai Tertinggi (Desc)</option>
                      <option value="nama-asc">Nama Mahasiswa (A - Z)</option>
                      <option value="nama-desc">Nama Mahasiswa (Z - A)</option>
                    </select>

                    <button
                      type="button"
                      class="btn btn-sm btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#modal-add-user">
                      <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                      Tambah Data Nilai
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Card Header-->

            <?php
            // Create connection
            require_once __DIR__ . "/connect_dbweb.php";

            // Deteksi nama tabel: nilai_mhsw atau nilaimhsw
            $check_table = mysqli_query($conn, "SHOW TABLES LIKE 'nilai_mhsw'");
            $table_name = ($check_table && mysqli_num_rows($check_table) > 0) ? "nilai_mhsw" : "nilaimhsw";

            $sql = "SELECT * FROM `$table_name`";
            $result = mysqli_query($conn, $sql);

            // Process the result set
            if ($result && mysqli_num_rows($result) > 0) {
            ?>
             <!--begin::Card Body-->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle m-0" id="tabel-mahasiswa">
                    <thead>
                      <tr>
                        <th>Nim</th>
                        <th id="th-nama" style="cursor: pointer; user-select: none;" title="Klik untuk mengurutkan nama">
                          Nama Mahasiswa <i id="sort-icon-nama" class="bi bi-arrow-down-up ms-1 text-secondary"></i>
                        </th>
                        <!-- Fitur 3: Sorting Nilai Akhir dengan ikon panah kecil di judul kolom -->
                        <th id="th-nilai" style="cursor: pointer; user-select: none;" title="Klik untuk mengurutkan nilai akhir (Sorting)">
                          Nilai Akhir <i id="sort-icon-nilai" class="bi bi-arrow-down-up ms-1 text-secondary"></i>
                        </th>
                        <th>Nilai Huruf</th>
                        <th>Predikat</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diubah</th>
                        <th class="text-end">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) { 
                        $nim = $row["NIM"] ?? ($row["nim"] ?? "");
                        $nama = $row["nama mahasiswa"] ?? ($row["nama_mhsw"] ?? ($row["nama"] ?? ""));
                        $nilai_akhir = $row["nilai akhir"] ?? ($row["nilai_akhir"] ?? ($row["nilai"] ?? 0));
                        $nilai_huruf = $row["nilai huruf"] ?? ($row["nilai_huruf"] ?? "-");
                        $predikat = $row["predikat"] ?? "-";
                        $tgl_dibuat = $row["Tanggal DIbuat"] ?? ($row["reg_date"] ?? ($row["created_at"] ?? ""));
                        $tgl_diubah = $row["Tanggal Diubah"] ?? ($row["modify_date"] ?? ($row["updated_at"] ?? ""));

                        // Fitur 1: Membaca kolom foto atau file_path dari tabel
                        $foto = !empty($row["foto"]) ? $row["foto"] : (!empty($row["file_path"]) ? $row["file_path"] : "");
                      ?>
                        <!-- Tambahkan data-predikat, data-nama, dan data-nilai pada tr untuk filter & sorting -->
                        <tr
                          data-predikat="<?php echo htmlspecialchars($predikat); ?>"
                          data-nama="<?php echo htmlspecialchars($nama); ?>"
                          data-nilai="<?php echo htmlspecialchars($nilai_akhir); ?>">
                          <td>
                            <span class="fw-medium"><?php echo htmlspecialchars($nim); ?></span>
                          </td>
                          <!-- Fitur 1: Foto kecil di sebelah Nama Mahasiswa (tetap di kolom Nama Mahasiswa) -->
                          <td>
                            <div class="d-flex align-items-center">
                              <?php
                                if (!empty($foto) && file_exists(__DIR__ . "/uploads/" . basename($foto))) {
                                  $src_foto = "./uploads/" . htmlspecialchars(basename($foto));
                                } elseif (!empty($foto) && file_exists(__DIR__ . "/" . $foto)) {
                                  $src_foto = "./" . htmlspecialchars($foto);
                                } else {
                                  // Fallback avatar dinamis jika belum ada foto
                                  $src_foto = "https://ui-avatars.com/api/?name=" . urlencode($nama) . "&background=0D8ABC&color=fff";
                                }
                              ?>
                              <img
                                src="<?php echo $src_foto; ?>"
                                alt="Foto <?php echo htmlspecialchars($nama); ?>"
                                class="rounded-circle me-2 flex-shrink-0 border shadow-sm"
                                style="width: 34px; height: 34px; object-fit: cover;" />
                              <span><?php echo htmlspecialchars($nama); ?></span>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-danger">
                              <?php echo htmlspecialchars($nilai_akhir); ?>
                            </span>
                          </td>
                          <td>
                            <span class="badge text-bg-success">
                              <?php echo htmlspecialchars($nilai_huruf); ?>
                            </span>
                          </td>
                          <td class="kolom-predikat">
                            <?php echo htmlspecialchars($predikat); ?>
                          </td>
                          <td>
                            <?php 
                            if (!empty($tgl_dibuat) && $tgl_dibuat !== "0000-00-00 00:00:00") {
                              echo date("d-m-Y H:i", strtotime($tgl_dibuat));
                            } else {
                              echo "<span class='text-secondary'>-</span>";
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            // Menampilkan modify_date jika sudah pernah diedit
                            if (!empty($tgl_diubah) && $tgl_diubah !== "0000-00-00 00:00:00") {
                              echo date("d-m-Y H:i", strtotime($tgl_diubah));
                            } else {
                              echo "<span class='text-secondary'>-</span>";
                            }
                            ?>
                          </td>
                          <td class="text-end">
                            <div class="btn-group btn-group-sm">
                              <button
                                type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-edit-user"
                                data-nim="<?php echo htmlspecialchars($nim); ?>"
                                data-nama="<?php echo htmlspecialchars($nama); ?>"
                                data-nilai="<?php echo htmlspecialchars($nilai_akhir); ?>"
                                aria-label="Edit data mahasiswa">
                                <i class="bi bi-pencil" aria-hidden="true"></i>
                              </button>

                              <button
                                type="button"
                                class="btn btn-outline-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-delete-user"
                                data-nim="<?php echo htmlspecialchars($nim); ?>"
                                aria-label="Hapus Nilai Ini">
                                <i class="bi bi-trash" aria-hidden="true"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            <?php } else {
              echo "0 results - Data Not Found!";
            } ?>
            <?php mysqli_close($conn);
            ?>
            <!--end::Card Body-->

            <!--begin::Card Footer-->
            <!-- Fitur 4: Pagination dengan limit 5, 10, 15 (drop-down option) dan tombol First Page, Previous, Next, Last Page -->
            <div class="card-footer clearfix py-2">
              <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <!-- Info Data & Drop-down Option Limit (5, 10, 15 record per page) -->
                <div class="d-flex flex-wrap align-items-center gap-3">
                  <div id="pagination-info" class="fs-7 text-body-secondary">
                    Showing 0 to 0 of 0 users
                  </div>
                  <div class="d-flex align-items-center gap-2 fs-7 text-body-secondary">
                    <label for="limit-per-page" class="form-label mb-0 small text-nowrap">Limit:</label>
                    <select id="limit-per-page" class="form-select form-select-sm" style="width: auto;">
                      <option value="5" selected>5 record per page</option>
                      <option value="10">10 record per page</option>
                      <option value="15">15 record per page</option>
                    </select>
                  </div>
                </div>

                <!-- Tombol-tombol First Page, Previous, 1, 2, ..., Next, Last Page -->
                <nav aria-label="Pagination Navigation">
                  <ul id="pagination-controls" class="pagination pagination-sm m-0">
                    <!-- Tombol halaman akan di-generate otomatis oleh JavaScript -->
                  </ul>
                </nav>
              </div>
            </div>
            <!--end::Card Footer-->
          </div>
          <!--end::Card-->
        </div>
        <!-- /.col -->
      </div>
      <!--end::Row-->

      <!--begin::Add User Modal-->
      <div
        class="modal fade"
        id="modal-add-user"
        tabindex="-1"
        aria-labelledby="modal-add-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Wajib tambahkan enctype="multipart/form-data" untuk upload file -->
            <form action="insert_data.php" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-add-user-label">Tambah Data Nilai</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nim" class="form-label">NIM</label>
                  <input
                    type="text"
                    minlength="10"
                    maxlength="10"
                    class="form-control"
                    id="nim"
                    name="nim"
                    placeholder="Masukkan NIM"
                    required>
                </div>
                <div class="mb-3">
                  <label for="new-user-name" class="form-label"> Nama Lengkap </label>
                  <input
                    type="text"
                    class="form-control"
                    id="new-user-name"
                    name="nama"
                    placeholder="Masukkan Nama Lengkap Anda"
                    pattern="^[a-zA-Z\s]+$"
                    title="Nama hanya boleh berisi huruf dan spasi"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                    required />
                </div>
                <div class="mb-3">
                  <label for="new-user-email" class="form-label"> Nilai Akhir </label>
                  <input
                    type="number"
                    class="form-control"
                    id="new-user-email"
                    name="nilai"
                    placeholder="00.00"
                    min="0"
                    max="100"
                    step="0.01"
                    required />
                </div>
                <!-- Input Tambahan untuk Upload Foto Profil -->
                <div class="mb-3">
                  <label for="new-user-foto" class="form-label">Foto Profil (Opsional)</label>
                  <input
                    type="file"
                    class="form-control"
                    id="new-user-foto"
                    name="foto"
                    accept="image/jpeg, image/png, image/webp" />
                  <div class="form-text">Format: JPG, PNG, atau WEBP (Maks. 2MB).</div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--end::Add User Modal-->

      <!-- Modal Delete -->
      <div
        class="modal fade"
        id="modal-delete-user"
        tabindex="-1"
        aria-labelledby="modal-delete-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form action="delete_data.php" method="post">

              <div class="modal-header">
                <h5 class="modal-title" id="modal-delete-user-label">
                  Hapus Data Mahasiswa
                </h5>

                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <p class="mb-0">
                  Apakah kamu yakin ingin menghapus data mahasiswa ini?
                  Data yang dihapus tidak dapat dikembalikan.
                </p>

                <input type="hidden" name="nim" id="delete-nim">
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
                  Batal
                </button>

                <button type="submit" class="btn btn-danger">
                  Hapus Data
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
      <!--end::Delete User Modal-->

      <!-- Modal Edit -->
      <div
        class="modal fade"
        id="modal-edit-user"
        tabindex="-1"
        aria-labelledby="modal-edit-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Wajib tambahkan enctype="multipart/form-data" untuk upload file -->
            <form action="edit_data.php" method="post" enctype="multipart/form-data">

              <div class="modal-header">
                <h5 class="modal-title" id="modal-edit-user-label">
                  Edit Data Mahasiswa
                </h5>

                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <!-- Pastikan id="edit-nim-lama" dan name="nim_lama" ada di sini -->
                <input type="hidden" name="nim_lama" id="edit-nim-lama" />

                <div class="mb-3">
                  <label for="edit-nim" class="form-label">NIM</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nim"
                    id="edit-nim"
                    minlength="10"
                    maxlength="10"
                    required />
                </div>

                <div class="mb-3">
                  <label for="edit-nama" class="form-label">Nama Mahasiswa</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nama"
                    id="edit-nama"
                    pattern="^[a-zA-Z\s]+$"
                    title="Nama hanya boleh berisi huruf dan spasi"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                    required />
                </div>

                <div class="mb-3">
                  <label for="edit-nilai" class="form-label">Nilai Akhir</label>
                  <input
                    type="number"
                    class="form-control"
                    name="nilai"
                    id="edit-nilai"
                    min="0"
                    max="100"
                    step="0.01"
                    required />
                </div>

                <!-- Input Tambahan untuk Ganti Foto Profil -->
                <div class="mb-3">
                  <label for="edit-foto" class="form-label">Ganti Foto Profil (Opsional)</label>
                  <input
                    type="file"
                    class="form-control"
                    id="edit-foto"
                    name="foto"
                    accept="image/jpeg, image/png, image/webp" />
                  <div class="form-text">Kosongkan jika tidak ingin mengubah foto. (Maks. 2MB)</div>
                </div>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
                  Batal
                </button>

                <button type="submit" class="btn btn-primary">
                  Simpan Perubahan
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
      <!-- End Modal Edit -->

    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
<!--end::App Main-->
<!--begin::Footer-->
<footer class="app-footer">
  <!--begin::To the end-->
  <div class="float-end d-none d-sm-inline">Anything you want</div>
  <!--end::To the end-->
  <!--begin::Copyright-->
  <strong>
    Copyright &copy; 2014-2026&nbsp;
    <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
  </strong>
  All rights reserved.
  <!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
  src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
  crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
  crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="./js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)-->
<!--begin::OverlayScrollbars Configure-->
<script>
  const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
  const Default = {
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'leave',
    scrollbarClickScroll: true,
  };
  document.addEventListener('DOMContentLoaded', function() {
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

    // Disable OverlayScrollbars on mobile devices to prevent touch interference
    const isMobile = window.innerWidth <= 992;

    if (
      sidebarWrapper &&
      OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
      !isMobile
    ) {
      OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
        scrollbars: {
          theme: Default.scrollbarTheme,
          autoHide: Default.scrollbarAutoHide,
          clickScroll: Default.scrollbarClickScroll,
        },
      });
    }
  });
</script>
<!--end::OverlayScrollbars Configure-->

<!--begin::Color Mode Toggle-->
<!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
<!--end::Color Mode Toggle-->

<!--end::Script-->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterPredikat = document.getElementById('filter-predikat');
    const searchInput = document.getElementById('user-search');
    const sortSelect = document.getElementById('sort-nilai');
    const limitSelect = document.getElementById('limit-per-page');

    const thNama = document.getElementById('th-nama');
    const sortIconNama = document.getElementById('sort-icon-nama');
    const thNilai = document.getElementById('th-nilai');
    const sortIconNilai = document.getElementById('sort-icon-nilai');

    const tableBody = document.querySelector('#tabel-mahasiswa tbody');
    // Simpan urutan asli dari database untuk mode "Default"
    const originalRows = Array.from(tableBody ? tableBody.querySelectorAll('tr') : []);

    const paginationInfo = document.getElementById('pagination-info');
    const paginationControls = document.getElementById('pagination-controls');

    // Fitur 4: Limit pagination (default 5, opsi 5, 10, 15)
    let rowsPerPage = limitSelect ? (parseInt(limitSelect.value) || 5) : 5;
    let currentPage = 1;
    let currentSort = ''; // '', 'nama-asc', 'nama-desc', 'nilai-asc', 'nilai-desc'
    let filteredRows = [...originalRows];

    // 1. Fungsi utama untuk Filter + Search + Sort
    function applyFilterAndSort() {
      const selectedPredikat = filterPredikat ? filterPredikat.value.toLowerCase().trim() : '';
      const searchText = searchInput ? searchInput.value.toLowerCase().trim() : '';

      // A. Saring data dari urutan asli
      filteredRows = originalRows.filter(row => {
        const rowPredikat = (row.getAttribute('data-predikat') || '').toLowerCase().trim();
        const rowNama = (row.getAttribute('data-nama') || '').toLowerCase().trim();

        // Fitur 2.1: Pencarian berdasarkan Nama (search by name)
        const matchSearch = searchText === "" || rowNama.includes(searchText);

        // Fitur 2.2: Pencarian berdasarkan Predikat (search by predicate)
        const matchPredikat = selectedPredikat === "" || rowPredikat === selectedPredikat;

        return matchPredikat && matchSearch;
      });

      // B. Urutkan data berdasarkan Nilai Akhir atau Nama Mahasiswa (Fitur 3)
      if (currentSort === 'nilai-asc' || currentSort === 'nilai-desc') {
        filteredRows.sort((a, b) => {
          const nilaiA = parseFloat(a.getAttribute('data-nilai')) || 0;
          const nilaiB = parseFloat(b.getAttribute('data-nilai')) || 0;

          return currentSort === 'nilai-asc' ? nilaiA - nilaiB : nilaiB - nilaiA;
        });
      } else if (currentSort === 'nama-asc' || currentSort === 'nama-desc') {
        filteredRows.sort((a, b) => {
          const namaA = (a.getAttribute('data-nama') || '').toLowerCase().trim();
          const namaB = (b.getAttribute('data-nama') || '').toLowerCase().trim();

          return currentSort === 'nama-asc' ?
            namaA.localeCompare(namaB, 'id') :
            namaB.localeCompare(namaA, 'id');
        });
      }

      // C. Susun ulang urutan elemen <tr> di dalam <tbody>
      if (tableBody) {
        filteredRows.forEach(row => tableBody.appendChild(row));
      }

      // Reset ke halaman 1 setiap kali filter/sort berubah
      currentPage = 1;
      updateSortUI();
      renderTable();
    }

    // 2. Fungsi untuk memperbarui ikon panah di header tabel dan dropdown (Fitur 3)
    function updateSortUI() {
      if (sortSelect && sortSelect.value !== currentSort) {
        sortSelect.value = currentSort;
      }

      // Reset ikon terlebih dahulu
      if (sortIconNama) sortIconNama.className = 'bi bi-arrow-down-up ms-1 text-secondary';
      if (sortIconNilai) sortIconNilai.className = 'bi bi-arrow-down-up ms-1 text-secondary';

      // Ubah ikon sesuai kolom yang sedang aktif di-sort
      if (currentSort === 'nilai-asc' && sortIconNilai) {
        sortIconNilai.className = 'bi bi-sort-numeric-down ms-1 text-primary';
      } else if (currentSort === 'nilai-desc' && sortIconNilai) {
        sortIconNilai.className = 'bi bi-sort-numeric-up-alt ms-1 text-primary';
      } else if (currentSort === 'nama-asc' && sortIconNama) {
        sortIconNama.className = 'bi bi-sort-alpha-down ms-1 text-primary';
      } else if (currentSort === 'nama-desc' && sortIconNama) {
        sortIconNama.className = 'bi bi-sort-alpha-up-alt ms-1 text-primary';
      }
    }

    // 3. Fungsi untuk menampilkan baris sesuai halaman aktif (Fitur 4)
    function renderTable() {
      originalRows.forEach(row => row.style.display = 'none');

      const totalRows = filteredRows.length;
      const totalPages = Math.ceil(totalRows / rowsPerPage) || 1;

      if (currentPage > totalPages) currentPage = totalPages;
      if (currentPage < 1) currentPage = 1;

      const startIndex = (currentPage - 1) * rowsPerPage;
      const endIndex = Math.min(startIndex + rowsPerPage, totalRows);

      for (let i = startIndex; i < endIndex; i++) {
        filteredRows[i].style.display = '';
      }

      if (paginationInfo) {
        if (totalRows > 0) {
          paginationInfo.textContent = `Showing ${startIndex + 1} to ${endIndex} of ${totalRows} users`;
        } else {
          paginationInfo.textContent = `Showing 0 to 0 of 0 users`;
        }
      }

      renderPaginationControls(totalPages);
    }

    // 4. Fitur 4: Tombol-tombol First Page, Previous, Nomor Halaman, Next, dan Last Page
    function renderPaginationControls(totalPages) {
      if (!paginationControls) return;
      paginationControls.innerHTML = '';

      // A. Tombol First Page
      const firstLi = document.createElement('li');
      firstLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
      firstLi.innerHTML = `<a class="page-link" href="#" aria-label="First Page" title="First Page">&laquo;&laquo; First Page</a>`;
      firstLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage > 1) {
          currentPage = 1;
          renderTable();
        }
      });
      paginationControls.appendChild(firstLi);

      // B. Tombol Previous
      const prevLi = document.createElement('li');
      prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
      prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous Page" title="Previous Page">&laquo; Previous</a>`;
      prevLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage > 1) {
          currentPage--;
          renderTable();
        }
      });
      paginationControls.appendChild(prevLi);

      // C. Tombol Nomor Halaman (1, 2, 3...)
      for (let i = 1; i <= totalPages; i++) {
        const pageLi = document.createElement('li');
        pageLi.className = `page-item ${i === currentPage ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        pageLi.addEventListener('click', function(e) {
          e.preventDefault();
          currentPage = i;
          renderTable();
        });
        paginationControls.appendChild(pageLi);
      }

      // D. Tombol Next
      const nextLi = document.createElement('li');
      nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
      nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next Page" title="Next Page">Next &raquo;</a>`;
      nextLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
          currentPage++;
          renderTable();
        }
      });
      paginationControls.appendChild(nextLi);

      // E. Tombol Last Page
      const lastLi = document.createElement('li');
      lastLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
      lastLi.innerHTML = `<a class="page-link" href="#" aria-label="Last Page" title="Last Page">Last Page &raquo;&raquo;</a>`;
      lastLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
          currentPage = totalPages;
          renderTable();
        }
      });
      paginationControls.appendChild(lastLi);
    }

    // Event Listener untuk Dropdown Limit (5, 10, 15)
    if (limitSelect) {
      limitSelect.addEventListener('change', function() {
        rowsPerPage = parseInt(this.value) || 5;
        currentPage = 1;
        renderTable();
      });
    }

    // Event Listener untuk Search & Filter Predikat
    if (filterPredikat) filterPredikat.addEventListener('change', applyFilterAndSort);
    if (searchInput) searchInput.addEventListener('input', applyFilterAndSort);

    // Event Listener saat Dropdown Sort diubah
    if (sortSelect) {
      sortSelect.addEventListener('change', function() {
        currentSort = this.value;
        applyFilterAndSort();
      });
    }

    // Fitur 3: Event Listener saat Header Kolom "Nilai Akhir" diklik langsung (Ikon Panah Kecil)
    if (thNilai) {
      thNilai.addEventListener('click', function() {
        if (currentSort === 'nilai-asc') {
          currentSort = 'nilai-desc';
        } else if (currentSort === 'nilai-desc') {
          currentSort = '';
        } else {
          currentSort = 'nilai-asc';
        }
        applyFilterAndSort();
      });
    }

    // Event Listener saat Header Kolom "Nama Mahasiswa" diklik langsung
    if (thNama) {
      thNama.addEventListener('click', function() {
        if (currentSort === 'nama-asc') {
          currentSort = 'nama-desc';
        } else if (currentSort === 'nama-desc') {
          currentSort = '';
        } else {
          currentSort = 'nama-asc';
        }
        applyFilterAndSort();
      });
    }

    // Jalankan pertama kali saat halaman dimuat
    applyFilterAndSort();
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Script untuk Modal Delete
    const modalDelete = document.getElementById('modal-delete-user');
    if (modalDelete) {
      modalDelete.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget.closest('button');
        const nim = button ? button.getAttribute('data-nim') : '';
        document.getElementById('delete-nim').value = nim;
      });
    }

    // 2. Script untuk Modal Edit
    const modalEdit = document.getElementById('modal-edit-user');
    if (modalEdit) {
      modalEdit.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget.closest('button');
        if (!button) return;

        const nim = button.getAttribute('data-nim');
        const nama = button.getAttribute('data-nama');
        const nilai = button.getAttribute('data-nilai');

        document.getElementById('edit-nim-lama').value = nim;
        document.getElementById('edit-nim').value = nim;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-nilai').value = nilai;
      });
    }
  });
</script>

</body>
<!--end::Body-->

</html>
