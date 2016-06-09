<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends MY_Controller {

	public function index()
	{
		$this->load->model('user_model');
		$userlist = $this->user_model->getalluser();
		//pre($userlist);
		$data['userlist'] = $userlist;
		$data['temp'] = 'admin/manager/index';
		$this->load->view('admin/main', $data);
	}
	public function userlist()
	{
		$this->load->model('user_model');
		$userlist = $this->user_model->getalluser();
		//pre($userlist);
		$data['userlist'] = $userlist;
		$this->load->view('admin/manager/user', $data);
	}
	public function reportphoto()
	{
		$this->load->model('photoreport_model');
		$reportlist = $this->photoreport_model->getreportlist();
		//pre($reportlist);
		$data['list'] = $reportlist;
		$data['temp'] = 'admin/manager/photoreport';
		$this->load->view('admin/main', $data);
	}
	public function reportuser()
	{
		$this->load->model('userreport_model');
		$reportlist = $this->userreport_model->getreportlist();
		//pre($reportlist);
		$data['list'] = $reportlist;
		$data['temp'] = 'admin/manager/userreport';
		$this->load->view('admin/main', $data);
	}
	public function addCat()
	{
		$this->load->model('cat_model');
		if ($_POST['submit']) {
			$cat['catname'] = $this->input->post('catname');
			$cat['description'] = $this->input->post('description');
			$this->cat_model->addCat($cat);
		}
		$data['temp'] = 'admin/manager/addCat';
		$this->load->view('admin/main', $data);
	}
}

/* End of file manager.php */
/* Location: ./application/controllers/admin/manager.php */