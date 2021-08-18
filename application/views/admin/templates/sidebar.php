<body class="white-content">
  <div class="wrapper">
    <div class="sidebar" data-color="blue" style="margin-top:95px; padding-bottom:10px;">

      <div class="sidebar-wrapper">
        
        <div class="ml-3 mt-4"><a style="color:white; font-size:24px; margin-top:-10px; margin-left:-15px;" class="nav-link" href="<?= base_url('admin') ?>"><b>Dashboard Admin</b></a></div>
        <hr style="background-color:white; margin-left:15px; margin-right:15px;">
    
            <ul class="nav">
            <?php 
            $level = $this->session->level;
            switch ($level) {
              case 'admin':
                ?>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/kategori') ?>">&bull; Kategori</a></li><br>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/menu') ?>">&bull; Menu</a></li><br>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/pelanggan') ?>">&bull; Pelanggan</a></li><br>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/order') ?>">&bull; Order</a></li><br>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/orderdetail') ?>">&bull; Order Detail</a></li><br>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/user') ?>">&bull; User</a></li>
                <?php
                break;

              case 'kasir':
                ?>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/order') ?>">&bull; Order</a></li><br>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/orderdetail') ?>">&bull; Order Detail</a></li><br>
                <?php
                break;

              case 'koki':
                ?>
                <li class="nav-item"><a style="text-transform: none; font-size:18px; margin-top:-5px;" class="nav-link" href="<?= base_url('admin/orderdetail') ?>">&bull; Order Detail</a></li><br>
                <?php
                break;
              
              default:
                echo 'Tidak Ada Menu';
                break;
            }
            ?>                
            </ul>

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
            <a style="white-space: nowrap; color:white; font-size:24px; margin-bottom:5px; margin-left:-15px;" class="nav-link" href="<?= base_url('admin') ?>">Restoran SMK</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto ">
                        
              <div class="search-bar input-group">

              <?php 
            
              $level = $this->session->level;

              if ($level == 'admin') { ?>
                <form action="<?= base_url('admin/home/cari') ?>" method="post">
                    <div class="input-group">                
                    <input style="background-color: white; border-radius: 25px; height: 35px; margin-top: 5px;" type="text" class="form-control" name="keyword" id="keyword" placeholder="SEARCH">&nbsp;&nbsp;
                        <span class="input-group-addon">
                          <label for="keyword"><i class="tim-icons icon-zoom-split"></i></label>
                        </span>
                    </div>
                </form>
              <?php }?>                          

                <p style="margin-left:20px; margin-top:-1px; margin-right:20px; color:white; font-size:17px;" class="nav-link">Level&nbsp; : &nbsp;<?= $this->session->level ?></p>
                <div style="margin-right:10px; margin-top:5px; border-left: 1px solid white; height: 30px;"></div>
              </div>

              
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <!-- <div class="photo">
                    <img src="assets/gambar/default-avatar.png">
                  </div> -->
                  <p style="margin-top:-1px; margin-right:10px; color:white; font-size:17px;"><?= $this->session->user ?></p>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>                  
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li>
                  <a style="font-size:15px;" href="<?= base_url('admin/user/ubah/').$this->session->iduser ?>" class="nav-item dropdown-item">Ubah</a>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li class="nav-link">
                    <a style="font-size:15px;" href="<?= base_url('admin/home/logout') ?>" class="nav-item dropdown-item">Logout</a>
                  </li>
                </ul>
              </li>

              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>      
      <!-- End Navbar -->