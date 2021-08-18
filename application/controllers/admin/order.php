<?php 

    class Order extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('model_admin');
        }

        public function index(){
            $config['base_url'] = site_url('admin/order/index');
            $config['total_rows'] = $this->db->count_all('vorder');
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
    
            $data['order'] = $this->model_admin->get_ord('vorder', 'tglorder', 'desc', $config["per_page"], $data['page']);
    
            $data['pagination'] = $this->pagination->create_links();
 
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/order/order_select', $data);
            $this->load->view('admin/templates/footer');
        }

        public function ubah($id){
            $where = array('idorder' => $id);
            $data['order'] = $this->model_admin->get('vorder', $where);

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/order/order_update', $data);
            $this->load->view('admin/templates/footer');
        }

        public function proses_ubah(){
            $id = $this->input->post('order_id');
            $get = $this->model_admin->get_one('tblorder', $id, 'idorder');

            $bayar = $this->input->post('bayar_update');

            $kembali = $bayar - $get->total;

            $data = array(
                'bayar' => $bayar,
                'kembali' => $kembali,
                'metode' => $this->input->post('metode'),
                'status' => '1'
            );

            $where = array(
                'idorder' => $id
            );

            if ($kembali < 0) {
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Pembayaran Kurang
                </div>');
            redirect('admin/order/ubah/'.$id);
            } else {
                $this->model_admin->update('tblorder', $data, $where);
                redirect('admin/order');
            }
                    
        }
    }
    

?>