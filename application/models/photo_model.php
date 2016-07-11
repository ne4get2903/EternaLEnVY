<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_model extends MY_Model {

	var $table = 'photo';

	public function insertphoto($data = array())
	{
		if ($this->create($data)) {
			return true;
		} else {
			return false;
		}
	}
	public function getphoto($value='')
	{
		$photo['where'] = array('id' => $value);
		if ($this->get_row($photo))
		{
			return $this->get_row($photo);
		}
		else
		{
			return false;
		}
	}
	public function getphotoid($data = array())
	{
		if ($this->get_row($data)) {
			return $this->get_row($data)->id;
		}
		else
		{
			return false;
		}
	}
	public function getlistphoto($value='')
	{
		$photo['where'] = array('idalbum' => $value);
		if ($this->get_list($photo))
		{
			return $this->get_list($photo);
		}
		else
		{
			return false;
		}
	}
	public function deletephoto($photoid = '')
	{
		
	}
	public function count_photo()
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

/* End of file photo_model.php */
/* Location: ./application/models/photo_model.php */