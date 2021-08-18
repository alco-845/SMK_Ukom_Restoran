<?php 

    class Model_Admin extends CI_Model{

        public function select($table, $limit = null, $start = null){
            return $this->db->get($table, $limit, $start)->result();            
        }

        public function select_menu($table, $where, $limit = null, $start = null){
            return $this->db->get_where($table, $where, $limit, $start)->result();            
        }
        
        public function insert($table, $data){           
            $this->db->insert($table, $data);
        }

        public function delete($table, $id){
            $this->db->where($id);
            $this->db->delete($table);
        }

        public function get($table, $id){
            return $this->db->get_where($table, $id)->result();
        }

        public function get_one($table, $id, $idwhere){
            $result = $this->db->where($idwhere, $id)
                               ->get($table);
                               if ($result->num_rows() > 0) {
                                return $result->row();
                            } else {
                                return array();
                            }
        }

        public function get_ord($table, $where, $cending, $limit = null, $start = null){
            $this->db->from($table);
            $this->db->order_by($where, $cending);
            $this->db->limit($limit, $start);
            $query = $this->db->get(); 
            return $query->result();
        }

        public function get_whr($table, $id1, $id2, $where, $limit = null, $start = null){
            $this->db->from($table);
            $this->db->where($id1, $id2);
            $this->db->order_by($where, "asc");
            $this->db->limit($limit, $start);
            $query = $this->db->get(); 
            return $query->result();
        } 

        public function get_tgl($first, $second){
            $this->db->where('tglorder >=', $first);
            $this->db->where('tglorder <=', $second);
            return $this->db->get('vorderdetail')->result();
        }

        public function get_keyword($table, $where, $keyword, $order, $cending){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->like($where, $keyword);
            $this->db->order_by($order, $cending);
            return $this->db->get()->result();
        }

        public function update($table, $data, $id){           
            $this->db->where($id);
            $this->db->update($table, $data);
        }        
    }
    

?>