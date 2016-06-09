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
}

/* End of file photo_model.php */
/* Location: ./application/models/photo_model.php */