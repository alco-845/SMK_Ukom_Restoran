<?php 

    class Menu extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('model_admin');
        }

        public function index(){
            $config['base_url'] = site_url('admin/menu/index');            
            
            $config['total_rows'] = $this->db->count_all('vmenu');                
            
            $config['per_page'] = 3;
            $config["uri_segment"] = 4;

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
            $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;                        

            $data['kategori'] = $this->model_admin->get_ord('tblkategori', 'kategori', 'asc');

            if ($this->input->post('opsi')) {
                $data['opsi'] = $this->input->post('opsi');
                // $this->session->unset_userdata('kat');

                $data['menu'] = $this->model_admin->get_whr('vmenu', 'idkategori', $data['opsi'], 'menu', $config["per_page"], $data['page']);
                $data['pagination'] = "";
            } else {
                $data['opsi'] = "";

                $data['menu'] = $this->model_admin->select("vmenu", $config["per_page"], $data['page']);
                $data['pagination'] = $this->pagination->create_links();
            }
            
 
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/menu/menu_select', $data);
            $this->load->view('admin/templates/footer');
        }

        public function tambah(){
            $data['kategori'] = $this->model_admin->get_ord('tblkategori', 'kategori', 'asc');

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/menu/menu_insert', $data);
            $this->load->view('admin/templates/footer');
        }

        public function proses_tambah(){
            $gambar = $_FILES['gambar'];
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                // echo "Upload Gagal"; die();
                $gambar = "default.jpg";
            } else {
                $gambar = $this->upload->data('file_name');             
            }

            $data = array(
                'idkategori' => $this->input->post('idkategori'),
                'menu' => $this->input->post('menu'),
                'harga' => $this->input->post('harga'),
                'gambar' => $gambar
            );

            $this->model_admin->insert("tblmenu", $data);

            redirect('admin/menu');
        }

        public function hapus($id){
            $get = $this->model_admin->get_one('tblmenu', $id, 'idmenu');
            unlink('./assets/gambar/'.$get->gambar);
            
            $where = array('idmenu' => $id);
            $this->model_admin->delete('tblmenu', $where);            
            redirect('admin/menu');
        }

        public function ubah($id){
            $where = array('idmenu' => $id);
            $data['menu'] = $this->model_admin->get('tblmenu', $where);

            $get = $this->model_admin->get_one('tblmenu', $id, 'idmenu');

            $data['idkategori'] = $get->idkategori;
            $data['kategori'] = $this->model_admin->get_ord('tblkategori', 'kategori', 'asc');

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/menu/menu_update', $data);
            $this->load->view('admin/templates/footer');
        }

        public function proses_ubah(){
            $gambar = $_FILES['gambar'];
            $tmp = $_FILES['gambar']['tmp_name'];

            $idmenu = $this->input->post('menu_id');
            $get = $this->model_admin->get_one('tblmenu', $idmenu, 'idmenu');

            if (!empty($tmp)) {                               
                $gambar = $_FILES['gambar']['name'];
                move_uploaded_file($tmp, './assets/gambar/'.$gambar);
                if ($get->gambar != "default.jpg") {
                    unlink('./assets/gambar/'.$get->gambar);
                }
            } else {
                $gambar = $get->gambar;
            }

            $data = array(
                'idkategori' => $this->input->post('idkategori_update'),
                'menu' => $this->input->post('menu_update'),
                'harga' => $this->input->post('harga_update'),
                'gambar' => $gambar
            );

            $id = array(
                'idmenu' => $this->input->post('menu_id')
            );

            $this->model_admin->update('tblmenu', $data, $id);
            redirect('admin/menu');
        }
    }

?>