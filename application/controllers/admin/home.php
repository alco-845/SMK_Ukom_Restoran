<?php

	class Home extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('model_admin');
		}

		public function index(){			
			$data['menu'] = $this->db->count_all('tblmenu');
			$data['pelanggan'] = $this->db->count_all('tblpelanggan');
			$data['user'] = $this->db->count_all('tbluser');
			$data['order'] = $this->db->count_all('tblorder');

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/home', $data);
			$this->load->view('admin/templates/footer');
		}

		public function logout(){
			$this->session->unset_userdata(
				array(
					'user',
					'level',
					'iduser'
				)
			);
			redirect('login');
		}

		public function cari(){
			$keyword = $this->input->post('keyword');
            $data['kategori'] = $this->model_admin->get_keyword('tblkategori', 'kategori', $keyword, 'kategori', 'asc');
            $data['menu'] = $this->model_admin->get_keyword('vmenu', 'menu', $keyword, 'menu', 'asc');
            $data['pelanggan'] = $this->model_admin->get_keyword('tblpelanggan', 'pelanggan', $keyword, 'pelanggan', 'asc');
			$data['user'] = $this->model_admin->get_keyword('tbluser', 'user', $keyword, 'user', 'asc');

			$data['pagination'] = "";

			$level = $this->session->level;

			switch ($level) {
				case 'admin':
					if ($data['kategori']) {
						$this->load->view('admin/templates/header');
						$this->load->view('admin/templates/sidebar');
						$this->load->view('admin/kategori/kategori_select', $data);
						$this->load->view('admin/templates/footer');
					} else if ($data['menu']) {
						$data['opsi'] = "";
						$data['kategori'] = $this->model_admin->get_ord('tblkategori', 'kategori', 'asc');
						$this->load->view('admin/templates/header');
						$this->load->view('admin/templates/sidebar');
						$this->load->view('admin/menu/menu_select', $data);
						$this->load->view('admin/templates/footer');
					} else if ($data['pelanggan']) {
						$this->load->view('admin/templates/header');
						$this->load->view('admin/templates/sidebar');
						$this->load->view('admin/pelanggan/pelanggan_select', $data);
						$this->load->view('admin/templates/footer');
					} elseif ($data['user']) {
						$this->load->view('admin/templates/header');
						$this->load->view('admin/templates/sidebar');
						$this->load->view('admin/user/user_select', $data);
						$this->load->view('admin/templates/footer');
					}
					break;

				case 'kasir':					
					break;

				case 'koki':
					break;
				
				default:
					break;
			}

		}
	}

?>
