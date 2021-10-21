<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function authentifier($email,$password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query=$this->db->get('utilisateur');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function get_user($email)
    {
        $this->db->where('email',$email);
        $this->db->select('*');
        $this->db->from('utilisateur');
        return $this->db->get();
    }

}