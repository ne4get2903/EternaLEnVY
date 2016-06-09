<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photoreport_model extends MY_Model {

	public function getreportlist()
	{
		$sql = ' SELECT DISTINCT report, photo.id, photo.link, user.username, user.name, description , COUNT(report) as count_report FROM photoreport, photo, user WHERE photoreport.report = photo.id AND photo.user = user.id GROUP BY photoreport.report order by count_report desc';
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

}

/* End of file photoreport_model.php */
/* Location: ./application/models/photoreport_model.php */