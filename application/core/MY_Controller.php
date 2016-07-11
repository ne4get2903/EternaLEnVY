<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	//bien gui du lieu sang ben view
    public $data;
    function __construct()
    {
        error_reporting(2048);
        //ke thua tu CI_Controller
        parent::__construct();
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin' :
                {
                    //xu ly cac du lieu khi truy cap vao trang admin
                    //$this->load->helper('admin');
                    $this->_check_login();
                }
            default:
                {                }

        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $this->load->model('user_model');
        if ($this->session->userdata('user_s')) {
            $userid = $this->session->userdata('user_s')['id'];
            $role = $this->user_model->getuserinfo($userid)->role;
        }
        if($role == 0)
        {
            redirect(base_url());
        }
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */