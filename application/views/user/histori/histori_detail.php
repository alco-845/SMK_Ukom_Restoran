<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-3 border border-secondary">
        <div class="row ml-4">
            <div class="card-header">
                <h3>Detail Pembelian</h3>
            </div>
        </div>

    <div class="card-body">

        <div class="row text-center">
            <table class="table table-bordered w-70 ml-5 mr-5" style="margin-top:-20px;">
                <thead class="bg-secondary">
                    <tr style="text-align: center;">
                        <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                        <th style="text-align: center; color:white; text-transform: capitalize;">Tanggal</th>
                        <th style="text-align: center; color:white; text-transform: capitalize;">Menu</th>
                        <th style="text-align: center; color:white; text-transform: capitalize;">Harga</th>
                        <th style="text-align: center; color:white; text-transform: capitalize;">Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if ($orderdetail == null) {                
                    echo '
                    <tbody>
                    <tr>
                    <td colspan="5">Tidak Ada Data</td>
                    </tr>
                    </tbody>                
                    </table>
                    ';
                } else {             
                    $no=1;
                    foreach ($orderdetail as $ordet) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $ordet->tglorder ?></td>
                        <td><?php echo $ordet->menu ?></td>
                        <td><?php echo $ordet->harga ?></td>
                        <td><?php echo $ordet->jumlah ?></td>            
                    </tr>
                <?php endforeach;?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    
        
    </div>

    </div>       
</div>