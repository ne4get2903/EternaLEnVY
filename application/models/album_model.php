<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends MY_Model {

	var $table = 'album';

	public function getalbumid($data = array())
	{
		if ($this->get_row($data)) {
			return $this->get_row($data)->id;
		}
		else {
			return false;
		}
	}

	public function insertalbum($data = array())
	{
		if ($this->create($data)) {
			return true;
		} else {
			return false;
		}
	}

	public function getalbum($value='')
	{
		$album['where'] = array('id' => $value);
		if ($this->get_row($album))
		{
			return $this->get_row($album);
		}
		else
		{
			return false;
		}
	}
	public function getlistalbum($where ='')
	{
		$query = $this->db->query('select * from album where name like "%'.$where.'%" order by date desc ');
		return $query->result();
	}
	public function count_album()
	{
		$result = array();
		if ($this->get_total()) {
			$result['total'] = $this->get_total();
		}
		$time = getdate();
		$result['count_by_date'] = array();
		for ($i=6; $i >= 0; $i--) {
			$date = mktime($time['hours'], $time['minutes'], $time['seconds'],$time['mon'], ($time ['mday'] - $i), $time['year']);
			$dateweek[$i] = date('Y/m/d H:m:s', $date);
			$result['count_by_date'][$i] = $this->get_total_date($dateweek[$i]);
		}
		return $result;
	}
}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */