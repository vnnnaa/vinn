<?php
session_start();

if (isset($_SESSION['siswa'])) {

  include 'koneksi.php';

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pembayaran SPP SMK CIPTA SKILL</title>

    <link href="img/cs1.jpg" rel="shortcut icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">

          <img class="img-profile rounded-circle" height="70" width="70" src="img/cs1.jpg">

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Pembayaran SPP</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->

            <div class="input-group">
              <h1>SMK CIPTA SKILL</h1>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="index.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
                  <img class="img-profile rounded-circle" src="img/undraw_female_avatar_w3jk.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">



            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Data Pembayaran SPP</h1>

            </div>


            <?php

            $tampilsiswa   = mysqli_query($conn, "SELECT siswa.*, angkatan.*, jurusan.*, kelas.* FROM siswa, angkatan, jurusan, kelas WHERE siswa.id_angkatan = angkatan.nama_angkatan AND siswa.id_jurusan = jurusan.id_jurusan AND siswa.id_kelas = kelas.id_kelas AND id_siswa = '$_SESSION[siswa]'");

            $siswa    = mysqli_fetch_assoc($tampilsiswa);
            $id_siswa = $_SESSION['siswa'];

            ?>


            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Biodata Siswa</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>NISN</td>
                      <td><?= $siswa['nisn'] ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td><?= $siswa['nama'] ?></td>
                    </tr>
                    <tr>
                      <td>Kelas</td>
                      <td><?= $siswa['nama_kelas'] ?></td>
                    </tr>
                    <tr>
                      <td>Angkatan</td>
                      <td><?= $siswa['nama_angkatan'] ?></td>
                    </tr>

                  </table>
                </div>
              </div>
            </div>




                    <?php
                    //ambil hostory sekolah siswa dari kelas 10 sd 12
                    $qdata = "select * from siswatemp where nisn='$siswa[nisn]'";
                    $query = mysqli_query($conn, $qdata);
                    $hasil = mysqli_fetch_array($query);
                    $tahunanggaran = substr($hasil['tahun'], 0, 4); //2021
                    $nexttahunanggaran = $tahunanggaran + 1;



                    if ($hasil['kls10'] != NULL) {
                      $kelas = 10;
                      $namakelas = $hasil['kls10'];

                      $ceklunas = mysqli_query($conn, "select count(tglbayar) from pembayaran where tglbayar!=0 and kelas=10 and id_siswa=$id_siswa");
                      $lunas = mysqli_fetch_array($ceklunas);
                      $lebar = $lunas[0] / 12 * 100;
                      if ($lebar <= 45) $progress = "progress-bar bg-danger";
                      elseif ($lebar <= 65) $progress = "progress-bar bg-warning";
                      elseif ($lebar <= 75) $progress = "progress-bar bg-info";
                      elseif ($lebar <= 100) $progress = "progress-bar bg-success";
                      if ($lunas[0] == 12) $katakata = "SPP Lunas&nbsp;";
                      elseif ($lunas[0] < 12) $katakata = "SPP Dibayar $lunas[0] bulan&nbsp;";

                    ?>

                      <div class="card">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExamplex" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplex">
                          <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran SPP Kelas <?= $kelas; ?> / <?= $namakelas ?> [Tahun <?= $tahunanggaran; ?>/<?= $nexttahunanggaran; ?>]</h6>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div><?= $katakata ?></div>
                            </div>
                            <div class="col">
                              <div class="progress progress-sm mr-2">
                                <div class="<?= $progress ?>" role="progressbar" style="width: <?= $lebar ?>%" aria-valuenow="<?= $lunas[0] ?>" aria-valuemin="0" aria-valuemax="12"></div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExamplex" style="">
                          <div class="card-body">
                            <?php include "tampildata_user.php"; ?>
                          </div>
                        </div>
                      </div>


                    <?php
                    }
                    if ($hasil['kls11'] != NULL) {
                      $kelas = 11;
                      $namakelas = $hasil['kls11'];
                      $tahunanggaran = $tahunanggaran + 1;
                      $nexttahunanggaran = $nexttahunanggaran + 1;

                      $ceklunas = mysqli_query($conn, "select count(tglbayar) from pembayaran where tglbayar!=0 and kelas=11 and id_siswa=$id_siswa");
                      $lunas = mysqli_fetch_array($ceklunas);
                      $lebar = $lunas[0] / 12 * 100;
                      if ($lebar <= 45) $progress = "progress-bar bg-danger";
                      elseif ($lebar <= 65) $progress = "progress-bar bg-warning";
                      elseif ($lebar <= 75) $progress = "progress-bar bg-info";
                      elseif ($lebar <= 100) $progress = "progress-bar bg-success";
                      if ($lunas[0] == 12) $katakata = "SPP Lunas&nbsp;";
                      elseif ($lunas[0] < 12) $katakata = "SPP Dibayar $lunas[0] bulan&nbsp;";

                    ?>
                      <div class="card">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExamplexx" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplexx">
                          <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran SPP Kelas <?= $kelas; ?> / <?= $namakelas ?> [Tahun <?= $tahunanggaran; ?>/<?= $nexttahunanggaran; ?>]</h6>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div><?= $katakata ?></div>
                            </div>
                            <div class="col">
                              <div class="progress progress-sm mr-2">
                                <div class="<?= $progress ?>" role="progressbar" style="width: <?= $lebar ?>%" aria-valuenow="<?= $lunas[0] ?>" aria-valuemin="0" aria-valuemax="12"></div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExamplexx" style="">
                          <div class="card-body">
                            <?php include "tampildata_user.php"; ?>
                          </div>
                        </div>
                      </div>


                    <?php
                    }
                    if ($hasil['kls12'] != NULL) {
                      $kelas = 12;
                      $namakelas = $hasil['kls12'];
                      $tahunanggaran = $tahunanggaran + 1;
                      $nexttahunanggaran = $nexttahunanggaran + 1;

                      $ceklunas = mysqli_query($conn, "select count(tglbayar) from pembayaran where tglbayar!=0 and kelas=12 and id_siswa=$id_siswa");
                      $lunas = mysqli_fetch_array($ceklunas);
                      $lebar = $lunas[0] / 12 * 100;
                      if ($lebar <= 45) $progress = "progress-bar bg-danger";
                      elseif ($lebar <= 65) $progress = "progress-bar bg-warning";
                      elseif ($lebar <= 75) $progress = "progress-bar bg-info";
                      elseif ($lebar <= 100) $progress = "progress-bar bg-success";
                      if ($lunas[0] == 12) $katakata = "SPP Lunas&nbsp;";
                      elseif ($lunas[0] < 12) $katakata = "SPP Dibayar $lunas[0] bulan&nbsp;";

                    ?>
                      <div class="card ">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExamplexxx" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplexxx">
                          <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran SPP Kelas <?= $kelas; ?> / <?= $namakelas ?> [Tahun <?= $tahunanggaran; ?>/<?= $nexttahunanggaran; ?>]
                          </h6>

                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div><?= $katakata ?></div>
                            </div>
                            <div class="col">
                              <div class="progress progress-sm mr-2">
                                <div class="<?= $progress ?>" role="progressbar" style="width: <?= $lebar ?>%" aria-valuenow="<?= $lunas[0] ?>" aria-valuemin="0" aria-valuemax="12"></div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExamplexxx" style="">
                          <div class="card-body">
                            <?php include "tampildata_user.php"; ?>
                          </div>
                        </div>
                      </div>

                    <?php
                    }

                    ?>




                  <?php }
                  ?>


                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h5 class="m-0 font-weight-bold text-primary">Cetak Data Laporan Sudah Lunas</h5>
                    </div>
                    <div class="card-body">
                      <form action="cetak_laporan2.php?id_siswa=<?=$id_siswa?>" method="get" target="_blank">
                        <div class="form-group row">
                          <div class="col-sm-2 mb-3 mb-sm-0">
                            <input type="date" name="awal" class="form-control mb-2">
                            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>" class="form-control mb-2">
                          </div>
                          <div class="col-sm-2 mb-3 mb-sm-0">
                            <input type="date" name="akhir" class="form-control mb-2">
                          </div>
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary" name="cetak">Cetak</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>


                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h5 class="m-0 font-weight-bold text-primary">Cetak Data Laporan Belum Dibayar</h5>
                    </div>
                    <div class="card-body">
                      <form action="cetak_laporan_blm_bayar.php" method="get" target="_blank">
                        <div class="form-group row">
                          <div class="col-sm-2 mb-3 mb-sm-0">
                            <input type="date" name="awal" class="form-control mb-2">
                            <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>" class="form-control mb-2">
                          </div>
                          <div class="col-sm-2 mb-3 mb-sm-0">
                            <input type="date" name="akhir" class="form-control mb-2">
                          </div>
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary" name="cetak">Cetak</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
                <!-- /.container-fluid -->

              </div>
              <!-- End of Main Content -->

              <!-- Footer -->
              <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Siti Fatimah 32192001</span>
                  </div>
                </div>
              </footer>
              <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

          </div>
          <!-- End of Page Wrapper -->

          <!-- Scroll to Top Button-->
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>

          <!-- Logout Modal-->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ingin Keluar?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                  </button>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Bootstrap core JavaScript-->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="js/sb-admin-2.min.js"></script>

          <!-- Page level plugins -->
          <script src="vendor/chart.js/Chart.min.js"></script>

          <!-- Page level custom scripts -->
          <script src="js/demo/chart-area-demo.js"></script>
          <script src="js/demo/chart-pie-demo.js"></script>
          <script src="vendor/datatables/jquery.dataTables.min.js"></script>
          <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>
          <script type="text/javascript" src="js/popper.min.js"></script>

          <!-- Page level custom scripts -->
          <script src="js/demo/datatables-demo.js"></script>

  </body>

  </html>