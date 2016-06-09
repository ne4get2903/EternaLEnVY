<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends MY_Model {

	var $table = 'contact';

	public function Sendcontact($data = array())
	{
		$data['date'] = gettimenow();
		if ($this->create($data)) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function getcontactlist()
	{
		$input['order'] = array('status','asc');
		if ($this->get_list($input)) {
			return $result = $this->get_list($input);
		}
		else
		{
			return false;
		}
	}
}

/* End of file contact_model.php */
/* Location: ./application/models/contact_model.php */