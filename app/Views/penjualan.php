<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <!--link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/dist/css/adminlte.min.css">


  <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<!-- script src="<?= base_url('AdminLTE')?>/plugins/sweetalert2/sweetalert2.min.js"></script -->
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE')?>/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition layout-top-nav" onload="startTime()">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <span class="brand-text font-weight-light"> <i class="fas fa-shopping-cart text-primary"></i><b> Transaksi Penjualan</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

      <li class="nav-item">
          <?php if (session()->get('level') == '1') { ?>
            <a class="nav-link" href="<?= base_url('Admin')?>">
            <i class="fas fa-tachometer-alt text-primary"></i> Dashboard
          </a>
          <?php } else { ?>
          <a class="nav-link" href="<?= base_url('Home/Logout')?>">
          <i class="fas fa-sign-out-alt text-primary"></i> Logout
          </a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-7">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                   <div class="form-group">
                    <label>Kode User</label>
                    <label class="form-control text-danger"><?= session('kode_user') ?></label>
                 </div>
                </div>

                <div class="col-3">
                   <div class="form-group">
                    <label>Tanggal</label>
                    <label class="form-control text-primary"><?= date('d M Y')?></label>
                 </div>
                </div>

                <div class="col-3">
                   <div class="form-group">
                    <label>Jam</label>
                    <label class="form-control text-primary" id="jam"></label>
                 </div>
                </div>

                <div class="col-3">
                   <div class="form-group">
                    <label>Kasir</label>
                    <label class="form-control text-primary"><?= session('nama') ?></label>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-5">
            <div class="card card-primary card-outline">
              <div class="card-body text-right">
                <label class="display-4">Rp. <?= number_format($sub_total, 0) ?>-</label>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                    <div class="col-2">
                    <input name="nama_pelanggan" class="form-control" id="namaPelanggan" placeholder="Nama Pelanggan">
                  </div>
                    <div class="col-2 input-group">
                    <input name="kode_produk" id="kode_produk" class="form-control" placeholder="Kode Produk" autocomplete="off">
                      <span class="input-group-append">
                      <a class="btn btn-primary" data-toggle="modal" data-target="#cari-produk">
                        <i class="fas fa-search"></i>
                      </button>
                      <button class="btn btn-danger btn-flat" onclick="key.value = ''">
                        <i class="fas fa-times"></i>
                      </button>
                    </span>
                  </div>
                  <div class="col-2">
                    <input name="nama_produk" class="form-control" id="namaProduk" placeholder="Nama Produk" readonly >
                  </div>
                  <div class="col-1">
                  <input id="qty" type="number" min="1" value="1" name="qty" class="form-control" placeholder="Qty">
                  </div>
                  <div class="col-2">
                    <input name="harga_jual" class="form-control" id="harga" placeholder="Harga" readonly>
                  </div>

                  <div class="col-3">
                  <button type="submit" class="btn  btn-primary"><i class="fas fa-shopping-cart"></i> Add</button>
                                                <a href="<?= base_url('Penjualan/ResetCart') ?>" class="btn  btn-warning"><i class="fas fa-sync"></i> Reset</a>
                    <button class="btn btn-flat btn-success"><i class="fas fa-cash-register"></i> Pembayaran</button>
                  </div>
                </div>
              </div>
            </div>
              <hr>
              <div class="row">
              <div class="col-12">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th width="100px">Jumlah</th>
                    <th>Total Harga</th>
                    <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($cart as $key => $value) { ?>
                                                    <tr>
                                                        <td class="text-center"><?= $value['id'] ?></td>
                                                        <td class="text-center"><?= $value['name'] ?></td>
                                                        <td class="text-right">@Rp.<?= number_format($value['price'], 0) ?></td>
                                                        <td class="text-center"><?= $value['qty'] ?></td>
                                                        <td class="text-right">Rp.<?= number_format($value['subtotal'], 0) ?></td>
                                                        <td class="text-center">
                                                            <a class="btn btn-falt btn-danger"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body text-center">
                <h2>Satu Juta Lima Ratus Ribu Rupiah</h2>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->


<!-- Modal Search-->
<div class="modal fade" id="cari-produk">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pencarian Data Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table text-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; 
                            foreach ($produk as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_produk'] ?></td>
                                <td><?= $value['nama_produk'] ?></td>
                                <td><?= $value['harga_jual'] ?></td>
                                <td>
                                    <button onclick="PilihProduk('<?= $value['kode_produk'] ?>')" class="btn btn-success btn-xs">Pilih</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>






    <script>
        $(document).ready(function() {
            $('#kode_produk').focus();
            document.getElementById('terbilang').innerHTML = terbilang(<?= $total_harga ?>) + ' Rupiah';
            $('#kode_produk').keydown(function(e) {
                let kode_produk = $('#kode_produk').val();
                if (e.keyCode == 13) {
                    e.preventDefault();
                    if (kode_produk.length == '') {
                        Swal.fire('Kode Produk belum diinput!!');
                    } else {
                        CekProduk();
                    }
                }
            });

        });

        function CekProduk() {
            $.ajax({
                type: "post",
                url: "<?= base_url('Penjualan/CekProduk') ?>",
                data: {
                    kode_produk: $('#kode_produk').val(),
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.nama_produk == '') {
                        Swal.fire('Kode Produk tidak terdaftar!!');
                    } else {
                        $('[name="nama_produk"]').val(response.nama_produk);
                        $('[name="nama_kategori"]').val(response.nama_kategori);
                        $('[name="satuan"]').val(response.satuan);
                        $('[name="harga_jual"]').val(response.harga_jual);
                        $('qty').focus();
                    }
                }
            });
        }

        function PilihProduk(kode_produk){
            $('#kode_produk').val(kode_produk);
        }
    </script>

    <script>
        window.onload = function() {
            startTime();
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(function() {
                startTime();
            }, 1000);

        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + 1
            }
            return i;
        }
    </script>
  
</body>
</html>
