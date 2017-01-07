<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper("url");
	}
	
	function index()
	{
		$this->load->model(array('Userm','Actionm','Categorym'));
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->input->get("aksi"))
		{
			$this->session->unset_userdata('username');
		}
		
		if(!$this->session->userdata("username"))
		{ 
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('screen/usrlog');
			}
			else
			{
				$userdata = $this->Userm->cek_user($this->input->post("username"), $this->input->post("password"));
				if(count($userdata) > 0)
				{
					$this->session->set_userdata("id",$userdata[0]['id']);
					$this->session->set_userdata("username",$userdata[0]['usrname']);
					
					$jadi['id'] = $userdata[0]['id'];
					$jadi['username'] = $userdata[0]['usrname'];
					
					$mydata['datalog'] = $jadi;
			
					$data['cd'] = '';
					$config = array();
					$config["base_url"] = site_url('action/index');
					$config["total_rows"] = $this->Actionm->rec_count();
					$config["per_page"] = 5;
					$config["uri_segment"] = 3;
					$choice = $config["total_rows"] / $config["per_page"];
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$mydata['getreg'] = $this->Actionm->read_act();
					$mydata['action'] = $this->Actionm->read_data($config["per_page"], $page);
					$mydata['links'] = $this->pagination->create_links();
					$datakirim['data'] = $mydata;
					
					$this->load->view('screen/action_view', $datakirim);
				}
				else
					$this->load->view('screen/usrlog');
			}
		}
		else
		{	
			$jadi['id'] = $this->session->userdata("id");
			$jadi['username'] = $this->session->userdata("usrname");
			$mydata['datalog'] = $jadi;
			
			$data['cd'] = '';
			$config = array();
			$config["base_url"] = site_url('action/index');
			$config["total_rows"] = $this->Actionm->rec_count();
			$config["per_page"] = 5;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$mydata['getreg'] = $this->Actionm->read_act();
			$mydata['action'] = $this->Actionm->read_data($config["per_page"], $page);
			$mydata['links'] = $this->pagination->create_links();
			$datakirim['data'] = $mydata;
				
			$this->load->view('screen/action_view', $datakirim);
		}
	}
	
	function delete()
	{
		$this->load->helper('file');
		$this->load->model('Actionm');
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->Actionm->get_action($kode);
		if ($result == null) {
			redirect('action');
		} else {
			$delete[1] = $this->Actionm->delete_action($kode);
			$delete[2] = $this->Actionm->delete_reg($kode);
			// tampilkan information message
			if ($delete) $this->session->set_flashdata('message', 'Data deleted!');
			else $this->session->set_flashdata('message', 'Failed to delete data!');
			redirect('action');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */