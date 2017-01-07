<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getjavac extends CI_Controller
{	
	function index($idcategori, $gsize)
	{	
		$this->load->model('servicem');
		
		$getdata['getlimit'] = $this->servicem->getlimiter();
		
		foreach ($getdata['getlimit'] as $get){ 
		
		$json['response']['limiter'] = $get['time'];	
		}
		
		$getdata['getslimit'] = $this->servicem->getslimiter();
		
		foreach ($getdata['getslimit'] as $get){
		
			$json['response']['smslimiter'] = $get['time'];
		}

		$getdata['gettitle'] = $this->servicem->read_title();
			
			foreach ($getdata['gettitle'] as $get){
				if($get['id']==1)
					$c1 = $get['ntitle']; 
				if($get['id']==2)
					$c2 = $get['ntitle'];
				if($get['id']==3)
					$c3 = $get['ntitle'];
			}
		
		if($idcategori == 1)
		{	
			$json['response']['status'] = true;
			
			$json['response']['screen'] = array("Category", "Featured", $c1, $c2, $c3);
			
			$json['response']["Category"] =  $this->servicem->get_catdata($idcategori);

			if($gsize == 480)
			{
				$json['response']["Featured"] = $this->servicem->get_featured($idcategori, $gsize);
				
				$json['response'][$c1] = $this->servicem->get_reca($idcategori, $gsize);
				
				$json['response'][$c2] = $this->servicem->get_recb($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_news($idcategori, $gsize);
			}
			if($gsize == 320)
			{
				$json['response']["Featured"] = $this->servicem->get_featured($idcategori, $gsize);
			
				$json['response'][$c1] = $this->servicem->get_reca($idcategori, $gsize);
			
				$json['response'][$c2] = $this->servicem->get_recb($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_news($idcategori, $gsize);
			}
			if($gsize == 240)
			{
				$json['response']["Featured"] = $this->servicem->get_featured($idcategori, $gsize);
			
				$json['response'][$c1] = $this->servicem->get_reca($idcategori, $gsize);
			
				$json['response'][$c2] = $this->servicem->get_recb($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_news($idcategori, $gsize);
			}
			if($gsize == 220)
			{
				$json['response']["Featured"] = $this->servicem->get_featured($idcategori, $gsize);
			
				$json['response'][$c1] = $this->servicem->get_reca($idcategori, $gsize);
			
				$json['response'][$c2] = $this->servicem->get_recb($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_news($idcategori, $gsize);
			}
			if($gsize == 176)
			{
				$json['response']["Featured"] = $this->servicem->get_featured($idcategori, $gsize);
			
				$json['response'][$c1] = $this->servicem->get_reca($idcategori, $gsize);
			
				$json['response'][$c2] = $this->servicem->get_recb($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_news($idcategori, $gsize);
			}
		}
		if($idcategori > 1)
		{
			
			$json['response']['status'] = true;
			$json['response']['screen'] = array("Category", "Featured", $c1, $c2, $c3);
			$json['response']["Category"] =  $this->servicem->get_catdataa(1);
			
			if($gsize == 480)
			{
				$json['response']["Featured"] = $this->servicem->get_catfeatured($idcategori, $gsize);
			
				$json['response'][$c1] = $this->servicem->get_recalist($idcategori, $gsize);
			
				$json['response'][$c2] = $this->servicem->get_recblist($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_newlist($idcategori, $gsize);
			}
			if($gsize == 320)
			{
				$json['response']["Featured"] = $this->servicem->get_catfeatured($idcategori, $gsize);
					
				$json['response'][$c1] = $this->servicem->get_recalist($idcategori, $gsize);
					
				$json['response'][$c2] = $this->servicem->get_recblist($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_newlist($idcategori, $gsize);
			}
			if($gsize == 240)
			{
				$json['response']["Featured"] = $this->servicem->get_catfeatured($idcategori, $gsize);
					
				$json['response'][$c1] = $this->servicem->get_recalist($idcategori, $gsize);
					
				$json['response'][$c2] = $this->servicem->get_recblist($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_newlist($idcategori, $gsize);
			}
			if($gsize == 220)
			{
				$json['response']["Featured"] = $this->servicem->get_catfeatured($idcategori, $gsize);
					
				$json['response'][$c1] = $this->servicem->get_recalist($idcategori, $gsize);
					
				$json['response'][$c2] = $this->servicem->get_recblist($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_newlist($idcategori, $gsize);
			}
			if($gsize == 176)
			{
				$json['response']["Featured"] = $this->servicem->get_catfeatured($idcategori, $gsize);
					
				$json['response'][$c1] = $this->servicem->get_recalist($idcategori, $gsize);
					
				$json['response'][$c2] = $this->servicem->get_recblist($idcategori, $gsize);
					
				$json['response'][$c3] = $this->servicem->get_newlist($idcategori, $gsize);
			}
		}

	  	$this->load->view('screen/json_view', $json);
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