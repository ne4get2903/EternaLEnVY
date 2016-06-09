<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function index()
	{
		$this->load->model('contact_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->input->post('ok')) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('comments', 'Comment', 'required|min_length[15]');
			if ($this->form_validation->run()) {
				$contact['name'] = $this->input->post('name');
				$contact['email'] = $this->input->post('email');
				$contact['contact'] = $this->input->post('comments');
				$this->contact_model->sendcontact($contact);
				?>
				<script>
					alert('Thank for your contacts');
				</script>
				<?php
			}
		}
		$data['temp'] = 'site/contact/index';
		$data['fixedtitle'] = 'Liên hệ';
		$this->load->view('site/main', $data);
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */