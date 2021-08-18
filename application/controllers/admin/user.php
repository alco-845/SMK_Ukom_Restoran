<?php 

    class User extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('model_admin');
        }

        public function index(){
            $config['base_url'] = site_url('admin/user/index');
            $config['total_rows'] = $this->db->count_all('tbluser');
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
    
            $data['user'] = $this->model_admin->get_ord('tbluser', 'user', 'asc', $config["per_page"], $data['page']);
    
            $data['pagination'] = $this->pagination->create_links();

            $data['arr_level'] = array(
                'admin', 'koki', 'kasir'
            );
 
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/user_select', $data);
            $this->load->view('admin/templates/footer');
        }

        public function tambah(){
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/user_insert');
            $this->load->view('admin/templates/footer');
        }

        public function proses_tambah(){
            $password = hash('sha256', $this->input->post('password'));
            $konfirmasi = hash('sha256', $this->input->post('konfirmasi'));

            $data = array(
                'user' => $this->input->post('user'),
                'email' => $this->input->post('email'),
                'password' => $password,
                'level' => $this->input->post('level')
            );

            if ($password === $konfirmasi) {
                $this->model_admin->insert('tbluser', $data);
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Password Tidak Sama Dengan Konfirmasi
                </div>');
                redirect('admin/user/tambah');
            }
            
        }

        public function hapus($id){
            $where = array('iduser' => $id);
            $this->model_admin->delete('tbluser', $where);
            redirect('admin/user');
        }

        public function update($id){
            $stat = $this->model_admin->get_one('tbluser', $id, 'iduser');

            if ($stat->aktif == 0) {
                $aktif = 1;
            } else {
                $aktif = 0;
            }

            $data = array(
                'aktif' => $aktif
            );

            $id = array(
                'iduser' => $id
            );

            $this->model_admin->update('tbluser', $data, $id);
            redirect('admin/user');
        }

        public function ubah($id){
            $where = array('iduser' => $id);
            $data['user'] = $this->model_admin->get('tbluser', $where);

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/user/user_update', $data);
            $this->load->view('admin/templates/footer');
        }

        public function proses_ubah(){
            $password = hash('sha256', $this->input->post('password_update'));
            $konfirmasi = hash('sha256', $this->input->post('konfirmasi_update'));

            $data = array(
                'user' => $this->input->post('user_update'),
                'email' => $this->input->post('email_update'),
                'password' => $password
            );
            
            $idus = $this->input->post('user_id');
            $id = array(
                'iduser' => $idus
            );

            if ($password === $konfirmasi) {
                $this->model_admin->update('tbluser', $data, $id);
                $this->session->set_userdata('user', $this->input->post('user_update'));
                $this->session->set_flashdata('message', 
					'<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						Berhasil Ubah
					</div>');
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Password Tidak Sama Dengan Konfirmasi
                </div>');
                redirect('admin/user/ubah/'.$idus);
            }
        }

        public function ubah_level($id){
            $data = array(
                'level' => $this->input->post('level_update')
            );

            $idusr = array(
                'iduser' => $id
            );

            $this->model_admin->update('tbluser', $data, $idusr);

            $iduser = $this->session->iduser;
            if ($iduser == $id) {
                $this->session->set_userdata('level', $this->input->post('level_update'));
                redirect('admin');
            } else {
                redirect('admin/user');
            }            
        }
    }
    

?>