<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rela_model extends MY_Model {

	var $table = 'rela';

	public function getfollowrela($id = '')
	{
		$input['where'] = array('user' => $id, 'status' => '1');
		$input['order'] = array('datetime' => 'DESC');
		if ($this->get_list($input)) {
			return $this->get_list($input);
		}
		else
		{
			return false;
		}
	}
	public function getblockrela($id = '')
	{
		$input['where'] = array('user' => $id, 'status' => '0');
		$input['order'] = array('datetime' => 'DESC');
		if ($this->get_list($input)) {
			return $this->get_list($input);
		}
		else
		{
			return false;
		}
	}
	public function checkrela($user ='', $userx = '')
	{
		$input['where'] = array('user' => $user, 'userx' => $userx);
		if ($this->get_row($input)) {
			return $this->get_row($input);
		}
		else
		{
			return false;
		}
	}

	public function removerela($user ='', $userx = '')
	{
		$where = array('user' => $user, 'userx' => $userx);
		if ($this->del_rule($where))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function addfollow($user ='', $userx = '')
	{
		$data = array('user' => $user, 'userx' => $userx, 'status' => 1, 'datetime' => gettimenow());
		if ($this->create($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function addblock($user ='', $userx = '')
	{
		$data = array('user' => $user, 'userx' => $userx, 'status' => 0, 'datetime' => gettimenow());
		if ($this->create($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function updateblock($user ='', $userx = '')
	{
		$where = array('user' => $user, 'userx' => $userx);
		$data = array('status' => 0, 'datetime' => gettimenow());
		if ($this->update_rule($where, $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}

/* End of file rela_model.php */
/* Location: ./application/models/rela_model.php */