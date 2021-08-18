<?php if ($this->session->iduser) {
  header("location:".base_url('admin'));
} else if ($this->session->idpelanggan) {
  header("location:".base_url());
}?>

<body class="" style="background-color: black !important; overflow: hidden !important;">
  <div class="wrapper">    

    <div class="main-panel">
      <!-- Navbar -->
      
      <!-- End Navbar -->