<!doctype html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$nama = ($this->session->userdata['logged_in']['nama']);
} else {
header("location: " . base_url('index.php/user_authentication/'));
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
          <a class="nav-link" href="<?php echo base_url('index.php/user_authentication/logout'); ?>">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('index.php/user_authentication/dasbor'); ?>">
                  <span data-feather="home"></span>
                  Dasbor 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Daftar karya 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('index.php/user_authentication/profil'); ?>">
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
            <h1 class="h2">Tulis karya Anda</h1>
          </div>
    <!--<form action="<?php //echo base_url('index.php/user_authentication/unggahKarya'); ?>" method="post" <?php //echo form_open_multipart(base_url('index.php/user_authentication/unggahKarya'))?>-->
    <?php echo form_open_multipart(base_url('index.php/user_authentication/unggahKarya')) ?>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul karya</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul karya">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Kategori karya</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="cerpen" checked>
          <label class="form-check-label" for="gridRadios1">
            Cerpen
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="novel">
          <label class="form-check-label" for="gridRadios2">
            Novel
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="puisi">
          <label class="form-check-label" for="gridRadios3">
            Puisi
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Masukkan gambar sampul (format file : gif,png,jpg,svg)</div>
        <div class="col-sm-10">
            <div class="form-group">
            <input type="file" class="form-control-file" id="gambar" name="gambarsampul">
        </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Tulis karya Anda</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="konten"></textarea>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="upload" class="btn btn-primary">Unggah karya</button>
    </div>
  </div>
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