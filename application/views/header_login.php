<?php if ($this->session->iduser) {
    header("location:".base_url('admin'));
} else if ($this->session->iduser) {
    header("location:".base_url());
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restoran SMK</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css">
</head>
<body>

    <div class="container">        
    
        <div class="row mt-4">
            <div class="col-md-3">
                <a href="<?= base_url('admin/home') ?>"><h3>Restoran SMK</h3></a>
            </div>
        </div>