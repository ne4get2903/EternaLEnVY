<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	var $table = 'user';
	public function createuser($data = array())
	{
		if ($this->create($data)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function checkuser($data = array())
	{
		if ($this->check_exists($data)) {
			return true;
		}
		else{
			return false;
		}
	}
	public function getuserid($data = array())
	{
		if ($this->get_info_rule($data, 'id')) {
			return $this->get_info_rule($data, 'id');
		}
		else
		{
			return false;
		}
	}
	public function getlistuser($where = '')
	{
		$query = $this->db->query('select * from user where username like "%'.$where.'%" or name like "%'.$where.'%" or email like "%'.$where.'%" order by datetime asc ');
		return $query->result();
	}
	public function getuserinfo($id)
	{
		$input['where'] = array('id' => $id );
		return $this->get_row($input);
	}
	public function updateinfo($id, $data = array())
	{
		if ($this->update($id, $data)) {
			return true;
		}
		else
		{
			return false;
		}

	}
	public function updatepassword($id, $pass)
	{
		$data = array('pass' => $pass);
		if ($this->update($id, $data)) {
			return true;
		} else {
			return false;
		}
	}
	public function check_password($user, $password)
	{
		$input['where'] = array('id' => $user, 'pass' => $password );
		if ($this->get_row($input)) {
			return true;
		} else {
			return false;
		}
	}
	public function getalluser()
	{
		if ($this->get_list()) {
			return $this->get_list();
		}
		else
			return false;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */