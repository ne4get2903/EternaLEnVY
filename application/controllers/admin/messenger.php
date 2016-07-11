<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messenger extends MY_Controller {

	public function index()
	{
		$this->load->model('contact_model');
		$contactlist = $this->contact_model->getcontactlist();
		$data['contactlist'] = $contactlist;
		//pre($contactlist);
		$data['temp'] = 'admin/messenger/index';
		$this->load->view('admin/main', $data);
	}
	public function readmess()
	{
		$this->load->model('contact_model');
		$id = $this->input->get("contact");
		$data = array("status" => "1");
		$this->contact_model->update($id, $data);
		$messContent = $this->contact_model->readcontact($id);
		$mess = <<<EOF
		<!-- CONTENT MAIL -->
	        <div class="inbox-body">
	          <div class="mail_heading row">
	            <div class="col-xs-2">
	              <div class=" btn-group">
	                <button idmess="$messContent->id" class="btn btn-sm btn-default" type="button">
	                <i class="fa fa-trash-o fa-2x" ></i>
	                </button>
	              </div>
	            </div>
	            <div class="col-md-4  text-right">
	              <p class="date"></p>
	            </div>
	          </div>
	        </div>
	          <div class="sender-info">
	            <div class="row">
	              <div class="col-md-12">
	                <strong>$messContent->name</strong>
	                <span>($messContent->email)</span> to
	                <strong>EternaLEnVy</strong>
	                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
	              </div>
	            </div>
	          </div>
	          <div class="view-mail">
	            $messContent->contact;
	          </div>
	          <div class="form-group">
	            <label class="control-label col-xs-1">Trả lời</label>
	            <div class="col-xs-11">
	                <textarea type="reply" class="form-control" placeholder="Nội dung" rows="3"></textarea>
	            </div>
	            <div class="col-xs-offset-10 col-xs-2">
	              <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Reply</button>
	            </div>
	          </div>
	      <!-- /CONTENT MAIL -->
EOF;
		echo $mess;
	}
	public function delete()
	{
		$this->load->model('contact_model');
		$id = $this->input->get("contact");
		$this->contact_model->deletecontact($id);
	}
}

/* End of file messenger.php */
/* Location: ./application/controllers/admin/messenger.php */