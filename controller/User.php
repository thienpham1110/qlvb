<?php
session_start();
class User
{
	public function login_index()
	{
		$admin_sub_view = 'login.php';
		include "view/view_index.php";
	} 
	public function register_index()
	{
		$admin_sub_view = 'register.php';
		include "view/view_index.php";
	}  

	public function dashboard_index()
	{
		$admin_sub_view = 'dashboard.php';
		include "view/view_index.php";
	}   

	function register() {
		include "model/User_model.php";

		$b=new User_model();
		$name = isset($_POST['name'])?$_POST['name']:'';
		$username = isset($_POST['username'])?$_POST['username']:'';
		$pass = isset($_POST['pass'])?$_POST['pass']:'';
		$cfpass = isset($_POST['cfpass'])?$_POST['cfpass']:'';
		$role = isset($_POST['role'])?$_POST['role']:'';
		
		if($pass !=$cfpass){
			echo "<script>alert('Mật khẩu nhập lại không chính xác')</script>";
		}else{
			$pass=md5($pass);
		}
		$check=$b->checkAdmin($username,$pass);
		if($check >0 ) {
			echo "<script>alert('user da ton tai')</script>";
		}	
		else{
			$user=$b->register($username,$pass,$name,$role);				
		}				
		$_SESSION['register_success'] = 'Đăng ký thành công!';
		header('location:index.php?ctrl=user&func=login_index');
	}

	public function login()
	{
		include "model/User_model.php";
		$u=new User_model;
		$username = isset($_POST['username'])?$_POST['username']:'';
		$pass = isset($_POST['pass'])?$_POST['pass']:'';
		if(!$u->checkAdmin($username,$pass)){
			echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác!')</script>";	
			header('location:index.php?ctrl=user&func=login_index');
		}else{
			$row = $u->getAccount($username, $pass);
			$_SESSION['admin_login']= $row;
			$_SESSION['login_success'] = 'Đăng nhập thành công!';
			header('location:index.php?ctrl=user&func=dashboard_index');
		}
				
	}
	public function logoutad()
	{
		unset($_SESSION['admin_login']);
		header('location:index.php');
	}
	
	// function dangky() {
	// 	include "model/User_model.php";
	// 	include "model/Loai_model.php";
	// 	include "model/Monan_model.php";
	// 	include "model/Nhahang_model.php";
		
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$subview = 'khachhang/register_index.php';
    //     include "view/view.php";
	// }
	
	// function getAccount(){
	// 	include "model/User_model.php";
		
	// 	$email = isset($_SESSION['user'])?$_SESSION['user']:'';
	// 	$b=new User_model();
	// 	$data=$b->getAccount($email);		
		
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$subview = 'khachhang/khachhang_account.php';
    //     include "view/view.php";
	// }
	// function updateU(){
	// 	include "model/User_model.php";
	// 	$b=new User_model();
	// 	$email = isset($_SESSION['user'])?$_SESSION['user']:'';
	// 	$tenkh = isset($_POST['tenkh'])?$_POST['tenkh']:'';
	// 	$diachi = isset($_POST['diachi'])?$_POST['diachi']:'';
	// 	$sdt = isset($_POST['dienthoai'])?$_POST['dienthoai']:'';

	// 	$data=$b->updateUser($email,$tenkh,$diachi,$sdt);
	// 	$b=new User_model();
	// 	$data=$b->getAccount($email);
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$subview = 'khachhang/khachhang_account.php';
    //     include "view/view.php";
	// }
	// function updateMK(){
	// 	include "model/User_model.php";
	// 	$b=new User_model();
	// 	$email = isset($_SESSION['user'])?$_SESSION['user']:'';
	// 	$mk = isset($_POST['nmk'])?$_POST['nmk']:'';
	// 	$nmk=md5($mk);

	// 	$data=$b->updateMK($email,$nmk);
	// 	$b=new User_model();
	// 	$data=$b->getAccount($email);
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$subview = 'khachhang/khachhang_account.php';
    //     include "view/view.php";
	// }
	// function xemhoadonU()
	// {
	// 	include "model/Giohang_model.php";
    //     $b=new giohang_model();
	// 	$email=isset($_GET['email'])?$_GET['email']:"";
	// 	$page=1;
	// 	if(isset($_GET['page']))
	// 		$page=$_GET['page'];
	// 	$start=($page-1)*HOADON_TRANG;		
	// 	$data=$b->getHoadonCT($start,$email);
	// 	$tongtrang=ceil($b->tongsoHD()/HOADON_TRANG);
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$func='xemhoadonU';

	// 	$subview='khachhang/hoadon_user.php';
	// 	include "view/view.php";
	// }
	// function chitietHDU()
	// {
	// 	include "model/Giohang_model.php";
    //     $b=new giohang_model();
	// 	$data=$b->getChiTietHD($_GET['mahd']);
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$subview='khachhang/chitiethd_user.php';
	// 	include "view/view.php";
	// }
	// function xoaHD(){
	// 	include "model/Giohang_model.php";
    //     $b=new giohang_model();
	// 	$email=isset($_GET['email'])?$_GET['email']:"";
	// 	$mahd=isset($_GET['mahd'])?$_GET['mahd']:"";
	// 	$email1 = isset($_SESSION['user'])?$_SESSION['user']:'';
	// 	$delete=$b->xoaHD($mahd);
	// 	$page=1;
	// 	if(isset($_GET['page']))
	// 		$page=$_GET['page'];
	// 	$start=($page-1)*HOADON_TRANG;		
	// 	$data=$b->getHoadonCT($start,$email);
	// 	$tongtrang=ceil($b->tongsoHD()/HOADON_TRANG);
	// 	$b=new Loai_model();
	// 	$loais=$b->getAllLoai();
	// 	$b=new Nhahang_model();
	// 	$nhahangs=$b->getAllNhaHang();
	// 	$func='xoaHD';
	// 	header('location:index.php?ctrl=user&func=xemhoadonU&email='.$email1);
	// 	$subview='khachhang/hoadon_user.php';
	// 	include "view/view.php";
	// }
}
?>