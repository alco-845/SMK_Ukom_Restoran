<?php 

    class Login extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('model_admin');
        }

        public function index(){
            $this->load->view('user/templates/header');
            $this->load->view('sidebar_login');
            $this->load->view('login');
            $this->load->view('user/templates/footer');
        }

        public function auth(){
            $email = $this->input->post('email');
            $pass = hash('sha256', $this->input->post('password'));

            $data = array(
                'email' => $email,
                'password' => $pass,
                'aktif' => 1
            );

            $auth_usr = $this->model_admin->get("tbluser", $data);
            $auth_plgn = $this->model_admin->get("tblpelanggan", $data);

            $get_user = $this->model_admin->get_one('tbluser', $email, 'email');
            $get_pel = $this->model_admin->get_one('tblpelanggan', $email, 'email');

            if ($auth_usr == TRUE) {                
                $this->session->set_userdata(
                    array(
                        'user' => $get_user->user,
                        'level' => $get_user->level,
                        'iduser' => $get_user->iduser
                    )
                );
                redirect("admin");
            } else if ($auth_plgn == TRUE) {                
                $this->session->set_userdata(
                    array(
                        'pelanggan' => $get_pel->pelanggan,
                        'idpelanggan' => $get_pel->idpelanggan
                    )
                );
                redirect("home");
            } else if ($get_user->aktif == '0' || $get_pel->aktif == '0') {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Akun dibanned
                </div>');
                redirect("login");
            } else {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible w-100" role="alert" style="white-space: nowrap; width:200px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Email Atau Password Salah
                </div>');
                redirect("login");
            }
            
        }
    }
    

?>