<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userreport_model extends MY_Model {

	public function getreportlist()
	{
		$sql = ' SELECT DISTINCT report, COUNT(report) AS count_report, user.username, user.status, user.role FROM userreport, user WHERE user.id = userreport.report GROUP BY report order by count_report desc';
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

}

/* End of file photoreport_model.php */
/* Location: ./application/models/photoreport_model.php */