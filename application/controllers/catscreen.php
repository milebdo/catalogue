<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catscreen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper(array('form', 'url', 'file'));
	}
	
	function index()
	{
		$this->load->model(array('Userm','Itemm','Layoutm','Categorym'));
	
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
					$config["base_url"] = site_url('catscreen/index');
					$config['next_link'] = 'Next &raquo;';
					$config['prev_link'] = '&laquo; Back';
					$config['last_link'] = '<b>Last &rsaquo;</b>';
					$config['first_link'] = '<b>&lsaquo; First</b>';
					$config["total_rows"] = $this->Categorym->record_count();
					$config["per_page"] = 5;
					$config["uri_segment"] = 3;
					$choice = $config["total_rows"] / $config["per_page"];
					$config["num_links"] = 10;
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
					$mydata['categories'] = $this->Categorym->read_data($config["per_page"], $page);
					$mydata['items'] = $this->Itemm->findall();
					$mydata['links'] = $this->pagination->create_links();
					$datakirim['data'] = $mydata;
	
					if($this->input->post('upload')){
						$this->Gallery_model->do_upload();
					}
					$this->load->view('screen/cat_view', $datakirim);
						}
						else
							$this->load->view('screen/usrlog');
			}
		}
		else
		{	
			$data['cd'] = '';
		 	$config = array();
		 	$config["base_url"] = site_url('catscreen/index');
		 	$config['next_link'] = 'Next &raquo;';
		 	$config['prev_link'] = '&laquo; Back';
		 	$config['last_link'] = '<b>Last &rsaquo;</b>';
			$config['first_link'] = '<b>&lsaquo; First</b>';
		 	$config["total_rows"] = $this->Categorym->record_count();
		 	$config["per_page"] = 5;
		 	$config["uri_segment"] = 3;
		 	$choice = $config["total_rows"] / $config["per_page"];
		 	$config["num_links"] = 10;
		 	$this->pagination->initialize($config);
		 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$jadi['id'] = $this->session->userdata("id");
			$jadi['username'] = $this->session->userdata("usrname");
			$mydata['datalog'] = $jadi;
	
		 	$mydata['categories'] = $this->Categorym->read_data($config["per_page"], $page);
		 	$mydata['items'] = $this->Itemm->findall();
		 	$mydata['links'] = $this->pagination->create_links();
		 	$datakirim['data'] = $mydata;
	
		 	if($this->input->post('upload')){
				$this->Gallery_model->do_upload();
			}
			$this->load->view('screen/cat_view', $datakirim);
		}

	}
	
	public function getExtension($str) {
	
		$i = strrpos($str,".");
		if (!$i) {
			return "";
		}
	
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	
	public function getajaxcategory()
	{
		$this->load->model('Categorym');
	
		$id = $this->input->post('id');
	
		$dataarray = $this->Categorym->get_category($id);
	
		$outputarray = array();
	
		$outputarray['id'] = $dataarray[0]['id'];
		$outputarray['title'] = $dataarray[0]['nama'];
		$outputarray['iconlink'] = $dataarray[0]['icon'];

		echo json_encode($outputarray);
	}
	
	public function getajaxscategory()
	{
		$this->load->model('Categorym');
	
		$id = $this->input->post('id');
	
		$dataarray = $this->Categorym->get_scategory($id);
	
		$outputarray = array();
	
		$outputarray['id'] = $dataarray[0]['id'];
		$outputarray['title'] = $dataarray[0]['nama'];
		$outputarray['iconl'] = $dataarray[0]['icon'];

		echo json_encode($outputarray);
	}
	
	public function updatecategory()
	{
		$this->load->model('Categorym');
		
		$config['upload_path'] = './file/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		$iditem = $this->input->post('iditem');
			
		$datasource = array("nama" => $this->input->post("label"));
		
		$linkimg = "";
		$linkicon = "";
		
	if($this->upload->do_upload("icon"))
		{
			$gcat = $this->Categorym->get_category($iditem);
			foreach ($gcat as $row)
			{
			/*	$x = explode("/", $row['icon']);
				$num=count($x);
				$pname = trim($x[$num-1]);
				$cat = trim($x[$num-2]);
				$uploads = trim($x[$num-3]);
				$file = trim($x[$num-4]);*/
				$path = './'.$row['icon'];
				unlink($path);
			}
			
			$dataicon = $this->upload->data("icon");
			$source = "file/uploads/".$dataicon['file_name'];
			$destination	= "file/uploads/categories/" ;
			chmod($source, 0777);
				
			// Limit Width Resize
			$limit_medium   = 40;
				
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $dataicon['image_width'] > $dataicon['image_height'] ? $dataicon['image_width'] : $dataicon['image_height'] ;
				
			// Percentase Resize
			if ($limit_use > $limit_medium) {
				$percent_medium = $limit_medium/$limit_use ;
			}
				
		        $imgw   = $limit_use > $limit_medium ?  $dataicon['image_width'] * $percent_medium : $dataicon['image_width'] ;
                        $imgh  = $limit_use > $limit_medium ?  $dataicon['image_height'] * $percent_medium : $dataicon['image_height'] ;

                        //list($dataicon['image_width'], $dataicon['image_height']) = getimagesize($source);

                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

			$datasource["icon"] = $destination.$dataicon['raw_name'].$dataicon['file_ext'];
                        $get = $destination.$dataicon['raw_name'].$dataicon['file_ext'];
                        chmod($get,0777);

			$path = './'.$source;
			unlink($path);
			$linkicon = $datasource["icon"];
		}
		
		$hasilnya = $this->Categorym->update_category($datasource,$iditem);
		
		if($hasilnya > 0)
			echo "{\"status\":\"update data berhasil\", \"icon\":\"$get\"}";
		else
			echo "{\"status\":\"update data gagal\"}";
	}
	
	public function addcategory()
	{
		$this->load->model('Categorym');
	
		$config['upload_path'] = './file/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
	
		$this->load->library('upload', $config);
			
		$datasource = array("nama" => $this->input->post("alabel"));
		$datasource["id_parent"] = 1;
		//$get ='';
	
		if($this->upload->do_upload("aicon"))
		{
			$dataicon = $this->upload->data("aicon");
			$source = "file/uploads/".$dataicon['file_name'];
			$destination	= "file/uploads/categories/" ;
			chmod($source, 0777);
			
			// Limit Width Resize
			$limit_medium   = 40;
			
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $dataicon['image_width'] > $dataicon['image_height'] ? $dataicon['image_width'] : $dataicon['image_height'] ;
			
			// Percentase Resize
			if ($limit_use > $limit_medium) {
				$percent_medium = $limit_medium/$limit_use ;
			}
			
			////// Making MEDIUM /////////////
			$imgw   = $limit_use > $limit_medium ?  $dataicon['image_width'] * $percent_medium : $dataicon['image_width'] ;
			$imgh  = $limit_use > $limit_medium ?  $dataicon['image_height'] * $percent_medium : $dataicon['image_height'] ;
			
			//list($dataicon['image_width'], $dataicon['image_height']) = getimagesize($source);

   			if($dataicon['image_width'] > $dataicon['image_height']){
     				 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
   			}else{
     				 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
   			}
   			exec("convert ".$destination.$dataicon['raw_name'].$dataicon['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
			
			$datasource["icon"] = $destination.$dataicon['raw_name'].$dataicon['file_ext'];
			$get = $destination.$dataicon['raw_name'].$dataicon['file_ext'];
			chmod($get,0777);
			$path = './'.$source;
			unlink($path);
		}

		$idlast = $this->Categorym->add_category($datasource);
			
		if($idlast > 0)
		{
			echo "{\"status\":\"input data berhasil\", \"id\":\"$idlast\", \"img\":\"file/uploads/categories/".$dataicon['file_name']."\"}";
		}
			else
				echo "{\"status\":\"input data gagal\"}";
	}
	
	
	function delete()
	{
		$this->load->model(array('Categorym'));
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->Categorym->get_data($kode);
		if ($result == null) {
			redirect('catscreen');
		} else {
			$gcat = $this->Categorym->get_category($kode);
			foreach ($gcat as $row)
			{
				$x = explode("/", $row['icon']);
				$num=count($x);
				$pname = trim($x[$num-1]);
				$cat = trim($x[$num-2]);
				$uploads = trim($x[$num-3]);
				$file = trim($x[$num-4]);
				$path = './'.$file.'/'.$uploads.'/'.$cat.'/'.$pname;
				unlink($path);
			}
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
