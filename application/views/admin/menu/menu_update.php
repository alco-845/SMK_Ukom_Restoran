<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-5 border border-secondary w-50" style="margin:auto;">
        
        <div class="row ml-4">
            <div class="card-header" style="margin:auto;">
                <h3 class="ml-1 mr-5">Update Menu</h3>
            </div>
        </div>

            <div class="card-body ml-4 mr-4" style="margin-top:-25px;">                

                <?php foreach($menu as $men) : ?>
                    
                    <?= form_open_multipart('admin/menu/proses_ubah'); ?>

                        <input type="hidden" name="menu_id" value="<?= $men->idmenu ?>" class="form-control">
                    
                        <div class="form-group">
                            <label style="font-size:15px;">Kategori</label><br>
                            <select name="idkategori_update" class="form-control">
                        
                                <?php foreach ($kategori as $kat) : ?>
                                    <option <?php if ($idkategori == $kat->idkategori) echo "selected" ?> value="<?php echo $kat->idkategori ?>"><?php echo $kat->kategori ?></option>            
                                <?php endforeach; ?>
                        
                            </select>
                        </div>
                    
                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Nama Menu</label>
                            <input type="text" name="menu_update" required value="<?= $men->menu ?>" class="form-control">
                        </div>

                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Harga</label>
                            <input type="number" name="harga_update" required value="<?= $men->harga ?>" class="form-control">
                        </div>

                        <div class="form-group mt-4 w-50">
                            <label style="font-size:15px;">Upload Foto</label><br>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <div class="form-group mt-4 text-center">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-info btn-lg btn-block">
                        </div>

                <?php endforeach; ?>        

            </div>
        </div>
    </div>