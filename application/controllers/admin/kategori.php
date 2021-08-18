<?php 

    class Kategori extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('model_admin');
        }

        public function index(){
            $config['base_url'] = site_url('admin/kategori/index');
            $config['total_rows'] = $this->db->count_all('tblkategori');
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

            $data['kategori'] = $this->model_admin->get_ord('tblkategori', 'kategori', 'asc', $config["per_page"], $data['page']);
    
            $data['pagination'] = $this->pagination->create_links();
 
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/kategori/kategori_select', $data);
            $this->load->view('admin/templates/footer');
        }

        public function tambah(){
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/kategori/kategori_insert');
            $this->load->view('admin/templates/footer');            
        }
        
        public function proses_tambah(){            
            $data = array(
                'kategori' => $this->input->post('kategori')
            );

            $this->model_admin->insert("tblkategori", $data);
            redirect('admin/kategori');
        }

        public function hapus($id){
            $where = array('idkategori' => $id);
            $this->model_admin->delete('tblkategori', $where);
            redirect('admin/kategori');
        }

        public function ubah($id){
            $where = array('idkategori' => $id);
            $data['kategori'] = $this->model_admin->get('tblkategori', $where);

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/kategori/kategori_update', $data);
            $this->load->view('admin/templates/footer');
        }

        public function proses_ubah(){
            $data = array(
                'kategori' => $this->input->post('kategori_update')
            );

            $id = array(
                'idkategori' => $this->input->post('kategori_id')
            );

            $this->model_admin->update('tblkategori', $data, $id);
            redirect('admin/kategori');
        }
    }

?>