<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->load->model('user_model');
		$this->load->model('photo_model');
		$this->load->model('album_model');
		//user
		$user_count = $this->user_model->count_user();
		$data['user_count'] = $user_count;
		//photo
		$photo_count = $this->photo_model->count_photo();
		$data['photo_count'] = $photo_count;
		//album
		$album_count = $this->album_model->count_album();
		$data['album_count'] = $album_count;
		//new user
		$new_user_count = $this->user_model->count_new_user();
		$data['new_user_count'] = $new_user_count;

		$time = getdate();
		$dateweek = array();
		for ($i=6; $i >= 0; $i--) {
			$date = mktime($time['hours'], $time['minutes'], $time['seconds'],$time['mon'], ($time ['mday'] - $i), $time['year']);
			$dateweek[$i] = date("D", $date);
		}
		$data['dateweek'] = $dateweek;
		$data['fixedtitle'] = "Thống Kê";
		$data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $data);
	}
	public function count()
	{
		$time = getdate();
		$dateint = mktime($time['hours'], $time['minutes'], $time['seconds'],$time['mon'], ($time ['mday'] - 7), $time['year']);
		pre($dateint);
		echo date('Y/m/d H:m:s', $dateint);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */