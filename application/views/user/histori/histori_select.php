<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-3 border border-secondary">
        <div class="row ml-4">
            <div class="card-header">
                <h3>Histori Pembelian</h3>
            </div>
        </div>

    <div class="card-body">        

            <div class="row text-center">
                <table class="table table-bordered w-70 ml-5 mr-5" style="margin-top:-20px;">
                    <thead class="bg-secondary">
                        <tr>
                            <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                            <th style="text-align: center; color:white; text-transform: capitalize;">Tanggal</th>
                            <th style="text-align: center; color:white; text-transform: capitalize;">Total</th>
                            <th style="text-align: center; color:white; text-transform: capitalize;">Status</th>
                            <th style="text-align: center; color:white; text-transform: capitalize;">Detail</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        if ($order == null) {                
                            echo '
                            <tbody>
                            <tr>
                            <td colspan="5">Tidak Ada Data</td>
                            </tr>
                            </tbody>                
                            </table>
                            ';
                        } else {                
                        $no = $this->uri->segment('3') + 1;
                        foreach ($order as $ord) : ?>
                        <tr>

                        <?php
                        
                            if ($ord->status == 0) {
                                $status = '<td>Belum Lunas</td>';
                            } else {
                                $status = '<td>Lunas</td>';
                            }

                        ?>

                            <td><?php echo $no++ ?></td>
                            <td><?php echo $ord->tglorder ?></td>
                            <td><?php echo $ord->total ?></td>
                            <?= $status ?>
                            <td><a class="btn btn-success btn-sm" href="<?= base_url('home/histori_detail/').$ord->idorder ?>">Detail</a></td>
                        </tr>
                    <?php endforeach;
                    } ?>
                    </tbody>
                </table>
            </div>
        
    </div>


    <div class="row">
        <div class="col-5"></div>

        <div class="col-3">            
                <?= $pagination; ?>            
        </div>

        <div class="col-4"></div>

    </div>   
    </div>   
    
</div>