<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Limit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper("url");
	}
	
	function index()
	{
		$this->load->model(array('Userm','Actionm'));
		
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
					
					$timedata['datalog'] = $jadi;
			
					$config = array();
					$config["base_url"] = site_url('limit/index');
					$config["total_rows"] = $this->Actionm->record_count();
					$config["per_page"] = 10;
					$config["uri_segment"] = 3;
					//$choice = $config["total_rows"] / $config["per_page"];
					$config["num_links"] = 10;
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					$timedata['gettime'] = $this->Actionm->read_limit();
					$timedata['getstime'] = $this->Actionm->read_slimit();
					$timedata['getclaim'] = $this->Actionm->read_disc();
					$timedata['judul'] = $this->Actionm->read_title();
					$timedata['log'] = $this->Actionm->read_records($config["per_page"], $page);
					$timedata['links'] = $this->pagination->create_links();
					$data['set'] = $timedata;
					$this->load->view('screen/limit_view', $data);
				}
				else
					$this->load->view('screen/usrlog');
			}
		}
		else
		{	
			$jadi['id'] = $this->session->userdata("id");
			$jadi['username'] = $this->session->userdata("usrname");
			$timedata['datalog'] = $jadi;
			
			$config = array();
			$config["base_url"] = site_url('limit/index');
			$config["total_rows"] = $this->Actionm->record_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			//$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = 10;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$timedata['gettime'] = $this->Actionm->read_limit();
			$timedata['getstime'] = $this->Actionm->read_slimit();
			$timedata['getclaim'] = $this->Actionm->read_disc();
			$timedata['judul'] = $this->Actionm->read_title();
			$timedata['log'] = $this->Actionm->read_records($config["per_page"], $page);
			$timedata['links'] = $this->pagination->create_links();
			$data['set'] = $timedata;
			$this->load->view('screen/limit_view', $data);
		}
	}
	
	public function getidlimit()
	{
		$this->load->model('Actionm');
		
		$type = $this->input->post('setd');
		$num = $this->input->post('slimit');
		
		$timedata['gettime'] = $this->Actionm->read_limit();
		foreach ($timedata['gettime'] as $limit)
		{
			$data['time'] = $this->Actionm->get_limit($limit['id']);
		}
		if(!empty($data['time']))
		{
			foreach ($data['time'] as $time)
			{
				$id = $time['id'];
			}
			$this->Actionm->delete_limit($id);
		}
		
		if($type == 1)
		{
			$this->Actionm->insert_limit(array("time" => $num, "type" => 1));
		}
		if($type == 2)
		{
			$num = $num * 7;
			$this->Actionm->insert_limit(array("time" => $num, "type" => 2));
		}
		if($type == 3)
		{
			$num = $num * 30;
			$this->Actionm->insert_limit(array("time" => $num, "type" => 3));
		}
		if($type == 4)
		{
			$num = $num * 365;
			$this->Actionm->insert_limit(array("time" => $num, "type" => 4));
		}
		
		redirect('limit/index');
		
	}
	
	public function getidslimit()
	{
		$this->load->model('Actionm');

		$num = $this->input->post('slimit');
	
		$timedata['gettime'] = $this->Actionm->read_slimit();
		foreach ($timedata['gettime'] as $limit)
		{
			$data['time'] = $this->Actionm->get_slimit($limit['id']);
		}
		if(!empty($data['time']))
		{
			foreach ($data['time'] as $time)
			{
				$id = $time['id'];
			}
			$this->Actionm->delete_slimit($id);
		}
			$this->Actionm->insert_slimit(array("time" => $num));
		redirect('limit/index');
	
	}
	
	public function updatedisclaimer()
	{
		$this->load->model('Actionm');
		$idids = 0; $idpre = 0;//$this->input->post('iditem');
		$action = 0;$flagg = 0; $desck = NULL;
		$gettext = $this->input->post("descdis");
		$getflag = $this->input->post("flagdis");
                $data['getdata'] = $this->Actionm->read_disc();
		if(!empty($data['getdata']))
		{                
		  foreach($data['getdata'] as $data)
		  {
		    if($getflag==0) $flagg = $data['status'];
		    else $flagg = $this->input->post("flagdis");
		    if(empty($gettext))
		      $desck = $data['claimsms'];
                    else $desck = $this->input->post("descdis");
		  }
		}
		else
		{
		   $desck = $this->input->post("descdis");
		   $flagg = $this->input->post("flagdis");
		}
			
		$datasource = array("claimsms" => $desck,"status" => $flagg);
		
		$timedata['getclaim'] = $this->Actionm->read_disc();
		foreach ($timedata['getclaim'] as $limit)
		{
			$data['claim'] = $this->Actionm->get_sms($limit['id']);
			$idpre = $limit['id'];
		}
		if(!empty($data['claim']))
		{
			foreach ($data['claim'] as $time)
			{
				$id = $time['id'];
			}
			$this->Actionm->delete_sms($id);
		}
		
		$hasilnya = $this->Actionm->insert_sms($datasource);
				
		if($getact == 1)
		{
			
			$timedata['getid'] = $this->Actionm->read_disc();
			foreach ($timedata['getid'] as $limit)
			{
				$idids = $limit['id'];
			}
				
		}
		else
		{
		  	$timedata['getid'] = $this->Actionm->read_disc();
			foreach ($timedata['getid'] as $limit)
			{
				$idids = $limit['id'];
			}
		}
	
		redirect('limit/index');
	}
	
	
	public function addtitle()
	{
		$this->load->model('Actionm');
			
		$datasource = array("title" => $this->input->post("alabel"));
		$idlast = $this->Actionm->add_title($datasource);
			
		if($idlast > 0)
			echo "{\"status\":\"input data berhasil\"}";
			else
				echo "{\"status\":\"input data gagal\"}";
	}
	
	public function getajaxtitle()
	{
		$this->load->model('Actionm');
	
		$id = $this->input->post('id');
	
		$dataarray = $this->Actionm->get_title($id);
	
		$outputarray = array();
	
		$outputarray['id'] = $dataarray[0]['id'];
		$outputarray['title'] = $dataarray[0]['ntitle'];

		echo json_encode($outputarray);
	}
	
	public function updatetitle()
	{
		$this->load->model('Actionm');
		$iditem = $this->input->post('idlimit');
		$datasource = array("ntitle" => $this->input->post("slabel"));
		$hasilnya = $this->Actionm->update_title($datasource,$iditem);
		
		if($hasilnya > 0)
			echo "{\"status\":\"update data berhasil\"}";
		else
			echo "{\"status\":\"update data gagal\"}";
	}
	
	public function addcategory()
	{
		$this->load->model('Categorym');
	
		$config['upload_path'] = './file/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
	
		$this->load->library('upload', $config);
			
		$datasource = array("nama" => $this->input->post("alabel"));
		$datasource["id_parent"] = 1;
	
		if($this->upload->do_upload("aicon"))
		{
			$dataicon = $this->upload->data("aicon");
			$datasource["icon"] = base_url().$dataicon['file_name'];
		}

		$idlast = $this->Categorym->add_category($datasource);
			
		if($idlast > 0)
			echo "{\"status\":\"input data berhasil\", \"id\":\"$idlast\", \"img\":\"file/uploads/".$dataimage['file_name']."\"}";
			else
				echo "{\"status\":\"input data gagal\"}";
	}
	
	function delete_title()
	{
		$this->load->model(array('Categorym'));
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->Categorym->get_title($kode);
		if ($result == null) {
			redirect('limit');
		} else {
			$delete = $this->Categorym->delete_title($kode);
			// tampilkan information message
			if ($delete) $this->session->set_flashdata('message', 'Data deleted!');
			else $this->session->set_flashdata('message', 'Failed to delete data!');
			redirect('limit');
		}
	}
	
	function delete()
	{
		$this->load->model(array('Categorym'));
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->Categorym->get_data($kode);
		if ($result == null) {
			redirect('catscreen');
		} else {
			$delete[0] = $this->Categorym->delete_category($kode);
			// tampilkan information message
			if ($delete) $this->session->set_flashdata('message', 'Data deleted!');
			else $this->session->set_flashdata('message', 'Failed to delete data!');
			redirect('catscreen');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
