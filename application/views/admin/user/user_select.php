<div class="content" style="padding-top: 8px !important;">
            
            <div class="card mt-3 border border-secondary">
            
                    <div class="row ml-4">
                        <div class="card-header">
                            <h3>User</h3>                            
                        </div>
                    </div>

                    <div class="card-body">        
                        <a style="margin-top: -40px;" class="btn btn-info ml-4 btn-round" href="<?= base_url('admin/user/tambah') ?>" role="button"><i class="fas fa-plus fa-sm"></i> Tambah Data</a>

                        <div class="row text-center">
                            <table class="table table-bordered w-70 ml-5 mr-5 mt-3">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">No</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">User</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Email</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Level</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Action</th>
                                        <th style="text-align: center; color:white; text-transform: capitalize;">Status</th>
                                    </tr>

                                    <?php
                                    if ($user == null) {                
                                        echo '
                                        <tbody>
                                        <tr>
                                        <td colspan="6" style="text-align: center;">Tidak Ada Data</td>
                                        </tr>
                                        </tbody>                
                                        </table>
                                        ';
                                    } else {                
                                        $no = $this->uri->segment('4') + 1;
                                        foreach($user as $usr) : ?>
                                        
                                    <tbody>
                                        <tr>

                                            <?php 
                                        
                                            if ($usr->aktif == 1) {
                                                $status = 'Aktif';
                                                $warna = 'btn-info';
                                            } else {
                                                $status = 'Banned';
                                                $warna = 'btn-warning';
                                            }                        
                                            
                                            ?>

                                            <td><?= $no++; ?></td>
                                            <td><?= $usr->user ?></td>
                                            <td><?= $usr->email ?></td>
                                            <td>
                                                <form action="<?= base_url('admin/user/ubah_level/'.$usr->iduser) ?>" method="post">
                        
                                                    <select name="level_update" onchange="form.submit()" class="form-control">
                                                        <?php foreach ($arr_level as $lvl) : ?>
                                                            <option <?php if ($usr->level == $lvl) echo "selected" ?> value="<?= $lvl; ?>"><?= $lvl ?></option>
                                                        <?php endforeach; ?>                    
                                                    </select>
                                                
                                                </form>
                                            </td>
                                            <td onclick="javasript: return confirm('Anda Yakin Ingin Menghapus?')"><?= anchor('admin/user/hapus/'.$usr->iduser, '<div class="btn btn-danger btn-m"><i class="fa fa-trash"></i></div>')?></td>
                                            <td><?= anchor('admin/user/update/'.$usr->iduser,'<div class="btn '.$warna.' btn-m">'.$status.'</div>') ?></td>
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