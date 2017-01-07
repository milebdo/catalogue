<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller
{	
	function index()
	{	
		$this->load->model('Logm');
		$getdate = date("F j, Y, g:i a");
		$sendlog = $this->Logm->insert_log(array("id_item"=>$_GET['iditem'], "imsi"=>$_GET['imsi'], "id_app"=>$_GET['idapp'], "date"=>$getdate));
	  	//$this->load->view('screen/log_view', $getdata);
		if($sendlog > 0)
			echo "LOG SUCCESS";
	}
}
?>