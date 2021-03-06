<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Itemscreen extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper("url");
	}
	
	function index()
	{
		$this->load->model(array('Userm','Itemm','Categorym'));
		
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
					$config["base_url"] = site_url('itemscreen/index');
					$config["total_rows"] = $this->Itemm->record_count();
					$config["per_page"] = 10;
					$config["uri_segment"] = 3;
					$choice = $config["total_rows"] / $config["per_page"];
					$config["num_links"] = round($choice);
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$mydata['items'] = $this->Itemm->read_data($config["per_page"], $page);
					$mydata['categoriesitem'] = $this->Categorym->findall();
					$mydata['links'] = $this->pagination->create_links();
					$datakirim['data'] = $mydata;
					
					if($this->input->post('upload')){
						$this->Gallery_model->do_upload();
					}
					
					$this->load->view('screen/item_view', $datakirim);
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
			$config["base_url"] = site_url('itemscreen/index');
			$config["total_rows"] = $this->Itemm->record_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$mydata['items'] = $this->Itemm->read_data($config["per_page"], $page);
			$mydata['categoriesitem'] = $this->Categorym->findall();
			$mydata['links'] = $this->pagination->create_links();
			$datakirim['data'] = $mydata;
			
			if($this->input->post('upload')){
				$this->Gallery_model->do_upload();
			}
			
			$this->load->view('screen/item_view', $datakirim);
		}
	}
	
	function update_item($id_item)
	{
		$this->load->model(array('Itemm','Layoutm','Categorym'));
	
		$mydata['items'] = $this->Itemm->finditembyid($id_item);
		$mydata['categories'] = $this->Categorym->findall();
		$datakirim['data'] = $mydata;
	
		$this->load->view('screen/updateitem_view', $datakirim);
	}
	
	function delete()
	{
		$this->load->helper('file');
		$this->load->model(array('Itemm'));
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->Itemm->get_data($kode);
		if ($result == null) {
			redirect('itemscreen');
		} else {
			$gcat = $this->Itemm->get_item($kode);
			if($gcat > 0){
				foreach ($gcat as $row)
				{
					$icopath = './'.$row['icon'];
					$imgpath = './'.$row['image'];
					if(file_exists($icopath))
						unlink($icopath);
					if(file_exists($imgpath))
						unlink($imgpath);
				}
			}
			
			$g480 = $this->Itemm->get_480($kode);
			if($g480 > 0){
				foreach ($g480 as $row)
				{
					$icopath = './'.$row['icourl'];
					$imgpath = './'.$row['imgurl'];
					if(file_exists($icopath))
						unlink($icopath);
					if(file_exists($imgpath))
						unlink($imgpath);
				}
			}
			
			$g320 = $this->Itemm->get_320($kode);
			if($g320 > 0){
				foreach ($g320 as $row)
				{
					$icopath = './'.$row['icourl'];
					$imgpath = './'.$row['imgurl'];
					if(file_exists($icopath))
						unlink($icopath);
					if(file_exists($imgpath))
						unlink($imgpath);
				}
			}
				
			$g240 = $this->Itemm->get_240($kode);
			if($g240 > 0){
				foreach ($g240 as $row)
				{
					$icopath = './'.$row['icourl'];
					$imgpath = './'.$row['imgurl'];
					if(file_exists($icopath))
						unlink($icopath);
					if(file_exists($imgpath))
						unlink($imgpath);
				}
			}
			$g220 = $this->Itemm->get_220($kode);
			if($g220 > 0){
				foreach ($g220 as $row)
				{
					$icopath = './'.$row['icourl'];
					$imgpath = './'.$row['imgurl'];
					if(file_exists($icopath))
						unlink($icopath);
					if(file_exists($imgpath))
						unlink($imgpath);
				}
			}
			
			$g176 = $this->Itemm->get_176($kode);
			if($g176 > 0){
				foreach ($g176 as $row)
				{
					$icopath = './'.$row['icourl'];
					$imgpath = './'.$row['imgurl'];
					if(file_exists($icopath))
						unlink($icopath);
					if(file_exists($imgpath))
						unlink($imgpath);
				}
			}
			$delete[1] = $this->Itemm->delete_item($kode);
			$delete[2] = $this->Itemm->delete_480($kode);
			$delete[3] = $this->Itemm->delete_320($kode);
			$delete[4] = $this->Itemm->delete_240($kode);
			$delete[5] = $this->Itemm->delete_220($kode);
			$delete[6] = $this->Itemm->delete_176($kode);
			$delete[7] = $this->Itemm->delete_tocreca($kode);
			$delete[8] = $this->Itemm->delete_tocrecb($kode);
			$delete[9] = $this->Itemm->delete_tonew($kode);
			// tampilkan information message
			if ($delete) $this->session->set_flashdata('message', 'Data deleted!');
			else $this->session->set_flashdata('message', 'Failed to delete data!');
			redirect('itemscreen');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
