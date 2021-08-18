<?php 

    class Model_User extends CI_Model{

        public function select($table){
            return $this->db->get($table)->result();            
        }        
        
        public function get($table, $id){
            return $this->db->get_where($table, $id)->result();
        }
        
        public function get_one($table, $id, $idwhere){
            $result = $this->db->where($idwhere, $id)
                               ->limit(1)
                               ->get($table);
            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return array();
            }            
        }

        public function get_whr($table, $id, $where, $order, $cending){
            $this->db->from($table);
            $this->db->where($id, $where);
            $this->db->order_by($order, $cending);
            $query = $this->db->get(); 
            return $query->result();
        }

        public function get_ord($table, $where, $cending, $limit = null, $start = null){
            $this->db->from($table);
            $this->db->order_by($where, $cending);
            $this->db->limit($limit, $start);
            $query = $this->db->get(); 
            return $query->result();
        }

        public function get_histori($table, $id1, $id2, $where, $cending, $limit, $start){
            $this->db->from($table);
            $this->db->where($id1, $id2);
            $this->db->order_by($where, $cending);
            $this->db->limit($limit, $start);
            $query = $this->db->get(); 
            return $query->result();
        }        
        
        public function get_keyword($keyword, $order, $cending){
            $this->db->select('*');
            $this->db->from('vmenu');
            $this->db->like('menu', $keyword);
            $this->db->order_by($order, $cending);
            return $this->db->get()->result();
        }

        public function idorder(){
            $query = $this->db->select('idorder')
                      ->from('tblorder')
                      ->get();
            $row = $query->last_row();
            if($row){
                $nextId = $row->idorder+1;
            } else {
                $nextId = '1';
            }
            return $nextId;            
        }

        public function insert($table, $data){           
            $this->db->insert($table, $data);
        }

        public function update($table, $data, $id){           
            $this->db->where($id);
            $this->db->update($table, $data);
        }
    }
    

?>