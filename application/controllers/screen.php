<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Screen extends CI_Controller {

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
			
					$mydata['items'] = $this->Itemm->findall();
					$mydata['categories'] = $this->Categorym->findall();
					$mydata['featuredhome'] = $this->Layoutm->get_home_featured();
					$mydata['title'] = $this->Actionm->read_title();
					$mydata['catscreen'] = $this->Layoutm->get_home_categorytoscreen();
					$mydata['newsapp'] = $this->Layoutm->get_home_newsapptoscreen();
					$mydata['reca'] = $this->Layoutm->get_home_recatoscreen();
					$mydata['recb'] = $this->Layoutm->get_home_recbtoscreen();
		
					$datakirim['data'] = $mydata;
		
					$this->load->view('screen/index', $datakirim);
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
			
			$mydata['items'] = $this->Itemm->findall();
			$mydata['categories'] = $this->Categorym->findall();
			$mydata['featuredhome'] = $this->Layoutm->get_home_featured();
			$mydata['title'] = $this->Actionm->read_title();
			$mydata['catscreen'] = $this->Layoutm->get_home_categorytoscreen();
			$mydata['newsapp'] = $this->Layoutm->get_home_newsapptoscreen();
			$mydata['reca'] = $this->Layoutm->get_home_recatoscreen();
			$mydata['recb'] = $this->Layoutm->get_home_recbtoscreen();
		
			$datakirim['data'] = $mydata;
		
			$this->load->view('screen/index', $datakirim);
		}
	}
	
	function category_layout($id_category)
	{
		$this->load->model(array('Itemm','Layoutm','Categorym', 'Actionm'));
		
		$mydata['items'] = $this->Itemm->findallbycategory($id_category);
		$mydata['categories'] = $this->Categorym->categoryselected($id_category);
		//$mydata['catscreen'] = $this->Layoutm->get_cat_subcategorytoscreen($id_category);
		$mydata['featuredcategory'] = $this->Layoutm->get_category_featured($id_category);
		$mydata['newsapp'] = $this->Layoutm->get_cat_newsapptoscreen($id_category);
		$mydata['reca'] = $this->Layoutm->get_cat_recatoscreen($id_category);
		$mydata['recb'] = $this->Layoutm->get_cat_recbtoscreen($id_category);
		$mydata['title'] = $this->Actionm->read_title();
		$datakirim['data'] = $mydata;
		
		$this->load->view('screen/catlayout_view', $datakirim);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */