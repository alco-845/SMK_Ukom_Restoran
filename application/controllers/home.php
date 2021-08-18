<?php 

    class Home extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('model_user');
        }

        public function index(){
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');

            $config['base_url'] = site_url('home/index');
            $config['total_rows'] = $this->db->count_all('vmenu');
            $config['per_page'] = 12;
            $config["uri_segment"] = 3;

            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
    
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<br><div class="pagging text-center"><nav><ul class="pagination justify-content-left">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';
    
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['menu'] = $this->model_user->get_ord('vmenu', 'menu', 'asc', $config["per_page"], $data['page']);
    
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/home', $data);
            $this->load->view('user/templates/footer');
        }

        public function filter($id){
            $data['menu'] = $this->model_user->get_whr('vmenu', 'idkategori', $id, 'menu', 'asc');            
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');
            $data['pagination'] = "";

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/home', $data);
            $this->load->view('user/templates/footer');
        }

        public function beli($id){
            $menu = $this->model_user->get_one('tblmenu', $id, 'idmenu');
            $data = array(
                'id' => $menu->idmenu,
                'qty' => 1,
                'price' => $menu->harga,
                'name' => $menu->menu
            );

            if ($this->session->idpelanggan == null) {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Anda Belum Login
                </div>');
                redirect('login');
            } else {
                $this->cart->insert($data);            
                redirect('home/beli_detail');
            }
        }

        public function beli_detail(){
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');
            $data['cart'] = $this->cart->contents();

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/beli_detail', $data);
            $this->load->view('user/templates/footer');
        }

        public function beli_tambah($id){  
            $where = $this->cart->get_item($id);
            $menu = $this->model_user->get_one('tblmenu', $where['id'], 'idmenu');
            $data = array(
                'id' => $menu->idmenu,
                'qty' => +1,
                'price' => $menu->harga,
                'name' => $menu->menu
            );

            $this->cart->insert($data);            
            // $this->cart->destroy();            
            redirect('home/beli_detail');
        }

        public function beli_kurang($id){
            $where = $this->cart->get_item($id);
            $menu = $this->model_user->get_one('tblmenu', $where['id'], 'idmenu');
            if ($where['qty'] == 1) {
                $this->cart->remove($id);
            } else {
                $data = array(
                    'id' => $menu->idmenu,
                    'qty' => -1,
                    'price' => $menu->harga,
                    'name' => $menu->menu
                );
                $this->cart->insert($data);
            }        
                    
            redirect('home/beli_detail');
        }

        public function beli_hapus($id){
            $this->cart->remove($id);

            redirect('home/beli_detail');
        }

        public function checkout(){
            $idorder = $this->model_user->idorder();
            $total = 0;

            foreach ($this->cart->contents() as $item) {
                $orderdetail = array(
                    'idorder' => $idorder,
                    'idmenu' => $item['id'],
                    'jumlah' => $item['qty'],
                    'hargajual' => $item['price']
                );
                $total = $total + $item['subtotal'];
                $this->model_user->insert("tblorderdetail", $orderdetail);
            }

            $order = array(
                'idorder' => $idorder,
                'idpelanggan' => $this->session->idpelanggan,
                'tglorder' => date('Y-m-d'),
                'total' => $total,
                'bayar' => 0,
                'kembali' => 0,
                'metode' => "Belum Bayar",
                'status' => 0
            );
            $this->model_user->insert("tblorder", $order);                
                        
            $this->cart->destroy();
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Terima Kasih Sudah Memesan
                </div>');
            redirect('home');
        }

        public function histori(){
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');

            $config['base_url'] = site_url('home/histori');
            $config['total_rows'] = $this->db->where('idpelanggan', $this->session->idpelanggan)->from("vorder")->count_all_results();
            $config['per_page'] = 4;
            $config["uri_segment"] = 3;

            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
    
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<br><div class="pagging text-center"><nav><ul class="pagination justify-content-left">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';
    
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['order'] = $this->model_user->get_histori("vorder", 'idpelanggan', $this->session->idpelanggan, 'tglorder', 'desc', $config["per_page"], $data['page']);
    
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/histori/histori_select', $data);
            $this->load->view('user/templates/footer');
        }

        public function histori_detail($id){
            $data['orderdetail'] = $this->model_user->get_whr('vorderdetail', 'idorder', $id, 'menu', 'asc');
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');
            

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/histori/histori_detail', $data);
            $this->load->view('user/templates/footer');            
        }

        public function daftar(){
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/daftar');
            $this->load->view('user/templates/footer');            
        }

        public function daftar_proses(){
            $password = hash('sha256', $this->input->post('password'));
            $konfirmasi = hash('sha256', $this->input->post('konfirmasi'));

            $data = array(
                'pelanggan' => $this->input->post('pelanggan'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'password' => $password,
                'aktif' => 1
            );

            if ($password === $konfirmasi) {
                $this->model_user->insert('tblpelanggan', $data);
                $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Registrasi Berhasil Silahkan Login
                </div>');
                redirect('home');
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Password Tidak Sama Dengan Konfirmasi
                </div>');
                redirect('home/daftar');
            }
        }

        public function ubah($id){
            $where = array('idpelanggan' => $id);
            $data['pelanggan'] = $this->model_user->get('tblpelanggan', $where);
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');

            $this->load->view('user/templates/header');
            $this->load->view('user/templates/sidebar', $data);
            $this->load->view('user/ubah', $data);
            $this->load->view('user/templates/footer');
        }

        public function ubah_proses(){
            $password = hash('sha256', $this->input->post('password_update'));
            $konfirmasi = hash('sha256', $this->input->post('konfirmasi_update'));

            $data = array(
                'pelanggan' => $this->input->post('pelanggan_update'),
                'alamat' => $this->input->post('alamat_update'),
                'telp' => $this->input->post('telp_update'),
                'email' => $this->input->post('email_update'),
                'password' => $password
            );

            $idpel = $this->input->post('pelanggan_id');
            $id = array(
                'idpelanggan' => $idpel
            );

            if ($password === $konfirmasi) {
                $this->model_user->update('tblpelanggan', $data, $id);
                $this->session->set_userdata('pelanggan', $this->input->post('pelanggan_update'));
                $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Berhasil Ubah
                </div>');
                redirect('home');
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Password Tidak Sama Dengan Konfirmasi
                </div>');
                redirect('home/ubah/'.$idpel);
            }
        }

        public function logout(){
			$this->session->unset_userdata(
				array(
					'pelanggan',
					'idpelanggan'
				)
			);
			redirect('home');
        }
        
        public function cari(){
            $keyword = $this->input->post('keyword');
            $data['menu'] = $this->model_user->get_keyword($keyword, 'menu', 'asc');
            $data['kategori'] = $this->model_user->get_ord("tblkategori", 'kategori', 'asc');

            $data['pagination'] = "";

            $this->load->view('user/templates/header');
			$this->load->view('user/templates/sidebar', $data);
			$this->load->view('user/home', $data);
            $this->load->view('user/templates/footer');
        }
    }
    

?>