<div class="content" style="padding-top: 8px !important;">

    <div class="card mt-5 border border-secondary w-50" style="margin:auto;">
        
        <div class="row ml-4">
            <div class="card-header" style="margin:auto;">
                <h3 class="ml-1 mr-5">Bayar</h3>
            </div>
        </div>

            <div class="card-body ml-4 mr-4" style="margin-top:-45px;">                

                <div class="mt-3 mb-2"><?= $this->session->flashdata('message') ?></div>

                <?php foreach($order as $ord) : ?>

                    <form action="<?= base_url('admin/order/proses_ubah') ?>" method="post">

                        <input type="hidden" name="order_id" value="<?= $ord->idorder ?>" class="form-control">
                    
                        <div class="form-group">
                            <label style="font-size:15px;">Total</label>
                            <input type="text" name="total_update" disabled value="<?= $ord->total ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label style="font-size:15px;">Bayar</label>
                            <input type="text" name="bayar_update" required value="<?= $ord->kembali ?>" class="form-control">                    
                        </div>

                        <div class="form-group mt-4">
                            <label style="font-size:15px;">Metode Pembayaran</label>
                            <select name="metode" class="form-control">
                                <option value="Tunai">Tunai</option>
                                <option value="Kartu Kredit">Kartu Kredit</option>
                            </select>
                        </div>

                        <div class="form-group mt-4 text-center">
                            <input type="submit" name="simpan" value="Bayar" class="btn btn-info btn-lg btn-block">
                        </div>
                    
                    </form>

                <?php endforeach; ?>

            </div>
        </div>
    </div>