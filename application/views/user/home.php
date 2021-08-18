<div class="content" style="padding-top: 8px !important;">

    <div class="row ml-5">
        <h3 class="mt-4">Menu</h3><br>        
    </div>

    <div class="mt-1 mb-5"><?= $this->session->flashdata('message') ?></div>
    
    <div class="row text-center no-gutters" style="margin-top:-15px;">
    <?php
            if ($menu == null) {                
                echo '
                <div class="card mb-4 pt-2 pb-2 border border-secondary w-100">
                <p>Tidak Ada Data</p>
                </div>
                ';
            } else { 
            foreach ($menu as $mnu) : ?>
            <div class="col-lg-3 col-sm-6 p-2">
            <div class="card mb-4 border border-secondary w-100">
            <img style="height:220px; object-fit: fill;" src="<?= base_url() ?>assets/gambar/<?= $mnu->gambar ?>">
                <div class="card-body">
                    <h5 class="card-title">Kategori : <?= $mnu->kategori ?></h5>
                    <h5 class="card-text"><b><?= $mnu->menu ?></b></h5>
                    <p class="card-text"><?= $mnu->harga ?></p>
                    <a class="btn btn-info" href="<?= base_url('home/beli/').$mnu->idmenu ?>" role="button">Beli</a>
                </div>
                </div>
            </div>

        <?php endforeach;?>
        <?php } ?>
        </div>

    <div class="row mr-5">
        <div class="col-5"></div>

        <div class="col-3">            
                <?= $pagination; ?>            
        </div>

        <div class="col-4"></div>
    </div>   
    
</div>