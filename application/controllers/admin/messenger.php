<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messenger extends MY_Controller {

	public function index()
	{
		$this->load->model('contact_model');
		$contactlist = $this->contact_model->getcontactlist();
		$data['contactlist'] =  $contactlist;
		//pre($contactlist);
		$data['temp'] = 'admin/messenger/index';
		$this->load->view('admin/main', $data);
	}
}

/* End of file messenger.php */
/* Location: ./application/controllers/admin/messenger.php */