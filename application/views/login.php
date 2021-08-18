<div class="content" style="padding-left: 400px !important; padding-right: 400px !important;">

    <div class="card border border-secondary w-70" style="background-color:#e9ecef;">

        <div class="card-body">        
            <div class="row">
            <div class="col-lg-9 col-sm-6 p-5" style="margin:auto;">
                    <div class="form-group">

                        <?= $this->session->flashdata('message') ?>

                        <form action="<?= base_url('login/auth') ?>" method="post">
                            
                            <h3 style="color:black; margin-bottom:15px;" class="text-center">Login Restoran</h3>

                            <div class="form-group">
                                <label style="font-size:15px; color:black;">Email</label>
                                <input type="email" name="email" required class="form-control" style="color:black;">
                            </div>

                            <div class="form-group">
                                <label style="font-size:15px; color:black;">Password</label>
                                <input type="password" name="password" required class="form-control" style="color:black;">
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" name="login" value="Login" class="btn btn-info btn-lg btn-block">
                            </div>

                        </form>

                        <div><a style="margin-left:40px;" class="nav-link text-primary mt-3" href="<?= base_url() ?>"><b>Kembali Ke Dashboard Pelanggan</b></a></div>

                    </div>
                </div>
            </div>        
        </div>
        
    </div>       
</div>