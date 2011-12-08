<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sign_up extends CI_Controller {
    function Sign_up()
    {
        parent::__construct();
        $this->load->model('model_sign_up');
    }
    public function index()
    {
        $this->load->view('view_sign_up');
    }
    function create_user_account() {
        $user_name = $this->input->post('user_name');
        $user_password = $this->input->post('user_password');
        $this->model->create_user_account($user_name,$user_password);
    }
}
?>
