<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends MY_Controller {

	public function index($photoid = '')
	{
		
	}

	public function photoinfo($photoid = '')
	{
		$this->load->model('photo_model');
		$this->load->model('user_model');
		$photo = $this->photo_model->getphoto($photoid);
		//pre($row);
		$data['photo'] = $photo;
		$user = $this->user_model->getuserinfo($photo->user);
		//pre($user);
		$data['user'] = $user;
		$data['temp'] = 'site/photo/index';
		$data['fixedtitle'] = 'Photo';
		$this->load->view('site/main', $data);
	}

	public function upload()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('photo_model');
		$this->load->model('timeline_model');
		if ($this->input->post('ok')) {
			$config['upload_path'] = './upload/photo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img')) {
				if ($this->input->post('description')) {
					$photo['description'] = $this->input->post('description');
				}
				if ($this->input->post('cat') != 0) {
					$photo['cat'] = $this->input->post('cat');
				}
				$photo['user'] = $this->session->userdata('user_s')['id'];
				$photo['status'] = $this->input->post('status');
				$photo['date'] = gettimenow();
				$file = $this->upload->data();
				$photo['link'] = $this->upload->data()['file_name'];
				$this->photo_model->insertphoto($photo);
				$id = $this->photo_model->getphotoid($photo);
				$timeline = array();
				$timeline['user'] = $this->session->userdata('user_s')['id'];
				$timeline['datetime'] = $photo['date'];
				$timeline['type'] = 0;
				$timeline['topic'] = $id;
				$this->timeline_model->createtimeline($timeline);
				redirect(base_url().'photo/photoinfo/'.$id,'refresh');
			}
		}
		$this->load->model('cat_model');
		$data['list_cat'] = $this->cat_model->get_list_cat();
		$data['temp'] = 'site/photo/upload';
		$data['fixedtitle'] = 'Photo upload';
		$this->load->view('site/main', $data);
	}
}

/* End of file photo.php */
/* Location: ./application/controllers/photo.php */