<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'UploadHandler.php';

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model-> getAllData();
		$ketqua =  array('mangketqua' => $ketqua);

	//truyền dữ liệu sang view
		$this->load->view('danhsachnhansu', $ketqua);
		
	}


	public function add()
	{

		// xử lí phần avatar
		$target_dir = "fileUpload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

// Check if file already exists
		// if (file_exists($target_file)) {
		// 	echo "file đã tồn tại ";
		// 	$uploadOk = 0;
		// }

// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Chỉ chấp nhận file chứa ảnh";
		$uploadOk = 0;
	}

// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "lỗi file chưa upload";
// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
			// echo "The file ". htmlspecialchars( basename( $_FILES["anhavatar"]["name"])). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}



	$ten = $this->input->post('ten');
	$tuoi = $this->input->post('tuoi');
	$sdt = $this->input->post('sdt');
	$linkfb = $this->input->post('linkfb');
	$sodonhang = $this->input->post('sodonhang');
	$anhavatar = base_url()."fileUpload/" .basename($_FILES['anhavatar']['name']);

//goi model
	$this->load->model('nhansu_model');
	$trangthai = $this->nhansu_model-> insertToDb($ten,$tuoi,$sdt,$anhavatar,$sodonhang,$linkfb);
	if($trangthai ){
		$this->load->view('insert_thanhcong');
	}
	else {
		echo("thất bại");
	}



} 

// lấy dữ liệu về để sửa 
public function editData($idNhanVao)
{
	$this->load->model('nhansu_model');
	$ketqua = $this->nhansu_model->getAllDataById($idNhanVao);// dựa vào id lấy ra dữ  liệu
	// đưa kết quả sang view sửa
	$ketqua = array('dulieuketqua'=>$ketqua);
	$this->load->view('editData_view', $ketqua);
}


// sửa dữ liệu
public function updateData()
{
	// lấy dữ liệu từ view
	$id = $this->input->post('id');
	$ten = $this->input->post('ten');
	$tuoi = $this->input->post('tuoi');
	$sdt = $this->input->post('sdt');
	$linkfb = $this->input->post('linkfb');
	$sodonhang = $this->input->post('sodonhang');
	
	//xử lí upload ảnh
// xử lí phần avatar
	$target_dir = "fileUpload/";
	$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

// Check if file already exists
		// if (file_exists($target_file)) {
		// 	echo "file đã tồn tại ";
		// 	$uploadOk = 0;
		// }

// Check file size
	if ($_FILES["anhavatar"]["size"] > 50000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		// echo "Chỉ chấp nhận file chứa ảnh";
		$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	// echo "lỗi file chưa upload";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
			// echo "The file ". htmlspecialchars( basename( $_FILES["anhavatar"]["name"])). " has been uploaded.";
	} else {
		// echo "Sorry, there was an error uploading your file.";
	}
}


	// $anhavatar = base_url()."fileUpload/" .basename($_FILES['anhavatar']['name']);
$anhavatar = basename($_FILES['anhavatar']['name']);

	//kiểm tra nếu upload ảnh thì lấy ảnh đó
	if($anhavatar) // nếu có ảnh mới
	{
		$anhavatar = base_url()."fileUpload/" .basename($_FILES['anhavatar']['name']);
	}
	else {
		$anhavatar = $this->input->post('anhavatarOld');

		
	}

	// nếu không upload thì lấy anhvatarOld bên view

	$this->load->model('nhansu_model');
	if($this->nhansu_model->UpdateDataById($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang))
	{
		$this->load->view('thanhcong_view');
	}
	else {
		
		$this->load->view('thanhcong_view');
	}

}
// xóa dữ liệu
public function deleteData($idNhanDuoc) 	 	
{
	
	$this->load->model('nhansu_model');
	// gọi hàm deleteDataById trong nhansu_model để xóa
	if($this->nhansu_model->deleteDataById($idNhanDuoc)){
		$this->load->view('deletethanhcong_view');
	}

}

// add by ajax
public function ajaxAdd() 	 	
{
	
	$ten = $this->input->post('ten');
	$tuoi = $this->input->post('tuoi');
	$sdt = $this->input->post('sdt');
	$linkfb = $this->input->post('linkfb');
	$sodonhang = $this->input->post('sodonhang');
	// $anhavatar = base_url()."fileUpload/" .basename($_FILES['anhavatar']['name']);
	$anhavatar = $this->input->post('anhavatar');

//goi model
	$this->load->model('nhansu_model');
	$trangthai = $this->nhansu_model-> insertToDb($ten,$tuoi,$sdt,$anhavatar,$sodonhang,$linkfb);
	if($trangthai ){
		echo("thanhcong"); 
	}
	else {
		echo("thất bại");
	}

}
public function  uploadfile()
{
	$uploadfile = new UploadHandler();

} 

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */