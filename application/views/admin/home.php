<div class="content" style="padding-top: 18px !important;">

    <div class="mb-2"><?= $this->session->flashdata('message') ?></div>

    <div class="card pt-2 pb-2 border border-secondary">
        <div class="row ml-4" >
            <h3 style="margin-bottom:auto;">Dashboard Admin</h3>
        </div>
    </div>

    <?php 
            
        $level = $this->session->level;
        
        switch ($level) {
            case 'admin': ?>
                <div class="row no-gutters" style="margin-top:-20px;">
    
    <div class="col-xl-3 col-lg-6 col-sm-12 p-4">
        <div class="card mb-4 border border-secondary bg-primary">
            <div class="card-body" style="color:white; font-size:18px;">
                <h3 style="color:white;" class="card-title">Menu</h3>
                <p style="color:white;" class="card-text">Total Data : <b><?= $menu ?></b></p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-sm-12 p-4">
        <div class="card mb-4 border border-secondary bg-primary">
            <div class="card-body" style="color:white; font-size:18px;">
                <h3 style="color:white;" class="card-title">Pelanggan</h3>
                <p style="color:white;" class="card-text">Total Data : <b><?= $pelanggan ?></b></p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-sm-12 p-4">
        <div class="card mb-4 border border-secondary bg-primary">
            <div class="card-body" style="color:white; font-size:18px;">
                <h3 style="color:white;" class="card-title">User</h3>
                <p style="color:white;" class="card-text">Total Data : <b><?= $user ?></b></p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-sm-12 p-4">
        <div class="card mb-4 border border-secondary bg-primary">
            <div class="card-body" style="color:white; font-size:18px;">
                <h3 style="color:white;" class="card-title">Order</h3>
                <p style="color:white;" class="card-text">Total Data : <b><?= $order ?></b></p>
            </div>
        </div>
    </div>
                <?php break;

            case 'kasir': ?>
                <div class="col-xl-3 col-lg-6 col-sm-12 p-4">
        <div class="card mb-4 border border-secondary bg-primary">
            <div class="card-body" style="color:white; font-size:18px;">
                <h3 style="color:white;" class="card-title">Order</h3>
                <p style="color:white;" class="card-text">Total Data : <b><?= $order ?></b></p>
            </div>
        </div>
    </div>
                <?php break;

            case 'koki':
                break;
            
            default:
                break;
        }
              
    ?>        

    </div>    
    
</div>