<?php
include_once("model/db.php");
class User_model extends Db
{

	function register($username,$pass,$name,$role)
	{
		$sql ="insert into quantri(username,matkhau,hoten,quyen) ";
		$sql .=" values(?,?,?,?)";
		$arr = array($username,$pass,$name,$role);
		return $this->query($sql, $arr);
	} 

	function checkAdmin($username,$pass)
	{
		$sql="select count(*) as dem from quantri where username=? and matkhau=md5(?)";
		$kq=$this->query($sql,[$username,$pass]);
		return $kq[0]['dem'];
	}
	
	function login($username,$pass)
	{
		$arr = array($username, $pass);
		$data= $this->query('select username, matkhau from quantri where username=? and matkhau=md5(?)', $arr);		
		if (Count($data)==0) return array();
		return $data[0];
	}  

	public function getAccount($username,$pass)
	{
		$sql="select * from quantri where username=? and matkhau=md5(?)";
		return $this->query($sql,array($username,$pass));
	}

	function checkAdmin1($username, $pass)
	{
		$arr = array($username, $pass);
		$data= $this->query('select username,hoten,quyen from quantri where username=? and matkhau=md5(?)', $arr);		
		if (Count($data)==0) return array();
		return $data[0];
	} 

	function getById($userName)
	{
		return $this->query('select email, tenkh, diachi, dienthoai from khachhang where email=? ', array($userName));
	}

	function getByIdPass($userName, $pass)
	{
		$arr = array($userName, $pass);
		$data= $this->query('select email, tenkh, diachi, dienthoai from khachhang where email=? and password=?', $arr);
		
		if (Count($data)==0) return array();
		return $data[0];
	}

	
	
	
	public function checkKh($email)
	{
		$sql="select email from khachhang where email=?";
		return $this->query($sql,array($email));
	}
	
	function updateUser($email,$tenkh ,$diachi, $sdt)
	{
		$sql ="update khachhang set tenkh=?, diachi=?, dienthoai=? where email=? ";
		$arr = array($tenkh ,$diachi, $sdt,$email);
		return $this->query($sql, $arr);
	}
	function updateMK($email,$mk)
	{
		$sql ="update khachhang set matkhau=? where email=? ";
		$arr = array($mk,$email);
		return $this->query($sql, $arr);
	}
}
?>