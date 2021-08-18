<body class="white-content">
  <div class="wrapper">
    <div class="sidebar" data-color="blue" style="margin-top:95px; padding-bottom:10px;">

      <div class="sidebar-wrapper">
        
        <div class="ml-3 mt-4"><a style="color:white; font-size:24px; margin-top:-10px; margin-left:-15px;" class="nav-link" href="<?= base_url() ?>"><b>Dashboard Pelanggan</b></a></div>
        <hr style="background-color:white; margin-left:15px; margin-right:15px;">
        
        <?php if (!empty($kategori)) { ?>
            
            <ul class="nav">

                <?php foreach ($kategori as $kat) : ?>
                  <li class="nav-item"><a style="text-transform: none; font-size:15px; margin-top:-5px;" class="nav-link" href="<?= base_url('home/filter/').$kat->idkategori ?>">&bull; <?= $kat->kategori ?></a></li>
                <?php endforeach; ?>

            </ul>

        <?php } ?>

        <hr style="background-color:white; margin-left:15px; margin-right:15px;">
        
      </div>
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg sticky-top bg-default" data-color="blue">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a style="white-space: nowrap; color:white; font-size:24px; margin-bottom:5px; margin-left:-15px;" class="nav-link" href="<?= base_url() ?>">Restoran SMK</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto ">
            
              <div class="search-bar input-group">
              <form action="<?= base_url('home/cari') ?>" method="post">
                <div class="input-group">                
                <input style="background-color: white; border-radius: 25px; height: 35px; margin-top: 5px;" type="text" class="form-control" name="keyword" id="keyword" placeholder="SEARCH">&nbsp;&nbsp;
                    <span class="input-group-addon">
                      <label for="keyword"><i class="tim-icons icon-zoom-split"></i></label>
                    </span>
                </div>
            </form>
            <?php if ($this->session->idpelanggan == null) { ?>
              <a style="margin-left:20px; margin-top:1px; margin-right:20px; color:white; font-size:17px;" class="nav-link" href="<?= base_url('home/daftar') ?>">Daftar</a>
              <div style="margin-right:20px; margin-top:7px; border-left: 1px solid white; height: 30px;"></div>
              <a style="margin-top:1px; margin-right:20px; color:white; font-size:17px;" class="nav-link" href="<?= base_url('login') ?>">Login</a>
                
            <?php } else { ?>
                <a style="margin-left:30px; margin-top:1px; margin-right:20px; color:white; font-size:17px;" class="nav-link" href="<?= base_url('home/histori') ?>"> Histori</a>
                <div style="margin-right:20px; margin-top:7px; border-left: 1px solid white; height: 30px;"></div>
                <a style="margin-top:1px; margin-right:20px; color:white; font-size:17px;" class="nav-link" href="<?= base_url('home/beli_detail') ?>"><?= $this->cart->total_items() ?> Items</a>
                <div style="margin-right:10px; margin-top:7px; border-left: 1px solid white; height: 30px;"></div>
            <?php } ?>
              </div>

              <?php if ($this->session->idpelanggan) { ?>              
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <!-- <div class="photo">
                    <img src="assets/gambar/default-avatar.png">
                  </div> -->
                  <p style="margin-top:1px; margin-right:10px; color:white; font-size:17px;"><?= $this->session->pelanggan ?></p>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>                  
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li>
                  <a style="font-size:15px;" href="<?= base_url('home/ubah/').$this->session->idpelanggan ?>" class="nav-item dropdown-item">Ubah</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li class="nav-link">
                    <a style="font-size:15px;" href="<?= base_url('home/logout') ?>" class="nav-item dropdown-item">Logout</a>
                  </li>
                </ul>
              </li>
              <?php } ?>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- End Navbar -->