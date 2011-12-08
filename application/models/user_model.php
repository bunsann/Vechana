<?php

class User_model extends CI_Model {
    function User_model()
    {
        parent::__construct();
    }
    
    function register_user($username, $password, $name, $email,$activation_code) {

        // encrypt password
        $sha1_password = sha1($password);
        
        $query_str = "INSERT INTO tbl_user (username, password, name, email,activation_code) VALUES (?,?,?,?,?)";
        $this->db->query($query_str, array($username,$sha1_password,$name,$email,$activation_code));
    }
    
    function confirm_registration($registration_cide) {
        $query_str = "SELECT user_id FROM tbl_user WHERE activation_code = ?";
        $result = $this->db->query($query_str,$registration_cide);
        
        if($result->num_rows() == 1) {
            $query_str = "UPDATE tbl_user SET activated = 1 WHERE activation_code = ?";
            $this->db->query($query_str,$registration_cide);
            return true;
        } else {
            return false;
        }
    }
    
    function check_exists_username($username) {
        $query_str = "SELECT username from tbl_user where username = ?";
        $result = $this->db->query($query_str,$username);
        if ($result->num_rows() > 0) {
            // username already exists
            return true;
        } else {
            return false;
        }            
    }
    function check_exists_email($email) {
        $query_str = "SELECT email from tbl_user where email = ?";
        $result = $this->db->query($query_str,$email);
        if ($result->num_rows() > 0) {
            // email already exists
            return true;
        } else {
            return false;
        }            
    }

}


?>
