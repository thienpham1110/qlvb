<?php
include_once("model/db.php");
class Vanban_model extends Db
{

	public function tongvanbanden()
	{
		$sql="select count(*) as sl from vanbanden";
		$kq= $this->query($sql);
		return $kq[0]['sl'];
	}


	public function get1Page($start)
	{
		$sql="select * from vanban limit ".$start.", ".MON_TRANG;
		return $this->query($sql);
		
		//return $this->getQuery();
	}

	function insertvanbanden($sovanban, $ngayden ,$sotrang, $nguoinhan)
	{
		$sql ="insert into vanbanden(sovanban, ngayden, sotrang, nguoinhan) ";
		$sql .=" values(?, ?, ?, ?)";
		$arr = array($sovanban, $ngayden ,$sotrang, $nguoinhan);
		return $this->query($sql, $arr);
	}

	function insertvanban($sovanban, $manoibanhanh ,$maloai, $trichyeu ,$noidung ,$ngaybanhanh ,$nguoiky ,$loailuutru)
	{
		$sql ="insert into vanban(sovanban, manoibanhanh, maloai, trichyeu, noidung, ngaybanhanh, nguoiky, loailuutru) ";
		$sql .=" values(?, ?, ?, ? ,?, ?, ?, ?)";
		$arr = array($sovanban, $manoibanhanh ,$maloai, $trichyeu,$noidung,$ngaybanhanh,$nguoiky,$loailuutru);
		return $this->query($sql, $arr);
	}
	function insertfilevanbanden($sovanban, $tenfile)
	{
		$sql ="insert into file(sovanban, tenfile) ";
		$sql .=" values(?, ?)";
		$arr = array($sovanban, $tenfile);
		return $this->query($sql, $arr);
	}


	public function getDetail($id)
    {
		$sql="select *,noibanhanh.tennoibanhanh,loai.tenloai 
		from ((vanban left join noibanhanh on noibanhanh.manoibanhanh=vanban.manoibanhanh)
		left join loai on loai.maloai=vanban.maloai)  WHERE sovanban='".$id."'" ;
        $t=$this->query($sql);
		return $t[0];
	}

	public function getDetailVBD($id)
    {
		$sql="select * from vanbanden WHERE sovanban='".$id."'" ;
        $t=$this->query($sql);
		return $t[0];
	}

	public function getDetailFileVBD($id)
    {
		$sql="select * from file WHERE sovanban='".$id."'" ;
        $t=$this->query($sql);
		return $t[0];
	}
	
	public function getAllMon()
	{
		$sql="select * from monan";
		return $this->query($sql);
		
		//return $this->getQuery();
	}
	
	public function getMon1Loai($id,$page=0)
    {
		$sql="select * from monan WHERE maloai='".$id."'";
		if($page>0)
		{
			$start=($page-1)*MON_TRANG;
			$sql.=" limit ".$start.", ".MON_TRANG;
		}
        return $this->query($sql);
	}
	public function getMon1nhahang($id,$page=0)
    {
		$sql="select * from monan WHERE manhahang='".$id."'";
		if($page>0)
		{
			$start=($page-1)*MON_TRANG;
			$sql.=" limit ".$start.", ".MON_TRANG;
		}
        return $this->query($sql);
    }
	
	function detail($mamon)
	{
		$sql="select * from monan where mamonan=? ";
		$arr= array($mamon);
		$data= $this->query($sql,$arr);
		if (Count($data)>0)
			return $data[0];
		return 0;
	}
	public function thongTin($ids)
    {
		$dk=implode("','",$ids);
		$dk="('".$dk."')";
        $sql="select * from monan WHERE mamonan in $dk";
		
        $t=$this->query($sql);
		return $t;
    }
	public function getPrice($id)
	{
		$param=array();
		$param[':id']=$id;
		$sql="select gia from monan where mamonan=:id";
		$kq=$this->query($sql,$param);
		return $kq[0];
	}
	public function add($id,$name,$des,$price,$file,$pub_id,$cat_id)
	{			
			$sql="insert into monan values(:id,:name,:des,:price,:img,:pub,:cat)";
			$this->query($sql,array(":id"=>$id,":name"=>$name,":des"=>$des,":price"=>$price,":img"=>$file,":pub"=>$pub_id,":cat"=>$cat_id));
			$this->getQuery($sql,array(":id"=>$id,":name"=>$name,":des"=>$des,":price"=>$price,":img"=>$file,":pub"=>$pub_id,":cat"=>$cat_id));
			return $this->getNumRow();				
	}
	
	
	
	public function tongMon1Loai($id)
	{
		$sql="select count(*) as sl from monan where maloai=?";
		$kq= $this->query($sql,array($id));
		return $kq[0]['sl'];
	}
	public function tongMon1Nhahang($id)
	{
		$sql="select count(*) as sl from monan where manhahang=?";
		$kq= $this->query($sql,array($id));
		return $kq[0]['sl'];
	}
	function update($mamonan,$tenmon ,$mota, $gia, $file, $manhahang, $maloai)
	{
		$sql ="update  monan set tenmon=?, mota=?, gia=?, hinh=?, manhahang=?, maloai=? where mamonan=? ";
		$arr = array($tenmon ,$mota, $gia, $file, $manhahang, $maloai,$mamonan);
		return $this->query($sql, $arr);
	}
	function delete($mamon)
	{
		$sql="delete from monan where mamonan= ?";
		$this->updateQuery($sql, array($mamon));
	}
	function search($search,$page=0){
		$sql="select * from monan where ( tenmon like '%$search%') OR (mota like '%$search%')";
		if($page>0)
		{
			$start=($page-1)*MON_TRANG;
			$sql.=" limit ".$start.", ".MON_TRANG;
		}
        return $this->query($sql);
	}
	public function tongMonTim($search)
	{
		$sql="select count(*) as sl from monan where  ( tenmon like '%$search%') OR (mota like '%$search%')";
		$kq= $this->query($sql);
		return $kq[0]['sl'];
	}
}
?>