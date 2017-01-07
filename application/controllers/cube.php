<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cube extends CI_Controller {

public function index()
	{
		$this->load->model(array('Userm','Itemm','Layoutm','Categorym', 'Actionm'));
		
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
					$this->load->view('screen/changep');
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
		
			$this->load->view('screen/changep');
		}
	}
	
	public function changepass()
	{
		$this->load->helper('security');
		$this->load->model('Actionm');
		
		$ousr = $this->input->post('oldusr');
		$opass = $this->input->post('oldpass');
		$nusr = $this->input->post('nusr');
		$npass = $this->input->post('npass');
		
		$str1 = md5($opass);
		//$str1 = do_hash($opass); // SHA1
		//$str1 = do_hash($str1, 'md5'); // MD5
		
		//$str = do_hash($npass); // SHA1
		//$str = do_hash($str, 'md5'); // MD5
		$data = $this->Actionm->get_pass();
		foreach($data as $pass)
		{
			if(($pass['usrname']==$ousr)&&($pass['passwd']==$str1))
			{
				$setpass = array("usrname" => $nusr, "passwd" => md5($npass));
				$this->Actionm->update_pass($setpass, $pass['id']);
			}
		}
		redirect('cube');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */