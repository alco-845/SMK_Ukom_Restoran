<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-5 border border-secondary w-50" style="margin:auto;">
        
        <div class="row ml-4">
            <div class="card-header" style="margin:auto;">
                <h3 class="ml-1 mr-5">Update User</h3>
            </div>
        </div>

            <div class="card-body ml-4 mr-4" style="margin-top:-45px;">                
                <div class="mt-3 mb-2"><?= $this->session->flashdata('message') ?></div>

                <?php foreach($user as $usr) : ?>

                    <form action="<?= base_url('admin/user/proses_ubah') ?>" method="post">

                        <input type="hidden" name="user_id" value="<?= $usr->iduser ?>" class="form-control">
                        
                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Nama User</label>
                            <input type="text" name="user_update" required value="<?= $usr->user ?>" class="form-control">
                        </div>

                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Email</label>
                            <input type="email" name="email_update" required value="<?= $usr->email ?>" class="form-control">
                        </div>

                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Password</label>
                            <input type="password" name="password_update" required class="form-control">
                        </div>

                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_update" required class="form-control">
                        </div>                        

                        <div class="form-group mt-4 text-center">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-lg btn-block">
                        </div>

                    </form>

                <?php endforeach; ?>

                </div>
            </div>
        </div>