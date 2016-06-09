<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline_model extends MY_Model {
	var $table = 'timeline';
	public function createtimeline($data = array())
	{
		if ($this->create($data)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function gettimeline($input = array())
	{
		if ($this->get_list($input)) {
			return $this->get_list($input);
		}
		else
		{
			return false;
		}
	}
}

/* End of file timeline_model.php */
/* Location: ./application/models/timeline_model.php */