<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $data);
	}
	public function count()
	{
		echo getbeginweek();
	}
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */