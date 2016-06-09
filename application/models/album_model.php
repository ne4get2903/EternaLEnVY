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

}

/* End of file album_model.php */
/* Location: ./application/models/album_model.php */