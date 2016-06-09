<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

	public function index()
	{
		//$this->db->select('id', 'username');
		$this->db->where('role', '0');
		$query = $this->db->get('user');
		$result = $query->result();
		echo $result[0]->id;
		pre($result);
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */