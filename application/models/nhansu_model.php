<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertToDb($ten,$tuoi,$sdt,$anhavatar,$sodonhang,$linkfb)
	{
		// xử lí thông tin và upload vào db
		$dulieu = array(
			'ten'=>$ten,
			'tuoi'=>$tuoi,
			'sdt'=>$sdt,
			'anhavatar'=>$anhavatar,
			'sodonhang'=>$sodonhang,
			'linkfb'=>$linkfb
		);
		$this->db->insert('nhan_vien', $dulieu);
//trả về id phần tử vừa insert vào bảng
		return $this->db->insert_id();
	}

	//lấy dữ liệu
	public function getAllData()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu ->result_array();
		return $dulieu;
	}
	public function getAllDataById($key)
	{
		$this->db->select('*');
		$this->db->where('id', $key);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu ->result_array();
		return $dulieu;
	}
	public function UpdateDataById($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$data = array(
			'id'=> $id,
			'ten'=> $ten,
			'tuoi'=> $tuoi,
			'sdt'=> $sdt,
			'anhavatar'=> $anhavatar,
			'linkfb'=> $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);
		
	}

	public function deleteDataById($id)
	{
		//kiểm tra xem id truyền vào có đúng trong db k
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
		
	}
	

}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */