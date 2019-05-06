<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this->tableName = 'user';
	}
	
	function verifyUserLoginData($data){
		$this->db->where($data);
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }	
	}

	function getUsersByUserId($Id) {
        $this->db->where('user_id', $Id);
        $query = $this->db->get($this->tableName);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function insertUser($data) {
        $insert = $this->db->insert($this->tableName, $data);
		
		if ($insert) {
            return $this->db->insert_id();
            
        } else {
            return false;
        }
    }

	public function validate_UserEmail($where) {
        $this->db->where($where);
        $this->db->select('count(*) as count');
        $query = $this->db->get($this->tableName);
        return $query->row()->count;
    }
}
?>
