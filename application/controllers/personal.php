<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends MY_Controller {

	public function index()
	{
		redirect(base_url().'personal/home/'.$this->session->userdata('user_s')['username'],'refresh');
	}
	public function home($username = '')
	{
		if (!$username) {
			redirect(base_url().'personal/home/'.$this->session->userdata('user_s')['username'],'refresh');
		}
		$this->load->model('timeline_model');
		$this->load->model('album_model');
		$this->load->model('photo_model');
		$this->load->model('user_model');

		// Lấy thông tin tài khoản của trang
		$getuser = array('username' => $username);
		if ($this->user_model->getuserid($getuser)) {
			$id = $this->user_model->getuserid($getuser)->id;
		}
		else
		{
			redirect(base_url().'personal/home/'.$this->session->userdata('user_s')['username'],'refresh');
		}
		
		//pre($id);

		// Lấy thông tin tài khoản của trang
		$user = $this->user_model->getuserinfo($id);
		$data['user'] = $user;
		//pre($user);

		// Lấy thông tin liên kết
		if ($id != $this->session->userdata('user_s')['id']) {
			$this->load->model('rela_model');
			if ($this->rela_model->checkrela($this->session->userdata('user_s')['id'], $id))
			{
				$status = $this->rela_model->checkrela($this->session->userdata('user_s')['id'], $id)->status;
				if ($status == 0) {
					redirect(base_url().'personal/home/'.$this->session->userdata('user_s')['username'],'refresh');
				}
				else
				{
					$data['status'] = $status;
				}
			}
		}

		// timeline

		$input['limit'] = array('3', '0');
		$input['order'] = array('datetime','DESC');
		$input['where'] = array('user' => $id);
		//$timeline = $this->timeline_model->gettimeline($input);
		if (!$this->timeline_model->gettimeline($input))
		{
			$data['news_error'] = 'Không có thông tin bảng tin hiển thị' ;
			//pre($data);
		}
		else
		{
			$timeline = $this->timeline_model->gettimeline($input);
			//pre($timeline);
			$timeline_ele = array();
			foreach ($timeline as $key => $value) {
				if ($value->type == 0)
				{
					$timeline_ele[$key]['photo'] = $this->photo_model->getphoto($value->topic);
					$timeline_ele[$key]['user'] = $this->user_model->getuserinfo($value->user);
				}
				else
				{
					$timeline_ele[$key]['album'] = $this->album_model->getalbum($value->topic);
					$timeline_ele[$key]['user'] = $this->user_model->getuserinfo($value->user);
					$timeline_ele[$key]['listphoto'] = $this->photo_model->getlistphoto($value->topic);
				}
			}
			//pre($timeline_ele);
			$data['timeline'] = $timeline;
			$data['timeline_ele'] = $timeline_ele;
		}
		$data['temp'] = 'site/personal/index';
		$data['fixedtitle'] = 'Người dùng';
		$this->load->view('site/main', $data);
	}
	public function timelinepersonal()
	{
		$this->load->model('timeline_model');
		$this->load->model('album_model');
		$this->load->model('photo_model');
		$this->load->model('user_model');

		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$id = $_GET['id'];

		if ($page < 1) {
		    $page = 1;
		}

		$limit = 3;

		$start = ($limit * $page) - $limit;

		$input['limit'] = array($limit, $start);
		$input['order'] = array('datetime','DESC');
		$input['where'] = array('user' => $id);

		if ($this->timeline_model->gettimeline($input)) {
			$timeline = $this->timeline_model->gettimeline($input);
			//pre($timeline);
			$timeline_ele = array();
			foreach ($timeline as $key => $value) {
				if ($value->type == 0)
				{
					$timeline_ele[$key]['photo'] = $this->photo_model->getphoto($value->topic);
					$timeline_ele[$key]['user'] = $this->user_model->getuserinfo($value->user);
				}
				else
				{
					$timeline_ele[$key]['album'] = $this->album_model->getalbum($value->topic);
					$timeline_ele[$key]['user'] = $this->user_model->getuserinfo($value->user);
					$timeline_ele[$key]['listphoto'] = $this->photo_model->getlistphoto($value->topic);
				}
			}
			$data['timeline'] = $timeline;
			$data['timeline_ele'] = $timeline_ele;
		}
		else
		{
			echo '<script language="javascript">stopped = true; </script>';
		}
		$this->load->view('site/personal/timeline-personal', $data);
	}
	public function dofollow()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('rela_model');
		$user = $_POST['user'];
		$userx = $_POST['userx'];
		if ($this->rela_model->addfollow($user, $userx, $datetime)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function dounfollow()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('rela_model');
		$user = $_POST['user'];
		$userx = $_POST['userx'];
		if ($this->rela_model->removerela($user, $userx)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function doblock()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('rela_model');
		$user = $_POST['user'];
		$userx = $_POST['userx'];
		if ($this->rela_model->checkrela($user, $userx)) {
			if ($this->rela_model->updateblock($user, $userx)) {
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			if ($this->rela_model->addblock($user, $userx)) {
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}

/* End of file personal.php */
/* Location: ./application/controllers/personal.php */