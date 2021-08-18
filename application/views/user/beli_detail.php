<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-3 border border-secondary">
        <div class="row ml-4">
            <div class="card-header">
            <h3>Keranjang</h3>
            </div>
        </div>

    <div class="card-body">        

        <table class="table table-bordered w-70" style="margin-top:-20px;">
            <thead class="bg-secondary">
                <tr>
                    <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                    <th style="text-align: center; color:white; text-transform: capitalize;">Menu</th>
                    <th style="text-align: center; color:white; text-transform: capitalize;">Harga</th>
                    <th style="text-align: center; color:white; text-transform: capitalize;">Jumlah</th>
                    <th style="text-align: center; color:white; text-transform: capitalize;">Hapus</th>
                    <th style="text-align: center; color:white; text-transform: capitalize;">Total</th>
                </tr>
            </thead>

            <tbody>
            <?php
            if ($cart == null) {                
                echo '
                <tbody>
                <tr>
                <td colspan="6" style="text-align: center;">Keranjang Kosong</td>
                </tr>
                </tbody>                
                </table>
                ';
            } else {                
                $total = 0;
                $no=1;
                foreach ($cart as $item) : ?>
                <tr style="text-align: center;">
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td>
                        <?php echo anchor('home/beli_tambah/' .$item['rowid'], '<div class="btn btn-success btn-sm" id="btn_plus"><i class="fa fa-plus"></i></div>'); ?>&nbsp;&nbsp;
                        <input style="width:50px; text-align:center;" type="text" disabled value="<?php echo $item['qty'] ?>">&nbsp;&nbsp;
                        <?php echo anchor('home/beli_kurang/' .$item['rowid'], '<div class="btn btn-success btn-sm" id="btn_minus"><i class="fa fa-minus"></i></div>'); ?>
                    </td>
                    <td><a class="btn btn-danger btn-sm" href="<?= base_url('home/beli_hapus/').$item['rowid'] ?>">Hapus</a></td>
                    <td><?php echo $item['subtotal'] ?></td>
                </tr>
                <?php 
                
                $total = $total + $item['subtotal']; 
            
                endforeach; ?>
                <tr>
                    <td colspan="5"><h3>Total :</h3></td>

                    <td style="text-align: center;"><h4><?= $total ?></h4></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        
        <?php if (!empty($total)) { ?>
            <div onclick="javasript: return confirm('Anda Yakin Ingin Melakukan Checkout?')"><?= anchor('home/checkout', '<div class="btn btn-default btn-m">Checkout</div>')?></div>
        <?php } ?>
        
    </div>

    </div>       
</div>