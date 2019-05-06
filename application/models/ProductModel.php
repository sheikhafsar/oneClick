<?php

class ProductModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->tableName = 'product';
    }

    public function getAllProducts($where_in = null, $where = null,$limit = null,$start = null) {
        if($limit!=null || $start!=null){
            $this->db->limit($limit, $start);
        }
        
        
        if ($where != null) {
            $this->db->or_group_start();
            foreach ($where as $w) {
                $this->db->or_group_start();
                $this->db->where($w[0])->where($w[1]);
                $this->db->group_end();
            }
            $this->db->group_end();
        }
        
        if ($where_in != null) {
            foreach ($where_in as $key => $value) {
                $this->db->where_in($key, $value);
            }
        }
        
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function searchProductsByName($prod_name){
        $this->db->like('prod_name',$prod_name );
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
?>