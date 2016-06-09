<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('timeline_model');
		$this->load->model('album_model');
		$this->load->model('photo_model');
		$this->load->model('user_model');
		$input['limit'] = array('3', '0');
		$input['order'] = array('datetime','DESC');
		$timeline = $this->timeline_model->gettimeline($input);
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
		$data['temp'] = 'site/home/index';
		$data['fixedtitle'] = 'Home';
		$this->load->view('site/main', $data);
	}
	public function timeline_index()
	{
		$this->load->model('timeline_model');
		$this->load->model('album_model');
		$this->load->model('photo_model');
		$this->load->model('user_model');

		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

		if ($page < 1) {
		    $page = 1;
		}

		$limit = 3;

		$start = ($limit * $page) - $limit;

		$input['limit'] = array($limit, $start);
		$input['order'] = array('datetime','DESC');
		if ($this->timeline_model->gettimeline($input)) {
			$timeline = $this->timeline_model->gettimeline($input);
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
		else
		{
			echo '<script language="javascript">stopped = true; </script>';
		}
		$this->load->view('site/home/timeline-index', $data);
	}
	public function newfeed()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('timeline_model');
		$this->load->model('album_model');
		$this->load->model('photo_model');
		$this->load->model('user_model');
		$this->load->model('rela_model');
		$id = $this->session->userdata('user_s')['id'];
		if (!$this->rela_model->getfollowrela($id)) {
			$data['news_error'] = 'Không có thông tin bảng tin hiển thị' ;
			//pre($data);
		}
		else
		{
			$relalist = $this->rela_model->getfollowrela($id);
			//pre($relalist);
			$where = '';
			foreach ($relalist as $key => $value) {
				$where = $where.$value->userx;
				if ($relalist[$key + 1]) {
					$where = $where.',';
				}
			}
			//pre($where);
			$query = $this->db->query('select * from timeline where user in ('.$where.') order by datetime desc limit 0, 3');
			$timeline = $query->result();
			//pre($timeline);
			//$input['limit'] = array('3', '0');
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
		$data['temp'] = 'site/home/newfeed';
		$data['fixedtitle'] = 'News feed';
		$this->load->view('site/main', $data);
	}
	public function timeline_newfeed()
	{
		$this->load->model('timeline_model');
		$this->load->model('album_model');
		$this->load->model('photo_model');
		$this->load->model('user_model');
		$this->load->model('rela_model');

		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

		if ($page < 1) {
		    $page = 1;
		}

		$limit = 3;

		$start = ($limit * $page) - $limit;

		$id = $this->session->userdata('user_s')['id'];
		$relalist = $this->rela_model->getfollowrela($id);
			//pre($relalist);
		$where = '';
		foreach ($relalist as $key => $value) {
			$where = $where.$value->userx;
			if ($relalist[$key + 1]) {
				$where = $where.',';
			}
		}
		//pre($where);
		$query = $this->db->query('select * from timeline where user in ('.$where.') order by datetime desc limit '.$start.', '.$limit);
		if ($query) {
			$timeline = $query->result();
			//pre($timeline);
			//$input['limit'] = array('3', '0');
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
		else
		{
			echo '<script language="javascript">stopped = true; </script>';
		}
		$this->load->view('site/home/timeline-newfeed', $data);
	}
	public function seach()
	{
		$this->load->model('user_model');
		$this->load->model('album_model');
		$key = $_POST['key'];
		if ($this->user_model->getlistuser($key))
		{
			$data['user'] = $this->user_model->getlistuser($key);
		}
		if ($this->album_model->getlistalbum($key))
		{
			$data['album'] = $this->album_model->getlistalbum($key);
		}
		$this->load->view('site/home/seach', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */