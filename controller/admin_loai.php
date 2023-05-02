<?php
session_start();
class Admin_loai
{
	function __construct()
	{
		if (!isset($_SESSION['admin_login']))
		{
			echo "Không được phép truy cập! ";
			echo "<a href=index.php?ctrl=user&func=login_index>Đăng nhập</a>";
			exit;
		}
	}

	function index()
	{
		include "model/Loai_model.php";

        $b=new Loai_model();
		$data=$b->getAllLoai();
		$admin_sub_view='../loaivanban/loaivanban_index.php';
		include "view/view_index.php";
	}

	function addLoai(){
		include "model/Loai_model.php";
		$b=new Loai_model();
		$ma = isset($_POST['maloai'])?$_POST['maloai']:'';
		$ten = isset($_POST['tenloai'])?$_POST['tenloai']:'';
		
		if($ma=='' || $ten ==''){
			$_SESSION['thongbaoloai'] = 'Không được để trống!';
			header('location:index.php?ctrl=admin_loai&func=index');
		}else if($b->getMaLoai($ma)){
			$_SESSION['thongbaoloai'] = 'Đã có loại này!';
			header('location:index.php?ctrl=admin_loai&func=index');
		}else{
			$loai=$b->insertloai(strtoupper($ma),ucwords($ten));
			$b=new Loai_model();
			$data=$b->getAllLoai();
			$admin_sub_view='../loaivanban/loaivanban_index.php';
			include "view/view_index.php";
		}	
	}

	function deleteloai()
	{
		include "model/Loai_model.php";
		$b=new Loai_model();
		$maloai = isset($_GET['maloai'])?$_GET['maloai']:'';					
		$delete=$b->deleteloai($maloai);
		$b=new Loai_model();
		$data=$b->getAllLoai();
		$admin_sub_view='../loaivanban/loaivanban_index.php';
		include "view/view_index.php";
	}

	function edit()
	{
		include "model/Loai_model.php";
        $b=new Loai_model();
		$data=$b->getMaLoai($_GET['maloai']);
		$admin_sub_view='../loaivanban/loaivanban_edit.php';
		include "view/view_index.php";
	}

	function updateloai()
	{
		include "model/Loai_model.php";
		$b=new Loai_model();
		$ma = isset($_POST['maloai'])?$_POST['maloai']:'';
		$ten = isset($_POST['tenloai'])?$_POST['tenloai']:'';		
		if($ten ==''){
			$_SESSION['thongbaoloai'] = 'Không được để trống!';
			header('location:index.php?ctrl=admin_loai&func=edit&maloai='.$ma);
		}else{
			$updateloai = $b->updateloai($ma,ucwords($ten));
			$b=new Loai_model();
			$data = $b->getAllLoai();		
			header('location:index.php?ctrl=admin_loai&func=index');
		}
	}
	
}