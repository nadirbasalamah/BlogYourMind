<!doctype html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$nama = ($this->session->userdata['logged_in']['nama']);
$passwd = ($this->session->userdata['logged_in']['password']);
} else {
header("location: " . base_url('index.php/Pengguna/'));
}
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman dasbor</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BlogYourMind</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/logout'); ?>">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/dasbor'); ?>">
                  <span data-feather="home"></span>
                  Dasbor <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/Pengguna/lihatPostingan'); ?>">
                  <span data-feather="file"></span>
                  Daftar karya
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  active" href="<?php echo base_url('index.php/Pengguna/profil'); ?>">
                  <span data-feather="users"></span>
                  Sunting profil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Daftar favorit
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Profil Anda</h1>
          </div>
          <!--form profil-->
    <form action="<?php echo base_url('index.php/Pengguna/editProfil'); ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Ganti nama pengguna</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ganti nama pengguna dengan nama yang baru" value=<?php echo $nama?>>
  </div>
  <div class="form-group">
        <label for="exampleInputPassword1">Ganti password</label>
        <input type="password"  name="passwd" class="form-control" id="exampleInputPassword1" placeholder="Ganti password dengan password yang baru" value=<?php echo $passwd?>>
  </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="<?php echo base_url(); ?>assets/js/vendor/popper.min.js"></script>
          <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
          <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
          <script>feather.replace()</script>
        </main>
      </div>
    </div>
  </body>
</html>
