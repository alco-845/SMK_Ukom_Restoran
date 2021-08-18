<div class="content" style="padding-top: 8px !important;">
        
        <div class="card mt-3 border border-secondary">
        
                <div class="row ml-4">
                    <div class="card-header">
                        <h3>Menu</h3>
                    </div>
                </div>

                <div class="card-body">        
                    <a style="margin-top: -40px;" class="btn btn-info ml-4 btn-round" href="<?= base_url('admin/menu/tambah') ?>" role="button"><i class="fas fa-plus fa-sm"></i> Tambah Data</a>

                    <form action="<?= base_url('admin/menu/index') ?>" method="post">
                    
                    <select name="opsi" onchange="form.submit()" class="form-control mt-3 w-50" style="margin-left:22px;">
                            
                        <?php foreach ($kategori as $kat) : ?>
                            <option <?php if ($opsi == $kat->idkategori) echo "selected" ?> value="<?= $kat->idkategori ?>"><?= $kat->kategori ?></option>
                        <?php endforeach; ?>
                
                    </select>
                    
                    </form>

                    <div class="row text-center">
                        <table class="table table-bordered w-70 ml-5 mr-5 mt-4">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Kategori</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Menu</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Harga</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Gambar</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;" colspan="2">Action</th>
                                </tr>
                            </thead>

                            <?php
                            if ($menu == null) {                
                                echo '
                                <tbody>
                                <tr>
                                <td colspan="7" style="text-align: center;">Tidak Ada Data</td>
                                </tr>
                                </tbody>                
                                </table>
                                ';
                            } else {                
                                $no = $this->uri->segment('4') + 1;
                                foreach($menu as $men) : ?>

                            <tbody>
                                <tr style="text-align: center;">
                                    <td><?= $no++; ?></td>
                                    <td><?= $men->kategori ?></td>
                                    <td><?= $men->menu ?></td>
                                    <td><?= $men->harga ?></td>
                                    <td><img style="width:150px; height:150px;" src="<?= base_url() ?>assets/gambar/<?= $men->gambar ?>"></td>
                                    <td onclick="javasript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/menu/hapus/'.$men->idmenu, '<div class="btn btn-danger btn-m"><i class="fa fa-trash"></i></div>')?></td>
                                    <td><?= anchor('admin/menu/ubah/'.$men->idmenu,'<div class="btn btn-success btn-m"><i class="fa fa-edit"></i></div>') ?></td>
                                </tr>
                                <?php
                                    endforeach; ?>
                            </tbody>
                        </table>
                        <?php
                            }
                        ?>
                        </div>
                </div>
                

            <div class="row mb-3">
                <div class="col-5"></div>

                <div class="col-3">            
                        <?= $pagination; ?>            
                </div>

                <div class="col-4"></div>
            </div>   

        </div>       
