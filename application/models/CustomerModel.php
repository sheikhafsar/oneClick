<?php

class CustomerModel extends CI_Model
{

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->tableName = 'customer';
    }

    public function verifyUserLoginData($data)
    {
        $this->db->where($data);
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getUserByUserId($Id)
    {
        $this->db->where('customer_id', $Id);
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

}
