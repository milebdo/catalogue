<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function getajaxitem()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		$id = $this->input->post('id');
		$dataarray = $this->Itemm->get_item($id);

		$outputarray = array();
		
		$outputarray['id'] = $dataarray[0]['id'];
		$outputarray['title'] = $dataarray[0]['title'];
		$outputarray['label'] = $dataarray[0]['label'];
		$outputarray['rating'] = $dataarray[0]['rating'];
		$outputarray['desc'] = $dataarray[0]['desc'];
		$outputarray['iconlink'] = $dataarray[0]['icon'];
		$outputarray['imagelink'] = $dataarray[0]['image'];
		$outputarray['id_category'] = $dataarray[0]['id_category'];
		$outputarray['flagg'] = $dataarray[0]['flag'];
		
		echo json_encode($outputarray);
	}
	
	public function getaction()
	{
		$this->load->model('Actionm');
		$id = $this->input->post('id');
		$dataarray = $this->Actionm->get_action($id);
	
		$outputarray = array();
	
		$outputarray['id'] = $dataarray[0]['id'];
		$outputarray['action'] = $dataarray[0]['action'];
		$dataaksi = array();
		$dataarrayaksi = $this->Actionm->get_data($outputarray['id']);
		
		foreach($dataarrayaksi as $rowaksi)
		{
			array_push($dataaksi,$rowaksi);
		}
	
		$outputarray['dataaksi'] = $dataaksi;
		
		echo json_encode($outputarray);
	}
	
	public function getajaxsms()
	{
		$this->load->model('Actionm');
		$dataarray = $this->Actionm->get_smsx();
	
		$outputarray = array();
		$outputarray['id'] = $dataarray[0]['id'];
		$outputarray['desc'] = $dataarray[0]['claimsms'];
		$outputarray['flagg'] = $dataarray[0]['status'];
	
		echo json_encode($outputarray);
	}
	
	public function updatefeaturedlayout()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		
		$idkategori = $this->input->post('idkategori');
		$idscreen = $this->input->post('idscreen');
		$datalayoutmentah = $this->input->post('datalayout');
		
		$this->Layoutm->delete_featureditem($idkategori);
		$datalayoutpecah = explode("-",$datalayoutmentah);
		
		foreach($datalayoutpecah as $datalay)
		{
			$this->Layoutm->insert_featureditem(array("id_item" => $datalay, "id_screen" => $idscreen, "category_id_page" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updatecategorylayout()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
	
		$idkategori = $this->input->post('idkategori');
		$idkat = $this->input->post('idkat');
		$idscreen = $this->input->post('idscreen');
		$datalayoutmentah = $this->input->post('datalayout');
	
		$this->Layoutm->delete_featuredcat($idkat);
		$datalayoutpecah = explode("-",$datalayoutmentah);
		$idx = 0;
		foreach($datalayoutpecah as $datalay)
		{
			$this->Layoutm->insert_featuredcat(array("id_item" => $datalay, "id_screen" => $idscreen, "sort" =>$idx, "id_category" => $idkat, "category_id_page" => $idkategori));
			$idx++;
		}
	
		echo "update succeed";
	}
	
	public function updatecategorytoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
		
		$this->Layoutm->delete_catscreen($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
		
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_catscreen(array("id_category" => $datalay, "category_id_page" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updatenewsapptoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
		
		$this->Layoutm->delete_newsapp($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
		
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_newsapp(array("id_item" => $datalay, "category_id_page" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updatecatnewsapptoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
	
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
	
		$this->Layoutm->delete_catnewcatapp($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
	
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_newcatapps(array("id_item" => $datalay, "id_category" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updatecatrecatoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
	
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
	
		$this->Layoutm->delete_catreca($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
	
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_catreca(array("id_item" => $datalay, "id_category" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updatecatrecbtoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
	
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
	
		$this->Layoutm->delete_catrecb($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
	
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_catrecb(array("id_item" => $datalay, "id_category" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updaterecatoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
		
		$this->Layoutm->delete_reca($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
		
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_reca(array("id_item" => $datalay, "category_id_page" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function updaterecbtoscreen()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		
		$idkategori = $this->input->post('idkategori');
		$dataappmentah = $this->input->post('dataapp');
		
		$this->Layoutm->delete_recb($idkategori);
		$dataapppecah = explode("-",$dataappmentah);
		
		foreach($dataapppecah as $datalay)
		{
			$this->Layoutm->insert_recb(array("id_item" => $datalay, "category_id_page" => $idkategori));
		}
	
		echo "update succeed";
	}
	
	public function addaction()
	{
		$this->load->model('Actionm');
		
		$vars = $this->input->post("aaction");
		
		$datasource = array("action" => $vars);
		
		$ok = $this->Actionm->add_action($datasource);
		
		if($this->input->post("aaction"))
		{
				$dd = 0;
				foreach($this->input->post("short") as $nomor)
				{
					$msgcr = $this->input->post("msg");
					$wait = $this->input->post("del");
					$tr = $this->input->post("trac");
		
					$datareg = array("id_set" => $ok, "wait" => $wait[$dd], "shortcode" => $nomor, "message" => $msgcr[$dd], "tracking" => $tr[$dd]);
					$this->Actionm->add_reg($datareg);
					$dd++;
				}
		}
	
		if($ok > 0)
			echo "{\"status\":\"input data berhasil\"}";
		else
			echo "{\"status\":\"input data gagal\"}";
	}
	
	public function updateaction()
	{
		$this->load->model('Actionm');
	
		$idaction = $this->input->post('iditem');
		$idset = $this->Actionm->actionparent($idaction);
		
		if($idset > 0)
		{
			$datasource = array("action" => $this->input->post("action"));
			
			$pass = $this->Actionm->update_actionset($datasource, $idset);
			
				if($this->input->post("action"))
				{
			
					$this->Actionm->delete_reg($idset);
			
					$dd = 0;
					foreach($this->input->post("short") as $nomor)
					{
						$msgcr = $this->input->post("msg");
						$wait = $this->input->post("del");
						$tr = $this->input->post("trac");
			
						$datareg = array("id_set" => $idset, "wait" => $wait[$dd], "shortcode" => $nomor, "message" => $msgcr[$dd], "tracking" => $tr[$dd]);
						$this->Actionm->add_reg($datareg);
						$dd++;
					}
				}
			
				if($pass > 0)
					echo "{\"status\":\"update data berhasil\"}";
				else
					echo "{\"status\":\"update data gagal\"}";
		}
			
		/*	foreach ($idset['tes'] as $id)
			{
				
				$g = $id['id_set'];
				echo "{\"status\":\"update data berhasil\", \"id\":\"$g\"}";
				$pass = $this->Actionm->update_actionset($datasource, $id['id_set']);
				
				if($pass > 0)
				{
					if($this->input->post("action"))
					{
						
						$this->Actionm->delete_reg($idaction);
						
						$dd = 0;
						foreach($this->input->post("short") as $nomor)
						{
							$msgcr = $this->input->post("msg");
							$wait = $this->input->post("del");
							$tr = $this->input->post("trac");
								
							$datareg = array("id_set" => $g, "wait" => $wait[$dd], "shortcode" => $nomor, "message" => $msgcr[$dd], "tracking" => $tr[$dd]);
							$this->Actionm->add_reg($datareg);
							$dd++;
						}
					}
						
					if($pass > 0)
						echo "{\"status\":\"update data berhasil\"}";
					else
						echo "{\"status\":\"update data gagal\"}";
				}
			}*/
	}
	
	public function updateactionn()
	{
		$this->load->model('Actionm');
	
		$idaction = $this->input->post('iditem');
		$idset = $this->Actionm->actionparent($idaction);
		if($idset > 0)
		{
			$datasource = array("action" => $this->input->post("action"));
			
			foreach ($idset as $id)
			{
				$pass = $this->Actionm->update_actionset($datasource, $id['id_set']);
				
				if($pass > 0)
				{
					$datas = array("shortcode" => $this->input->post("srtcode"), "message" => $this->input->post("msg"), "wait" =>$this->input->post("delay"),
							"tracking" => $this->input->post("track"));
					
					$ok = $this->Actionm->update_action($datas,$idaction);
					
					if($ok > 0)
						echo "{\"status\":\"update data berhasil\"}";
					else
						echo "{\"status\":\"update data gagal\"}";
				}
			}				
		}
	}

	public function addajaxitem()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		
		$config['upload_path'] = './file/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
			
		$datasource = array("title" => $this->input->post("atitle"), "label" => $this->input->post("alabel"), "rating" =>$this->input->post("arating"), 
				            "desc" => $this->input->post("adesc"), "id_category" => $this->input->post("aid_category"), "flag" => $this->input->post("aflag"));
		
		if($this->upload->do_upload("aicon"))
		{
			$dataicon = $this->upload->data("aicon");
			
			$source = "file/uploads/".$dataicon['file_name'];
			$destination	= "file/uploads/cms/" ;
			$des480	= "file/uploads/s480/" ;
			$des320	= "file/uploads/s320/" ;
			$des240	= "file/uploads/s240/" ;
			$des220	= "file/uploads/s220/" ;
			$des176	= "file/uploads/s176/" ;
			chmod($source, 0777);
				
			/// Limit Width Resize
			$cmssize = 40;
			$siz1 = 96;
			$siz2 = 64;
			$siz3 = 48;
			$siz4 = 44;
			$siz5 = 35;
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $dataicon['image_width'] > $dataicon['image_height'] ? $dataicon['image_width'] : $dataicon['image_height'] ;
				
			// Percentase Resize
			if ($limit_use > $cmssize || $limit_use > $siz1 || $limit_use > $siz2 || $limit_use > $siz3 || $limit_use > $siz4 || $limit_use > $siz5) {
				$percent_medium = $cmssize/$limit_use;
				$percent_480 = $siz1/$limit_use;
				$percent_320 = $siz2/$limit_use;
				$percent_240 = $siz3/$limit_use;
				$percent_220 = $siz4/$limit_use;
				$percent_176 = $siz5/$limit_use;
			}
				
			////// Making MEDIUM /////////////
			 $imgw   = $limit_use > $cmssize ?  $dataicon['image_width'] * $percent_medium : $dataicon['image_width'] ;
                        $imgh  = $limit_use > $cmssize ?  $dataicon['image_height'] * $percent_medium : $dataicon['image_height'] ;

                         if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $datasource["icon"] = $destination.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 480 /////////////
                        $imgw   = $limit_use > $siz1 ?  $dataicon['image_width'] * $percent_480 : $dataicon['image_width'] ;
                        $imgh  = $limit_use > $siz1 ?  $dataicon['image_height'] * $percent_480 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des480.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des480.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data480['icourl'] = $des480.$dataicon['raw_name'].$dataicon['file_ext'];
                        
                        ////// Making 320 /////////////
                        $imgw = $limit_use > $siz2 ?  $dataicon['image_width'] * $percent_320 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz2 ?  $dataicon['image_height'] * $percent_320 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des320.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des320.$dataicon['raw_name'].$dataicon['file_ext']);
                        }
$data320['icourl'] = $des320.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 240 /////////////
                        $imgw = $limit_use > $siz3 ?  $dataicon['image_width'] * $percent_240 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz3 ?  $dataicon['image_height'] * $percent_240 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des240.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des240.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data240['icourl'] = $des240.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 220 /////////////
                        $imgw = $limit_use > $siz4 ?  $dataicon['image_width'] * $percent_220 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz4 ?  $dataicon['image_height'] * $percent_220 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des220.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des220.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data220['icourl'] = $des220.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 176 /////////////
                        $imgw = $limit_use > $siz5 ?  $dataicon['image_width'] * $percent_176 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz5 ?  $dataicon['image_height'] * $percent_176 : $dataicon['image_height'] ;

                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des176.$dataicon['raw_name'].$dataicon['file_ext']);
}else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des176.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data176['icourl'] = $des176.$dataicon['raw_name'].$dataicon['file_ext'];
			
			$path = './'.$source;
			unlink($path);
		}
		
		if($this->upload->do_upload("aimage"))
		{
			$dataimage = $this->upload->data("aimage");
			$source = "file/uploads/".$dataimage['file_name'];
			$destination = "file/uploads/cms/";
			$des480	= "file/uploads/s480/" ;
			$des320	= "file/uploads/s320/" ;
			$des240	= "file/uploads/s240/" ;
			$des220	= "file/uploads/s220/" ;
			$des176	= "file/uploads/s176/" ;
			chmod($source, 0777);
								
			// Limit Width Resize
			$cmssize   = 190;
			$siz1 = 465;
			$siz2 = 305;
			$siz3 = 225;
			$siz4 = 205;
			$siz5 = 161;
			
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $dataimage['image_width'] > $dataimage['image_height'] ? $dataimage['image_width'] : $dataimage['image_height'] ;
			
			// Percentase Resize
			if ($limit_use > $cmssize || $limit_use > $siz1 || $limit_use > $siz2 || $limit_use > $siz3 || $limit_use > $siz4 || $limit_use > $siz5) {
				$percent_medium = $cmssize/$limit_use;
				$percent_480 = $siz1/$limit_use;
				$percent_320 = $siz2/$limit_use;
				$percent_240 = $siz3/$limit_use;
				$percent_220 = $siz4/$limit_use;
				$percent_176 = $siz5/$limit_use;
			}
				
			////// Making MEDIUM /////////////
			 $imgw = $limit_use > $cmssize ?  $dataimage['image_width'] * $percent_medium : $dataimage['image_width'] ;
                        $imgh = $limit_use > $cmssize ?  $dataimage['image_height'] * $percent_medium : $dataimage['image_height'] ;
			//exec("convert ".$source." -resize \".$imgw."x".$imgh.">\ -quality 100 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                         exec("convert ".$destination.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);

                        $datasource["image"] = $destination.$dataimage['raw_name'].$dataimage['file_ext'];

                        ////// Making 480 /////////////
                        $imgw = $limit_use > $siz1 ?  $dataimage['image_width'] * $percent_480 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz1 ?  $dataimage['image_height'] * $percent_480 : $dataimage['image_height'] ;
			//exec("convert ".$source." -resize \".$imgw."x".$imgh.">\ -quality 100 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des480.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data480['imgurl'] = $des480.$dataimage['raw_name'].$dataimage['file_ext'];

////// Making 320 /////////////
                        $imgw  = $limit_use > $siz2 ?  $dataimage['image_width'] * $percent_320 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz2 ?  $dataimage['image_height'] * $percent_320 : $dataimage['image_height'] ;
			
			//exec("convert ".$source." -resize \".$imgw."x".$imgh.">\ -quality 100 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des320.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data320['imgurl'] = $des320.$dataimage['raw_name'].$dataimage['file_ext'];

////// Making 240 /////////////
                        $imgw = $limit_use > $siz3 ?  $dataimage['image_width'] * $percent_240 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz3 ?  $dataimage['image_height'] * $percent_240 : $dataimage['image_height'] ;
		//	exec("convert ".$source." -resize \".$imgw."x".$imgh.">\ -quality 100 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des240.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data240['imgurl'] = $des240.$dataimage['raw_name'].$dataimage['file_ext'];

                        ////// Making 220 /////////////
                        $imgw = $limit_use > $siz4 ?  $dataimage['image_width'] * $percent_220 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz4 ?  $dataimage['image_height'] * $percent_220 : $dataimage['image_height'] ;
			//exec("convert ".$source." -resize \".$imgw."x".$imgh.">\ -quality 100 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des220.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data220['imgurl'] = $des220.$dataimage['raw_name'].$dataimage['file_ext'];

////// Making 176 /////////////
                        $imgw = $limit_use > $siz5 ?  $dataimage['image_width'] * $percent_176 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz5 ?  $dataimage['image_height'] * $percent_176 : $dataimage['image_height'] ;
	//		exec("convert ".$source." -resize \".$imgw."x".$imgh.">\ -quality 100 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des176.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data176['imgurl'] = $des176.$dataimage['raw_name'].$dataimage['file_ext'];			
			$path = './'.$source;
			unlink($path);
		}
		
		$idlast = $this->Itemm->add_item($datasource);			
		
		$data480["iditem"] = $idlast;
		$data320["iditem"] = $idlast;
		$data240["iditem"] = $idlast;
		$data220["iditem"] = $idlast;
		$data176["iditem"] = $idlast;
		
		$this->Itemm->add_img480($data480);
		$this->Itemm->add_img320($data320);
		$this->Itemm->add_img240($data240);
		$this->Itemm->add_img220($data220);
		$this->Itemm->add_img176($data176);
			
		if($idlast > 0)
			echo "{\"status\":\"input data berhasil\", \"id\":\"$idlast\", \"img\":\"file/uploads/".$dataimage['file_name']."\"}";
		else
			echo "{\"status\":\"input data gagal\"}";
	}
	
	public function updateajaxitem()
	{
		$this->load->model(array('Itemm','Actionm','Layoutm'));
		$this->load->helper('url');
		
		$config['upload_path'] = './file/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
	
		$this->load->library('upload',$config);
		//$this->load->initialize($config);
		$iditem = $this->input->post('iditem');
			
		$datasource = array("title" => $this->input->post("title"), "label" => $this->input->post("label"), "rating" =>$this->input->post("rating"),
				      "desc" => $this->input->post("desc"), "id_category" => $this->input->post("aid_category"), "flag" => $this->input->post("flag"));
		
		$linkimg = "";
		$linkicon = "";
		
		if($this->upload->do_upload("icon"))
		{
			$gcat = $this->Itemm->get_item($iditem);
			if($gcat > 0){
				foreach ($gcat as $row)
				{
					$icopath = './'.$row['icon'];
					if(file_exists($icopath))
					   unlink($icopath);
				}
			}
			$g480 = $this->Itemm->get_480($iditem);
			if($g480 > 0){
				foreach ($g480 as $row)
				{
					$icopath = './'.$row['icourl'];
					if(file_exists($icopath))
					unlink($icopath);
				}
			}
			$g320 = $this->Itemm->get_320($iditem);
			if($g320 > 0){
				foreach ($g320 as $row)
				{
					$icopath = './'.$row['icourl'];
					if(file_exists($icopath))
					unlink($icopath);
				}
			}
			$g240 = $this->Itemm->get_240($iditem);
			if($g240 > 0){
				foreach ($g240 as $row)
				{
					$icopath = './'.$row['icourl'];
					if(file_exists($icopath))
					unlink($icopath);
				}
			}
			$g220 = $this->Itemm->get_220($iditem);
			if($g220 > 0){
				foreach ($g220 as $row)
				{
					$icopath = './'.$row['icourl'];
					if(file_exists($icopath))
					unlink($icopath);
				}
			}
			$g176 = $this->Itemm->get_176($iditem);
			if($g176 > 0){
				foreach ($g176 as $row)
				{
					$icopath = './'.$row['icourl'];
					if(file_exists($icopath))
					unlink($icopath);
				}
			}
			$dataicon = $this->upload->data("icon");
			
			$source = "file/uploads/".$dataicon['file_name'];
			$destination	= "file/uploads/cms/" ;
			$des480	= "file/uploads/s480/" ;
			$des320	= "file/uploads/s320/" ;
			$des240	= "file/uploads/s240/" ;
			$des220	= "file/uploads/s220/" ;
			$des176	= "file/uploads/s176/" ;
			chmod($source, 0777);
				
			/* Resizing Processing */
				
			/// Limit Width Resize
			$cmssize = 40;
			$siz1 = 96;
			$siz2 = 64;
			$siz3 = 48;
			$siz4 = 44;
			$siz5 = 35;
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $dataicon['image_width'] > $dataicon['image_height'] ? $dataicon['image_width'] : $dataicon['image_height'] ;
				
			// Percentase Resize
			if ($limit_use > $cmssize || $limit_use > $siz1 || $limit_use > $siz2 || $limit_use > $siz3 || $limit_use > $siz4 || $limit_use > $siz5) {
				$percent_medium = $cmssize/$limit_use;
				$percent_480 = $siz1/$limit_use;
				$percent_320 = $siz2/$limit_use;
				$percent_240 = $siz3/$limit_use;
				$percent_220 = $siz4/$limit_use;
				$percent_176 = $siz5/$limit_use;
			}
				
			////// Making MEDIUM /////////////
			 $imgw   = $limit_use > $cmssize ?  $dataicon['image_width'] * $percent_medium : $dataicon['image_width'] ;
                        $imgh  = $limit_use > $cmssize ?  $dataicon['image_height'] * $percent_medium : $dataicon['image_height'] ;

                         if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$destination.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $datasource["icon"] = $destination.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 480 /////////////
                        $imgw   = $limit_use > $siz1 ?  $dataicon['image_width'] * $percent_480 : $dataicon['image_width'] ;
                        $imgh  = $limit_use > $siz1 ?  $dataicon['image_height'] * $percent_480 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des480.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des480.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data480['icourl'] = $des480.$dataicon['raw_name'].$dataicon['file_ext'];
                        
                        ////// Making 320 /////////////
                        $imgw = $limit_use > $siz2 ?  $dataicon['image_width'] * $percent_320 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz2 ?  $dataicon['image_height'] * $percent_320 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des320.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des320.$dataicon['raw_name'].$dataicon['file_ext']);
                        }
$data320['icourl'] = $des320.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 240 /////////////
                        $imgw = $limit_use > $siz3 ?  $dataicon['image_width'] * $percent_240 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz3 ?  $dataicon['image_height'] * $percent_240 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des240.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des240.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data240['icourl'] = $des240.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 220 /////////////
                        $imgw = $limit_use > $siz4 ?  $dataicon['image_width'] * $percent_220 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz4 ?  $dataicon['image_height'] * $percent_220 : $dataicon['image_height'] ;
                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des220.$dataicon['raw_name'].$dataicon['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des220.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data220['icourl'] = $des220.$dataicon['raw_name'].$dataicon['file_ext'];

                        ////// Making 176 /////////////
                        $imgw = $limit_use > $siz5 ?  $dataicon['image_width'] * $percent_176 : $dataicon['image_width'] ;
                        $imgh = $limit_use > $siz5 ?  $dataicon['image_height'] * $percent_176 : $dataicon['image_height'] ;

                        if($dataicon['image_width'] > $dataicon['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des176.$dataicon['raw_name'].$dataicon['file_ext']);
}else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des176.$dataicon['raw_name'].$dataicon['file_ext']);
                        }

                        $data176['icourl'] = $des176.$dataicon['raw_name'].$dataicon['file_ext'];
                                 
					
			$path = './'.$source;
			unlink($path);
			
			$this->Itemm->update_img480($data480, $iditem);
			$this->Itemm->update_img320($data320, $iditem);
			$this->Itemm->update_img240($data240, $iditem);
			$this->Itemm->update_img220($data220, $iditem);
			$this->Itemm->update_img176($data176, $iditem);
		}
		
		if($this->upload->do_upload("image"))
		{
			$dataimage = $this->upload->data("image");
			
			$gcat = $this->Itemm->get_item($iditem);
			if($gcat > 0){
				foreach ($gcat as $row)
				{
					$imgpath = './'.$row['image'];
					if(file_exists($imgpath))
					unlink($imgpath);
				}
			}
			$g480 = $this->Itemm->get_480($iditem);
			if($g480 > 0){
				foreach ($g480 as $row)
				{
					$imgpath = './'.$row['imgurl'];
					if(file_exists($imgpath))
					unlink($imgpath);
				}
			}
			$g320 = $this->Itemm->get_320($iditem);
			if($g320 > 0){
				foreach ($g320 as $row)
				{
					$imgpath = './'.$row['imgurl'];
					if(file_exists($imgpath))
					unlink($imgpath);
				}
			}
			$g240 = $this->Itemm->get_240($iditem);
			if($g240 > 0){
				foreach ($g240 as $row)
				{
					$imgpath = './'.$row['imgurl'];
					if(file_exists($imgpath))
					unlink($imgpath);
				}
			}
			$g220 = $this->Itemm->get_220($iditem);
			if($g220 > 0){
				foreach ($g220 as $row)
				{
					$imgpath = './'.$row['imgurl'];
					if(file_exists($imgpath))
					unlink($imgpath);
				}
			}
			$g176 = $this->Itemm->get_176($iditem);
			if($g176 > 0){
				foreach ($g176 as $row)
				{
					$imgpath = './'.$row['imgurl'];
					if(file_exists($imgpath))
					unlink($imgpath);
				}
			}
			
			$source = "file/uploads/".$dataimage['file_name'];
			$destination = "file/uploads/cms/";
			$des480	= "file/uploads/s480/" ;
			$des320	= "file/uploads/s320/" ;
			$des240	= "file/uploads/s240/" ;
			$des220	= "file/uploads/s220/" ;
			$des176	= "file/uploads/s176/" ;
			chmod($source, 0777);
			
			/// Limit Width Resize
			$cmssize   = 190;
			$siz1 = 480;
			$siz2 = 320;
			$siz3 = 240;
			$siz4 = 220;
			$siz5 = 176;
				
			// Size Image Limit was using (LIMIT TOP)
			$limit_use  = $dataimage['image_width'] > $dataimage['image_height'] ? $dataimage['image_width'] : $dataimage['image_height'] ;
				
			// Percentase Resize
			if ($limit_use > $cmssize || $limit_use > $siz1 || $limit_use > $siz2 || $limit_use > $siz3 || $limit_use > $siz4 || $limit_use > $siz5) {
				$percent_medium = $cmssize/$limit_use;
				$percent_480 = $siz1/$limit_use;
				$percent_320 = $siz2/$limit_use;
				$percent_240 = $siz3/$limit_use;
				$percent_220 = $siz4/$limit_use;
				$percent_176 = $siz5/$limit_use;
			}
			
			////// Making MEDIUM /////////////
			 $imgw = $limit_use > $cmssize ?  $dataimage['image_width'] * $percent_medium : $dataimage['image_width'] ;
                        $imgh = $limit_use > $cmssize ?  $dataimage['image_height'] * $percent_medium : $dataimage['image_height'] ;
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                         exec("convert ".$destination.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$destination.$dataimage['raw_name'].$dataimage['file_ext']);

                        $datasource["image"] = $destination.$dataimage['raw_name'].$dataimage['file_ext'];

                        ////// Making 480 /////////////
                        $imgw = $limit_use > $siz1 ?  $dataimage['image_width'] * $percent_480 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz1 ?  $dataimage['image_height'] * $percent_480 : $dataimage['image_height'] ;
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des480.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des480.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data480['imgurl'] = $des480.$dataimage['raw_name'].$dataimage['file_ext'];

////// Making 320 /////////////
                        $imgw  = $limit_use > $siz2 ?  $dataimage['image_width'] * $percent_320 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz2 ?  $dataimage['image_height'] * $percent_320 : $dataimage['image_height'] ;
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des320.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des320.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data320['imgurl'] = $des320.$dataimage['raw_name'].$dataimage['file_ext'];

////// Making 240 /////////////
                        $imgw = $limit_use > $siz3 ?  $dataimage['image_width'] * $percent_240 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz3 ?  $dataimage['image_height'] * $percent_240 : $dataimage['image_height'] ;
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des240.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des240.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data240['imgurl'] = $des240.$dataimage['raw_name'].$dataimage['file_ext'];

                        ////// Making 220 /////////////
                        $imgw = $limit_use > $siz4 ?  $dataimage['image_width'] * $percent_220 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz4 ?  $dataimage['image_height'] * $percent_220 : $dataimage['image_height'] ;
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des220.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des220.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data220['imgurl'] = $des220.$dataimage['raw_name'].$dataimage['file_ext'];

////// Making 176 /////////////
                        $imgw = $limit_use > $siz5 ?  $dataimage['image_width'] * $percent_176 : $dataimage['image_width'] ;
                        $imgh = $limit_use > $siz5 ?  $dataimage['image_height'] * $percent_176 : $dataimage['image_height'] ;
                        if($dataimage['image_width'] > $dataimage['image_height']){
                                 exec("convert ".$source." -resize x".$imgw." -quality 100 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);
                        }else{
                                 exec("convert ".$source." -resize ".$imgh." -quality 100 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);
                        }
                        exec("convert ".$des176.$dataimage['raw_name'].$dataimage['file_ext']." -gravity Center -crop ".$imgw."x".$imgh."+0+0 ".$des176.$dataimage['raw_name'].$dataimage['file_ext']);

                        $data176['imgurl'] = $des176.$dataimage['raw_name'].$dataimage['file_ext'];
			$path = './'.$source;
			unlink($path);
			
			$this->Itemm->update_img480($data480, $iditem);
			$this->Itemm->update_img320($data320, $iditem);
			$this->Itemm->update_img240($data240, $iditem);
			$this->Itemm->update_img220($data220, $iditem);
			$this->Itemm->update_img176($data176, $iditem);
		}
		
		$hasilnya = $this->Itemm->update_item($datasource,$iditem);
		
		if($hasilnya > 0)
			echo "{\"status\":\"update data berhasil\", \"icon\":\"$linkicon\", \"img\":\"$linkimg\"}";
		else
			echo "{\"status\":\"update data gagal\"}";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
