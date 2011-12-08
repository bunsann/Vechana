<?php
class User extends CI_Controller{
    
    function User() {
        parent::__construct();
        $this->view_data['base_url'] = 'http://' .base_url();
        $this->load->model('User_model');
    }
    
    function index() {
        $this->register();
    }
    
    function register() {
        
        $this->load->library('form_validation');
        
        // Some rules need to be redefined
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[6]|xss_clean|strtolower|callback_username_not_exists');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric|min_length[6]|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|callback_email_not_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[6]|xss_clean');
        $this->form_validation->set_rules('password_conf', 'Password', 'trim|required|alpha_numeric|min_length[6]|matches[password]|xss_clean');
             
        if ($this->form_validation->run() == FALSE) {
            // hasn't been run or validation errors
            $this->load->view('view_register', $this->view_data);
            
        } else {
            // everything is good - process the form - write data into db
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $this->load->helper('string');
            $activation_code = random_string('alnum',10);
            
            $this->User_model->register_user($username,$password,$name,$email,$activation_code);
            
            // email confirmation
            $this->load->library('email');
            $this->email->from('bunsann@vechana.com', 'Bunsann Kim');
            $this->email->to($email);
            $this->email->subject('Registration Confirmation');
            $this->email->message('Please click this link to confirm your registration ' . anchor('http://localhost/vechana/user/register_confirm/' . $activation_code, 'Confirm Registration'));
            
//            $this->email->send();
            // confirmation message view
            
        }
    }
    
    function register_confirm()
    {
        $registration_code = $this->uri->segment(3);
        if ($registration_code == '') {
            echo 'Error no registration code in URL';
            exit();
        }
        $registration_confirmed = $this->User_model->confirm_registration($registration_code);

        if ($registration_confirmed) {
            echo 'You have successfully registered';
        } else {
            echo 'You have failed to register - no record found for that activation code';
        }
    }
    
    function username_not_exists($username) {
        $this->form_validation->set_message('username_not_exists', 'That %s already exists. Please choose a different username and try again');
        if ($this->User_model->check_exists_username($username)){
            return false;
        } else {
            return true;
        }
    }
    function email_not_exists($email) {
        $this->form_validation->set_message('email_not_exists', 'That %s already exists. Please use a different email address.');
        if ($this->User_model->check_exists_email($email)){
            return false;
        } else {
            return true;
        }
    }
//    function _random_string($length) {
//        $len = $length;
//        $base='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
//        $max = strlen($base)-1;
//        $activatecode='';
//        mt_srand((double)microtime()*1000000);
//        while (strlen($activatecode)<$len+1)
//            $activatecode.=$base(mt_rand(0,$max));
//        return $activatecode;
//    }
    
}

?>
