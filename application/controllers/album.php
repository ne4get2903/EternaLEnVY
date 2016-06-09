<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//somthing shit in here
//WTF this shit
class Album extends MY_Controller {

	public function index()
	{
		$data['temp'] = 'site/album/index';
		$this->load->view('site/main', $data);
	}
	public function albumview($albumid = '')
	{
		$this->load->model('album_model');
		$this->load->model('user_model');
		$this->load->model('photo_model');
		$album = $this->album_model->getalbum($albumid);
		$data['album'] = $album;
		//pre($album);
		$user = $this->user_model->getuserinfo($album->user);
		$data['user'] = $user;
		//pre($user);
		$photolist = $this->photo_model->getlistphoto($albumid);
		$data['photolist'] = $photolist;
		//pre($photolist);
		$data['temp'] = 'site/album/index';
		$data['fixedtitle'] = 'Album view';
		$this->load->view('site/main', $data);
	}
	public function gridview($albumid = '')
	{
		$this->load->model('album_model');
		$this->load->model('user_model');
		$this->load->model('photo_model');
		$album = $this->album_model->getalbum($albumid);
		$data['album'] = $album;
		//pre($album);
		$user = $this->user_model->getuserinfo($album->user);
		$data['user'] = $user;
		//pre($user);
		$photolist = $this->photo_model->getlistphoto($albumid);
		$data['photolist'] = $photolist;
		//pre($photolist);
		$data['temp'] = 'site/album/gridview';
		$data['fixedtitle'] = 'Album view';
		$this->load->view('site/main', $data);
	}
	public function upload()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('album_model');
		$this->load->model('timeline_model');
		if ($this->input->post('ok')) {
			if ($this->input->post('name'))
			{
				$album['name'] = $this->input->post('name');
			}
			if ($this->input->post('description'))
			{
				$album['description'] = $this->input->post('description');
			}
			if ($this->input->post('cat') != 0)
			{
				$album['cat'] = $this->input->post('cat');
			}
			$album['date'] = gettimenow();
			$album['status'] = $this->input->post('status');
			$album['user'] = $this->session->userdata('user_s')['id'];
			if ($this->album_model->insertalbum($album)) {
				$id = $this->album_model->getalbumid($album);
				$config['upload_path']   = './upload/photo/';
		        $config['allowed_types'] = 'jpg|png|gif';
		        $file  = $_FILES['image_list'];
        		$count = count($file['name']);
        		for ($i=0; $i < $count; $i++) {
        			$_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
		            $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
		            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
		            $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
		            $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
		            $this->load->library('upload', $config);
		            if ($this->upload->do_upload()) {
		            	$this->load->model('photo_model');
		            	$photo['idalbum'] = $id;
		            	$photo['date'] = $album['date'];
		            	$photo['link'] = $this->upload->data()['file_name'];
		            	$photo['status'] = $album['status'];
		            	$photo['user'] = $this->session->userdata('user_s')['id'];
		            	if ($this->input->post('cat') != 0)
		            	{
		            		$photo['cat'] = $album['cat'];
		            	}
		            	$this->photo_model->insertphoto($photo);
		            }
        		}
        		$timeline = array();
				$timeline['user'] = $this->session->userdata('user_s')['id'];
				$timeline['datetime'] = $album['date'];
				$timeline['type'] = 1;
				$timeline['topic'] = $id;
				$this->timeline_model->createtimeline($timeline);
				redirect(base_url().'album/albumview/'.$id,'refresh');
			}
		}
		$this->load->model('cat_model');
		$data['list_cat'] = $this->cat_model->get_list_cat();
		$data['temp'] = 'site/album/upload';
		$data['fixedtitle'] = 'Album upload';
		$this->load->view('site/main', $data);
	}

}

/* End of file album.php */
/* Location: ./application/controllers/album.php */