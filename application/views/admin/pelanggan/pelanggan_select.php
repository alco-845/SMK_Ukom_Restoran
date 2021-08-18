<div class="content" style="padding-top: 8px !important;">
            
            <div class="card mt-3 border border-secondary">
            
                    <div class="row ml-4">
                        <div class="card-header">
                            <h3>Pelanggan</h3>
                        </div>
                    </div>

                    <div class="card-body">        

                    <div class="row text-center">
                        <table class="table table-bordered w-70 ml-5 mr-5" style="margin-top:-20px;">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Pelanggan</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Alamat</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Telp</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Email</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Action</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Status</th>
                                </tr>

                                <?php
                                if ($pelanggan == null) {                
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
                                    foreach($pelanggan as $pel) : ?>
                                    
                                <tbody>
                                    <tr style="text-align: center;">

                                        <?php 
                                    
                                        if ($pel->aktif == 1) {
                                            $status = 'Aktif';
                                            $warna = 'btn-info';
                                        } else {
                                            $status = 'Banned';
                                            $warna = 'btn-warning';
                                        }                                       
                                        
                                        ?>

                                        <td><?= $no++; ?></td>
                                        <td><?= $pel->pelanggan ?></td>
                                        <td><?= $pel->alamat ?></td>
                                        <td><?= $pel->telp ?></td>
                                        <td><?= $pel->email ?></td>
                                        <td onclick="javasript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/pelanggan/hapus/'.$pel->idpelanggan, '<div class="btn btn-danger btn-m"><i class="fa fa-trash"></i></div>')?></td>
                                        <td><?= anchor('admin/pelanggan/update/'.$pel->idpelanggan,'<div class="btn '.$warna.' btn-m">'.$status.'</div>') ?></td>
                                    </tr>
                                    <?php
                                        endforeach; ?>
                                </tbody>
                            </thead>    
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