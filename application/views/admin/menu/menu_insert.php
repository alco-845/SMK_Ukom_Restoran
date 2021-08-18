<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-5 border border-secondary w-50" style="margin:auto;">
        
        <div class="row ml-4">
            <div class="card-header" style="margin:auto;">
                <h3 class="ml-1 mr-5">Insert Menu</h3>
            </div>
        </div>

            <div class="card-body ml-4 mr-4" style="margin-top:-25px;">                

                <form action="<?= base_url('admin/menu/proses_tambah') ?>" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label style="font-size:15px;">Kategori</label><br>
                        <select name="idkategori" class="form-control">
                    
                            <?php foreach ($kategori as $kat) : ?>
                            <option value="<?= $kat->idkategori ?>"><?= $kat->kategori ?></option>
                            <?php endforeach; ?>
                    
                        </select>
                    </div>
                
                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Nama Menu</label>
                        <input type="text" name="menu" required class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label style="font-size:15px;">Harga</label>
                        <input type="number" name="harga" required class="form-control">
                    </div>

                    <div class="form-group mt-4 w-50">
                        <label style="font-size:15px;">Upload Foto</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="form-group mt-4 text-center">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-lg btn-block">
                    </div>
                
                </form>
            
            </div>
        </div>
    </div>