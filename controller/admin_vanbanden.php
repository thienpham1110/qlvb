<?php
session_start();
class Admin_vanbanden
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
		include "model/Vanban_model.php";;
		include "model/Noibanhanh_model.php";

        $b=new Vanban_model();
		$page=1;
		if(isset($_GET['page']))
			$page=$_GET['page'];
		$start=($page-1)*VANBAN_TRANG;
		$data=$b->get1Page($start);
		$tongtrang=ceil($b->tongvanbanden()/VANBAN_TRANG);
		$b=new Loai_model();
		$loais=$b->getAllLoai();
		$b=new Noibanhanh_model();
        $noibanhanhs=$b->getAllNoiBanHanh();
		$admin_sub_view='../vanbanden/vanbanden_index.php';
		include "view/view_index.php";
	}

	function addVanBanDen(){
		include "model/Loai_model.php";
		include "model/Vanban_model.php";;
		include "model/Noibanhanh_model.php";

		$b=new Vanban_model();
		$sovanban = isset($_POST['sovanban'])?$_POST['sovanban']:'';
		$nguoinhan = isset($_POST['nguoinhan'])?$_POST['nguoinhan']:'';
		$ngaybanhanh = isset($_POST['ngaybanhanh'])?$_POST['ngaybanhanh']:'';
		$ngayden = isset($_POST['ngayden'])?$_POST['ngayden']:'';
		$sotrang = isset($_POST['sotrang'])?$_POST['sotrang']:'';
		$nguoiky = isset($_POST['nguoiky'])?$_POST['nguoiky']:'';
		$maloai = isset($_POST['maloai'])?$_POST['maloai']:'';
		$manoibanhanh = isset($_POST['manoibanhanh'])?$_POST['manoibanhanh']:'';
		$trichyeu = isset($_POST['trichyeu'])?$_POST['trichyeu']:'';
		$noidung = isset($_POST['noidung'])?$_POST['noidung']:'';
		$vanbanden=$b->insertvanbanden($sovanban, $ngayden ,$sotrang, $nguoinhan);
		
		$vanban=$b->insertvanban($sovanban, $manoibanhanh ,$maloai, $trichyeu ,$noidung ,$ngaybanhanh ,$nguoiky ,1);
		$file = isset($_FILES['file']['name'])?$_FILES['file']['name']:'';
		if (isset($_POST['add']) && isset($_FILES['file'])) {
			if ($_FILES['file']['error'] > 0)
				echo "Upload lỗi!";
			else {
				move_uploaded_file($_FILES['file']['tmp_name'], 'images/vanbanden/' . $_FILES['file']['name']);
				echo "upload thành công <br/>";
			}
		}
		$file=$b->insertfilevanbanden($sovanban, $sovanban);
		$page=1;
		if(isset($_GET['page']))
			$page=$_GET['page'];
		$start=($page-1)*VANBAN_TRANG;
		$data=$b->get1Page($start);
		$tongtrang=ceil($b->tongvanbanden()/VANBAN_TRANG);
		$b=new Loai_model();
		$loais=$b->getAllLoai();
		$b=new Noibanhanh_model();
        $noibanhanhs=$b->getAllNoiBanHanh();
		$admin_sub_view='../vanbanden/vanbanden_index.php';
		include "view/view_index.php";
		
	}

	function detail()
	{
		include "model/Loai_model.php";
		include "model/Vanban_model.php";;
		include "model/Noibanhanh_model.php";

        $b=new Loai_model();
		$loais=$b->getAllLoai();
		$b=new Noibanhanh_model();
        $noibanhanhs=$b->getAllNoiBanHanh();
        $b=new Vanban_model();
        $vb=$b->getDetail($_GET['sovanban']);
		$vbd=$b->getDetailVBD($_GET['sovanban']);
		$fvbd=$b->getDetailFileVBD($_GET['sovanban']);
		$admin_sub_view='../vanbanden/vanbanden_detail.php';
		include "view/view_index.php";
		
	}


	function deletemon()
	{
		include "model/Loai_model.php";
		include "model/Monan_model.php";
		include "model/Nhahang_model.php";
		$b=new Mon_model();
		$mamon = isset($_GET['mamonan'])?$_GET['mamonan']:'';	
		$hinh = isset($_FILES['hinh']['name'])?$_FILES['hinh']['name']:'';	
		$row = $b->getDetail($mamon);
		unlink( 'images/mon/' . $row['hinh']);
		echo "Delete thành công <br/>";			
		$delete=$b->delete($mamon);
		$page=1;
		if(isset($_GET['page']))
			$page=$_GET['page'];
		$start=($page-1)*MON_TRANG;
		$data=$b->get1Page($start);
		$tongtrang=ceil($b->tongsomon()/MON_TRANG);
		$b=new Loai_model();
		$loais=$b->getAllLoai();
		$b=new Noibanhanh_model();
        $noibanhanhs=$b->getAllNoiBanHanh();
		$admin_sub_view='admin_index.php';
		include "view/admin.php";

	}

	function edit()
	{
		include "model/Loai_model.php";
		include "model/Vanban_model.php";
		include "model/Noibanhanh_model.php";

        $b=new Loai_model();
		$loais=$b->getAllLoai();
		$b=new Noibanhanh_model();
        $noibanhanhs=$b->getAllNoiBanHanh();
        $b=new Vanban_model();
        $mon=$b->getDetail($_GET['mamonan']);
		$admin_sub_view='admin_edit.php';
		include "view/admin.php";
	}

	function updatemon()
	{
		include "model/Loai_model.php";
		include "model/Monan_model.php";
		include "model/Nhahang_model.php";


		$b=new Mon_model();
		$ma = isset($_POST['mamonan'])?$_POST['mamonan']:'';
		$ten = isset($_POST['tenmon'])?$_POST['tenmon']:'';
		$mota = isset($_POST['mota'])?$_POST['mota']:'';
		$gia = isset($_POST['gia'])?$_POST['gia']:'';
		$hinh = isset($_FILES['hinh']['name'])?$_FILES['hinh']['name']:'';
		$mannhahang = isset($_POST['manhahang'])?$_POST['manhahang']:'';
		$maloai = isset($_POST['maloai'])?$_POST['maloai']:'';

		if ($_FILES['hinh']['error'] == 0){
			$row = $b->getDetail($ma);
			unlink( 'images/mon/'. $row['hinh']);
			$img = $_FILES['hinh']['name'];
			move_uploaded_file($_FILES['hinh']['tmp_name'], 'images/mon/' . $_FILES['hinh']['name']);	
		}
		$updatemon = $b->update($ma,$ten,$mota,$gia,$hinh,$mannhahang,$maloai);
		$page=1;
		if(isset($_GET['page']))
			$page=$_GET['page'];
		$start=($page-1)*MON_TRANG;
		$data=$b->get1Page($start);
		$tongtrang=ceil($b->tongsomon()/MON_TRANG);
		$b=new Loai_model();
		$loais=$b->getAllLoai();
		$b=new Nhahang_model();
        $nhahangs=$b->getAllNhaHang();
		$admin_sub_view='admin_index.php';
		include "view/admin.php";
	}
	
}