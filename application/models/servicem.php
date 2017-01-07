<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicem extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url');
    }
	
	function get_catdata($idcategory)
	{
		 $this->db->select('a.id, a.nama');
		 $this->db->from('category a, categorytoscreen b');
		 $this->db->where('b.category_id_page = '.$idcategory.' and a.id = b.id_category');
		 $this->db->order_by("b.id","asc");
		 $query = $this->db->get();
		 if ($query->num_rows() > 0)
		 {
			return $query->result_array();
		 }
		 else
		    return array();
	}
	
	function read_title()
	{
		$this->db->select('id, ntitle');
		$this->db->from('title');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function get_catdataa($idcategory)
	{
		 $this->db->select('a.id, a.nama');
		 $this->db->from('category a, categorytoscreen b');
		 $this->db->where('a.id = b.id_category');
		 $query = $this->db->get();
		 if ($query->num_rows() > 0)
		 {
			return $query->result_array();
		 }
		 else
		    return array();
	}

	function getlimiter()
	{
		$this->db->select("time");
		$this->db->from("limiter");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function getslimiter()
	{
		$this->db->select("time");
		$this->db->from("sms_limiter");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}

	function get_featured($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.desc, i.label, i.rating, s.icourl, s.imgurl, i.flag, f.id_screen');
		$this->db->from('item i, featuredtoitem f, ico_'.$size.' s');
		$this->db->where('i.id = f.id_item and f.category_id_page = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("f.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			$bungkusbaris;
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] = base_url().$baris['imgurl'];
				$imagesize = $baris['imgurl'];
				list($width, $height, $type, $attr) = getimagesize($imagesize);
				$baris['height'] = $height;
				$baris['width'] = $width;
				
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}

	function get_reca($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.desc, i.label, i.rating, s.icourl, s.imgurl, i.flag');
		$this->db->from('item i, recatoscreen f, ico_'.$size.' s');
		$this->db->where('i.id = f.id_item and f.category_id_page = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("f.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] = base_url().$baris['imgurl'];
				$baris['height'] = 100;
				$baris['width'] = 100;
 
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}

	function get_recb($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.desc, i.label, i.rating, s.icourl, s.imgurl, i.flag');
		$this->db->from('item i, recbtoscreen f, ico_'.$size.' s');
		$this->db->where('i.id = f.id_item and f.category_id_page = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("f.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] = base_url().$baris['imgurl'];
				$baris['height'] = 100;
				$baris['width'] = 100;
 
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}


	function get_news($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.label, i.desc, i.rating, s.icourl, s.imgurl, i.flag');
		$this->db->from('item i, newsapptoscreen n, ico_'.$size.' s');
		$this->db->where('i.id = n.id_item and n.category_id_page = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("n.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] = base_url().$baris['imgurl'];
				$baris['height'] = 100;
				$baris['width'] = 100;
 
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}


	function get_catfeatured($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.desc, i.label, i.rating, s.icourl, s.imgurl, i.flag, f.id_screen');
		$this->db->from('item i, categorytofeatured f, ico_'.$size.' s');
		$this->db->where('i.id = f.id_item and f.id_category = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("f.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			$bungkusbaris;
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] = base_url().$baris['imgurl'];
				$imagesize = $baris['imgurl'];
				list($width, $height, $type, $attr) = getimagesize($imagesize);
				$baris['height'] = $height;
				$baris['width'] = $width;
				
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}

	//-----------
	function get_recalist($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.label, i.desc, i.rating, s.icourl, s.imgurl, i.flag');
		$this->db->from('item i, catrecatoscreen f,  category c, ico_'.$size.' s');
		$this->db->where('c.id = i.id_category and i.id = f.id_item and f.id_category = c.id and c.id = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("f.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] =  base_url().$baris['imgurl'];
				$baris['height'] = 100;
				$baris['width'] = 100;
 
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}
	
	function get_recblist($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.label, i.desc, i.rating, s.icourl, s.imgurl, i.flag');
		$this->db->from('item i, catrecbtoscreen f,  category c, ico_'.$size.' s');
		$this->db->where('c.id = i.id_category and i.id = f.id_item and f.id_category = c.id and c.id = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("f.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] =  base_url().$baris['imgurl'];
				$baris['height'] = 100;
				$baris['width'] = 100;
	
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}
	
	function get_newlist($idcategori, $size)
	{
		$this->db->select('i.id, i.title, i.label, i.desc, i.rating, s.icourl, s.imgurl, i.flag');
		$this->db->from('item i, catnewappstoscreen n, category c, ico_'.$size.' s');
		$this->db->where('c.id = i.id_category and i.id = n.id_item and n.id_category = c.id and c.id = '.$idcategori.' and i.id = s.iditem');
		$this->db->order_by("n.id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$alldata = array();
			foreach($query->result_array() as $baris)
			{
				$baris['linkicon'] = base_url().$baris['icourl'];
				$baris['linkimage'] =  base_url().$baris['imgurl'];
				$baris['height'] = 100;
				$baris['width'] = 100;
	
				array_push($alldata,$baris);
			}
			return $alldata;
		}
		else
			return array();
	}
}

?>
