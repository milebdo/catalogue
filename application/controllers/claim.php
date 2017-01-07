<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Claim extends CI_Controller
{	
	function index()
	{	
		$this->load->model('actionm');
		
		$getdata['getclaim'] = $this->actionm->read_disc();
		if(!empty($getdata['getclaim']))
		{
			foreach ($getdata['getclaim'] as $get){ 
				$json['message'] = $get['claimsms'];
				$json['popup'] = $get['status'];
			}
		}
		else $json = null;
		$getsetdata = $this->actionm->read_action();
		if(!empty($getsetdata))
		{
			//$alldata = array();
			foreach ($getsetdata as $seq){
				$dataaction = array();
				$action = $this->actionm->getitemcategoryreg();
				$dataaction = $action;
				//array_push($dataaction,$action);
				$json['sequence'] = $dataaction;
			}
		}
		echo json_encode($json);
	}

	function counterview($iditem)
	{
		$this->load->model('itemm');
		
		if($this->itemm->update_view($iditem))
			$json['status'] = true;
		else
			$json['status'] = false;

		echo json_encode($json);
	}
}
?>
