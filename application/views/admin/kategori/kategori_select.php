    <div class="content" style="padding-top: 8px !important;">
            
            <div class="card mt-3 border border-secondary">
            
                    <div class="row ml-4">
                        <div class="card-header">
                            <h3>Kategori</h3>
                        </div>
                    </div>

                    <div class="card-body">        
                    <a style="margin-top: -40px;" class="btn btn-info ml-4 btn-round" href="<?= base_url('admin/kategori/tambah') ?>" role="button"><i class="fas fa-plus fa-sm"></i> Tambah Data</a>

                    <div class="row text-center">
                        <table class="table table-bordered w-70 ml-5 mr-5 mt-3">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Kategori</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;" colspan="2">Action</th>
                                </tr>
                            </thead>

                            <?php
                            if ($kategori == null) {                
                                echo '
                                <tbody>
                                <tr>
                                <td colspan="4" style="text-align: center;">Tidak Ada Data</td>
                                </tr>
                                </tbody>                
                                </table>
                                ';
                            } else {                
                                $no = $this->uri->segment('4') + 1;
                                foreach($kategori as $kat) : ?>

                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $kat->kategori ?></td>
                                    <td onclick="javasript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/kategori/hapus/'.$kat->idkategori, '<div class="btn btn-danger btn-m"><i class="fa fa-trash"></i></div>')?></td>
                                    <td><?= anchor('admin/kategori/ubah/'.$kat->idkategori,'<div class="btn btn-success btn-m"><i class="fa fa-edit"></i></div>') ?></td>
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
