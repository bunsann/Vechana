<?php
class Model_sign_up extends CI_model {
    
    function Model_sign_up()
    {
        parent::_construct();
    }
    function create_user_account($user_name,$user_password) {
        $query_str = "INSERT INTO chat_messages (user_name,user_password) VALUES (?,?)";
        $this->db->query($query_str, array($user_name,$user_password));
    }
            
    
    
    
    
    
    
    
    
    
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
