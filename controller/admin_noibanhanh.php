<?php
session_start();
class Admin_noibanhanh
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
		include "model/Noibanhanh_model.php";
        $b=new Noibanhanh_model();
		$data=$b->getAllNoiBanHanh();
		$admin_sub_view='../noibanhanh/noibanhanh_index.php';
		include "view/view_index.php";
	}

	function addNoiBanHanh(){
		include "model/Noibanhanh_model.php";

		$b=new Noibanhanh_model();
		$ma = isset($_POST['manoibanhanh'])?$_POST['manoibanhanh']:'';
		$ten = isset($_POST['tennoibanhanh'])?$_POST['tennoibanhanh']:'';
		
		if($ma=='' || $ten ==''){
			$_SESSION['thongbaonoibanhanh'] = 'Không được để trống!';
			header('location:index.php?ctrl=admin_noibanhanh&func=index');
		}else if($b->getMaNoiBanHanh($ma)){
			$_SESSION['thongbaonoibanhanh'] = 'Đã có!';
			header('location:index.php?ctrl=admin_noibanhanh&func=index');
		}else{
			$noibh=$b->insertNoiBanHanh(strtoupper($ma),ucwords($ten));
			$b=new Noibanhanh_model();
			$data=$b->getAllNoiBanHanh();
			$admin_sub_view='../noibanhanh/noibanhanh_index.php';
			include "view/view_index.php";
		}
	}

	function deleteNBH()
	{
		include "model/Noibanhanh_model.php";
		$b=new Noibanhanh_model();
		$manoibanhanh = isset($_GET['manoibanhanh'])?$_GET['manoibanhanh']:'';		
		$delete=$b->deleteNoiBanHanh($manoibanhanh);
		$b=new Noibanhanh_model();
		$data=$b->getAllNoiBanHanh();
		$admin_sub_view='../noibanhanh/noibanhanh_index.php';
		include "view/view_index.php";
	}

	function edit()
	{
		include "model/Noibanhanh_model.php";
        $b=new Noibanhanh_model();
		$data=$b->getMaNoiBanHanh($_GET['manoibanhanh']);
		$admin_sub_view='../noibanhanh/noibanhanh_edit.php';
		include "view/view_index.php";
	}

	function updateNBH()
	{
		include "model/Noibanhanh_model.php";
		$b=new Noibanhanh_model();
		$ma = isset($_POST['manoibanhanh'])?$_POST['manoibanhanh']:'';
		$ten = isset($_POST['tennoibanhanh'])?$_POST['tennoibanhanh']:'';		
        
		if($ten ==''){
			$_SESSION['thongbaonoibanhanh'] = 'Không được để trống!';
			header('location:index.php?ctrl=admin_noibanhanh&func=edit&manoibanhanh='.$ma);
		}else{
			$updatenoibanhanh = $b->updateNoiBanHanh($ma,ucwords($ten));
			$b=new Noibanhanh_model();
			$data = $b->getAllNoiBanHanh();			
			header('location:index.php?ctrl=admin_noibanhanh&func=index');
		}
       
	}
	
}