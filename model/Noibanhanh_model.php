<?php
include_once("model/db.php");
class Noibanhanh_model extends Db
{
	public function getAllNoiBanHanh()
	{
		$sql="select * from noibanhanh order by manoibanhanh";
		return $this->query($sql);
	}

	public function getMaNoiBanHanh($id)
    {
		$sql="select * from noibanhanh  WHERE manoibanhanh='".$id."'" ;
        $t=$this->query($sql);
		return $t[0];
	}

	function insertNoiBanHanh($ma, $tennoibanhanh)
	{
		$sql ="insert into noibanhanh(manoibanhanh, tennoibanhanh) ";
		$sql .=" values(?, ?)";
		$arr = array($ma, $tennoibanhanh);
		return $this->query($sql, $arr);
	}
	function deleteNoiBanHanh($manoibanhanh)
	{
		$sql="delete from noibanhanh where manoibanhanh= ?";
		$this->updateQuery($sql, array($manoibanhanh));
	}

	function updateNoiBanHanh($manoibanhanh,$tennoibanhanh)
	{
		$sql ="update noibanhanh set tennoibanhanh=? where manoibanhanh=? ";
		$arr = array($tennoibanhanh,$manoibanhanh);
		return $this->query($sql, $arr);
	}
}
?>