<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->input->post('submit'))
		{
			$user['name'] = $this->input->post('hoten');
			$this->form_validation->set_rules('hoten', 'Name', 'required');
			$user['sex'] = $this->input->post('gt');
			$user['birthday'] = $this->input->post('ngaysinh');
			$user['email'] = $this->input->post('email');
			$checkemail['email'] = $user['email'];
			if ($this->user_model->checkuser($checkemail))
			{
				$email_error = 'Email đã tồn tại';
			}
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run()) {
				if ($_FILES['avata'])
				{
					$config['upload_path'] = './upload/avata/';
					$config['allowed_types'] = 'gif|jpg|png';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('avata'))
					{
						$file = $this->upload->data();
						$user['avatalink'] = $this->upload->data()['file_name'];
					}
				}
				$id = $this->session->userdata('user_s')['id'];
				$this->user_model->updateinfo($id, $user);
				$this->session->unset_userdata('user_s');
				$userinfo = $this->user_model->getuserinfo($id);
				$user_s = array(
					'id' => $userinfo->id,
					'name' => $userinfo->name,
					'link' => $userinfo->avatalink,
					'username' =>$userinfo->username
					);
				$this->session->set_userdata('user_s', $user_s);
			}
		}
		$id = $this->session->userdata('user_s')['id'];
		$data['info'] = $this->user_model->getuserinfo($id);
		$data['temp'] = 'site/user/index';
		$data['fixedtitle'] = 'Update info';
		$this->load->view('site/main', $data);
	}
	public function login()
	{
		$this->load->view('site/user/login');
	}
	public function logout()
	{
		$this->session->unset_userdata('user_s');
	}
	public function dologin($username, $pass)
	{
		$login['username'] = $username;
		$login['pass'] = $pass;
		$userid = $this->user_model->getuserid($login);
		//$this->session->set_userdata('userid', $userid->id);
		$userinfo = $this->user_model->getuserinfo($userid->id);
		$user_s = array(
			'id' => $userinfo->id,
			'name' => $userinfo->name,
			'link' => $userinfo->avatalink,
			'username' =>$userinfo->username
			);
		$this->session->set_userdata('user_s', $user_s);
	}
	public function checkuser($value='')
	{
		$ses = $this->session->userdata('user_s');
		pre($ses);
	}
	public function test()
	{
		$this->load->model('user_model');
		$check['username'] = 'ne.4get2903';
		$check['pass'] = 'accepted1';
		$id = $this->user_model->getuserid($check)->id;
		//pre($id);
		$status = $this->user_model->getuserinfo($id)->status;
		pre($status);
	}
	public function checklogin()
	{
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$result = array();
		$user = $this->input->post('user');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('user', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run()) {
			$check['username'] = $user;
			$check['pass'] = $password;
			if ($this->user_model->checkuser($check)) {
				$id = $this->user_model->getuserid($check)->id;
				if ($this->user_model->getuserinfo($id)->status == 0) {
					$result['errors'] = 'ok';
					$this->dologin($user, $password);
					echo json_encode($result);
					die();
				}
				else
				{
					$result['errors'] = 'fail';
					$result['errors_alert'] = 'User locked';
					echo json_encode($result);
				}
			}
			else
			{
				$result['errors'] = 'fail';
				$result['errors_alert'] = 'Invalid username or password';
				echo json_encode($result);
			}
		} else {
			$result['username_errors'] = form_error('user');
			$result['password_errors'] = form_error('password');
			$result['errors'] = 'fail';
			echo json_encode($result);
		}
	}
	public function regist()
	{
		$this->load->view('site/user/regist');
	}
	public function doregist($user = array())
	{
		$this->load->model('user_model');
		$this->db->insert('user', $user);
	}
	public function checkregist()
	{
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$result = array();
		// get post value
		$hoten = $this->input->post('hoten');
		$this->form_validation->set_rules('hoten', 'Name', 'required');
		$gioitinh = $this->input->post('gt');
		$username = $this->input->post('user');
		$this->form_validation->set_rules('user', 'Username', 'required');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$password_r = $this->input->post('password_r');
		$this->form_validation->set_rules('password_r', 'Password', 'required|matches[password]');
		$birth = $this->input->post('birth');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//run form
		if ($this->form_validation->run()) {
			$result['errors'] = 'ok';
			$checkuser['username'] = $username;
			if ($this->user_model->checkuser($checkuser))
			{
				$result['user_error'] = 'Username đã tồn tại';
				$result['errors'] = 'fail';
			}
			$checkemail['email'] = $email;
			if ($this->user_model->checkuser($checkemail))
			{
				$result['email_error'] = 'Email đã tồn tại';
				$result['errors'] = 'fail';
			}
			if ($result['errors'] != 'fail') {
				$user['username'] = $username;
				$user['pass'] = $password;
				$user['birthday'] = $birth;
				$user['name'] = $hoten;
				$user['email'] = $email;
				$user['sex'] = $gioitinh;
				$user['datetime'] = gettimenow();
				$user['avatalink'] = 'avata.png';
				$this->doregist($user);
				echo json_encode($result);
				die();
			}
			echo json_encode($result);
			die();
		}
		else
		{
			$result['name_error'] = form_error('hoten');
			$result['user_error'] = form_error('user');
			$result['password_error'] = form_error('password');
			$result['password_r_error'] = form_error('password_r');
			$result['email_error'] = form_error('email');
			$result['errors'] = 'fail';
			echo json_encode($result);
			die();
		}

	}
	public function checkusername($value)
	{
		$data['username'] = $value;
		if (checkuser($data)) {
			return false;
		}
		else
		{
			return true;
		}
	}
	public function checkemail($value)
	{
		$data['email'] = $value;
		if (checkuser($data)) {
			return false;
		}
		else
		{
			return true;
		}
	}
	public function follow(){
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('rela_model');
		$this->load->model('user_model');
		$followlist = $this->rela_model->getfollowrela($this->session->userdata('user_s')['id']);
		//pre($followlist);
		foreach ($followlist as $key => $value) {
			$user[] = $this->user_model->getuserinfo($value->userx);
		}
		//pre($user);
		$data['followlist'] = $followlist;
		$data['user'] = $user;
		$data['temp'] = 'site/user/follow';
		$data['fixedtitle'] = 'Follow list';
		$this->load->view('site/main', $data);
	}
	public function dounfollow()
	{
		$this->load->model('rela_model');
		$user = $this->session->userdata('user_s')['id'];
		$userx = $_POST['userx'];
		if ($this->rela_model->removerela($user, $userx)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function block(){
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('rela_model');
		$this->load->model('user_model');
		$followlist = $this->rela_model->getblockrela($this->session->userdata('user_s')['id']);
		//pre($followlist);
		foreach ($followlist as $key => $value) {
			$user[] = $this->user_model->getuserinfo($value->userx);
		}
		//pre($user);
		$data['followlist'] = $followlist;
		$data['user'] = $user;
		$data['temp'] = 'site/user/block';
		$data['fixedtitle'] = 'Block list';
		$this->load->view('site/main', $data);
	}
	public function dounblock($userx = '')
	{
		$this->load->model('rela_model');
		$user = $this->session->userdata('user_s')['id'];
		$userx = $_POST['userx'];
		if ($this->rela_model->removerela($user, $userx)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function changepassword()
	{
		if (!$this->session->userdata('user_s')) {
			blockpage();
		}
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->input->post('ok')) {
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password');
			$this->form_validation->set_rules('new_password', 'New Password', 'required');
			$this->form_validation->set_rules('new_password_r', 'Password', 'required|matches[new_password]');
			if ($this->form_validation->run()) {
				$id = $this->session->userdata('user_s')['id'];
				$pass = $this->input->post('new_password');
				if ($this->user_model->updatepassword($id, $pass)) {
					redirect(base_url(),'refresh');
				}
			}
		}
		$data['temp'] = 'site/user/change-password';
		$data['fixedtitle'] = 'Change password';
		$this->load->view('site/main', $data);
	}
	public function check_password($pass)
	{
		$this->load->model('user_model');
		$id = $this->session->userdata('user_s')['id'];
		if ($this->user_model->check_password($id, $pass)) {
			return true;
		} else 
		{
			$this->form_validation->set_message('check_password', 'Mật khẩu cũ không đúng');
			return false;
		}
		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */