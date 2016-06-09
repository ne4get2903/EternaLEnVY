<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testtran extends MY_Controller {

	public function index()
	{
		$this->db->trans_start(TRUE);
		//$this->db->query(" set session transaction isolation level read uncommitted ");
		$this->db->query(" INSERT INTO cat VALUES ('6', '8','c') ");
		$this->db->query(" SELECT sleep(10) ");
		$this->db->trans_complete();
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
		}
		else
			$this->db->trans_commit();
	}
	public function testtran2()
	{
		$this->load->model('cat_model');
		$list = $this->cat_model->get_list_cat();
		pre($list);
	}
	public function tran1()
	{
		$this->db->trans_start();
		$this->db->query("SET AUTOCOMMIT=0");
		$this->db->query("set session transaction isolation level read committed");
		$a1 = $this->db->query("select * from user");
		$a2 = $this->db->query("select sleep(10)");
		$a3 = $this->db->query("select * from user");


		if ($a1 && $a2 && $a3)
		{
		    $this->db->trans_commit();
		    echo "unrepeatable","<br>";


		    echo "select 1","<br>";
		    pre($a1->result());

		    echo "select 2","<br>";
		    pre($a3->result());

		}
		else
		{
	    	$this->db->trans_rollback();
		}
	}
	public function tran2()
	{
		$this->db->trans_start();
		$this->db->query("SET AUTOCOMMIT = 0");
		$a1 = $this->db->query(" INSERT INTO user (`id`, `username`, `pass`) VALUES ('13', 'oknuane','metvkl') ");
		if ($a1) {
			$this->db->trans_commit();
			echo 'ok';
		}
		else
		{
			$this->db->trans_rollback();
			echo 'fail';
		}
	}

}

/* End of file testtran.php */
/* Location: ./application/controllers/testtran.php */