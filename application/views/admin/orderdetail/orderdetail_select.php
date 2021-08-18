<div class="content" style="padding-top: 8px !important;">
            
            <div class="card mt-3 border border-secondary">
            
                    <div class="row ml-4">
                        <div class="card-header">
                            <h3>Order Detail</h3>
                        </div>
                    </div>

                    <div class="card-body" style="margin-top:-25px;">        
                        <form action="<?= base_url('admin/orderdetail/index') ?>" method="post">

                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col">
                                    <div class="form-group w-70">
                                        <label>Tanggal Awal</label>
                                        <input type="date" name="tawal" required class="form-control">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group w-70">
                                        <label>Tanggal Akhir</label>
                                        <input type="date" name="takhir" required class="form-control">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group"><br>
                                        <input type="submit" name="cari" value="Cari" class="btn btn-info">
                                    </div>
                                </div>
                            </div>
                        </div>        
                    
                        </form><br>

                        <div class="row text-center">
                            <table class="table table-bordered w-70 ml-5 mr-5">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Pelanggan</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Tanggal</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Menu</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Harga</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Jumlah</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Total</th>
                                    </tr>
                                </thead>

                                <?php
                                if ($orderdetail == null) {                
                                    echo '
                                    <tbody>
                                    <tr>
                                    <td colspan="7" style="text-align: center;">Tidak Ada Data</td>
                                    </tr>
                                    </tbody>                
                                    </table>
                                    ';
                                } else {    
                                    $total = 0;            
                                    $no = $this->uri->segment('4') + 1;
                                    foreach($orderdetail as $ordet) : ?>
                                
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $ordet->pelanggan ?></td>
                                        <td><?= $ordet->tglorder ?></td>
                                        <td><?= $ordet->menu ?></td>
                                        <td><?= $ordet->hargajual ?></td>
                                        <td><?= $ordet->jumlah ?></td>
                                        <td><?= $ordet->jumlah * $ordet->harga ?></td>

                                        <?php 
                                
                                            $total = $total + ($ordet->jumlah * $ordet->harga); 
                                        
                                        ?>
                                    </tr>

                                    <?php
                                        endforeach; ?>
                                        <tr>
                                            <td style="text-align: left;" colspan="6"><h3>Grand Total :</h3></td>
                        
                                            <td><h4><?= $total ?></h4></td>
                                        </tr>
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