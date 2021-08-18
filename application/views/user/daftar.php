<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-5 border border-secondary w-50" style="margin:auto;">
        
        <div class="row ml-4">
            <div class="card-header" style="margin:auto;">
                <h3 class="ml-1 mr-5">Daftar</h3>
            </div>
        </div>

            <div class="card-body ml-4 mr-4" style="margin-top:-45px;">                
                <div class="mt-3 mb-2"><?= $this->session->flashdata('message') ?></div>

                <form action="<?= base_url('home/daftar_proses') ?>" method="post">
                
                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Pelanggan</label>
                        <input type="text" name="pelanggan" required class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Alamat</label>
                        <input type="text" name="alamat" required class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label style="font-size:15px;">No. Telepon</label>
                        <input type="number" name="telp" required class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Email</label>
                        <input type="email" name="email" required  class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Password</label>
                        <input type="password" name="password" required  class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Konfirmasi Password</label>
                        <input type="password" name="konfirmasi" required  class="form-control">
                    </div>

                    <div class="form-group mt-4 text-center">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-lg btn-block">
                    </div>
                
                </form>    

            </div>
        </div>
    </div>