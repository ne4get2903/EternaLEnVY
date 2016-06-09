<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_model extends MY_Model {
	var $table = 'cat';

	public function get_list_cat($cat = '')
	{
		//$list = $this->get_list();
		//return $list;
		$this->db->query("set autocommit = 0");
		$this->db->query("set session transaction isolation level read uncommitted");
		$this->db->trans_start();
		$query = $this->db->query(" SELECT * from cat ");
		//$this->db->query(" SELECT sleep(10) ");
		$this->db->trans_complete();
		if ($this->db->trans_status() === false) {
			return false;
		}
		else
			$list = $query->result();
			return $list;
	}
	public function addCat($cat = '')
	{
		$this->db->trans_start();
		//$this->db->query(" set session transaction isolation level read committed ");
		$this->db->query(" INSERT INTO cat (catname, description) VALUES ('".$cat['catname']."','".$cat['description']."') ");
		$this->db->query(" SELECT sleep(10) ");
		$this->db->trans_complete();
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
		}
		else
			$this->db->trans_commit();
	}
}

/* End of file cat_model.php */
/* Location: ./application/models/cat_model.php */