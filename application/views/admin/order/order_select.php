<div class="content" style="padding-top: 8px !important;">
            
            <div class="card mt-3 border border-secondary">
            
                    <div class="row ml-4">
                        <div class="card-header">
                            <h3>Order</h3>
                        </div>
                    </div>

                    <div class="card-body">        

                    <div class="row text-center">
                        <table class="table table-bordered w-70 ml-5 mr-5" style="margin-top:-20px;">
                            <thead class="bg-secondary">
                                <tr>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Pelanggan</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Tanggal</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Total</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Bayar</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Kembali</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Status</th>
                                    <th style="text-align: center; color:white; text-transform: capitalize;">Metode</th>
                                </tr>
                            </thead>

                            <?php
                            if ($order == null) {                
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
                                foreach($order as $ord) : ?>

                            <tbody>
                                <tr style="text-align: center;">
                                    
                                <?php
                        
                                if ($ord->status == 0) {
                                    $status = '<td><a class="btn btn-danger btn-link" href="order/ubah/'.$ord->idorder.'">Belum Bayar</a></td>';
                                } else {
                                    $status = '<td>Lunas</td>';
                                }

                                ?>

                                    <td><?= $no++; ?></td>
                                    <td><?= $ord->pelanggan ?></td>
                                    <td><?= $ord->tglorder ?></td>
                                    <td><?= $ord->total ?></td>
                                    <td><?= $ord->bayar ?></td>
                                    <td><?= $ord->kembali ?></td>
                                    <?= $status ?>
                                    <td><?= $ord->metode ?></td>
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