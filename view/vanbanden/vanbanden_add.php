
<form action="index.php?ctrl=admin_vanbanden&func=addVanBanDen" method="post" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Số Văn Bản</td>
			<td>
				<input type="text" name="sovanban" value="">
			</td>
			<td>Người Nhận</td>
			<td>
				<input type="text" name="nguoinhan" value="">
			</td>
		</tr>
		
		<tr>
			<td>Ngày Ban Hành</td>
			<td>
				<input type="date" name="ngaybanhanh" value="">
			</td>
			<td>Ngày Đến</td>
			<td>
				<input type="date" name="ngayden" value="">
			</td>
		</tr>
		<tr>
			<td>Số Trang</td>
			<td>
				<input type="number" name="sotrang" value="">
			</td>
			<td>Người Ký</td>
			<td>
				<input type="text" name="nguoiky" value="">
			</td>
		</tr>
		<tr>
			<td>Loại Văn Bản</td>
			<td>
				<select name="maloai">

					<?php
                foreach ($loais as $key => $value) {
                    ?>
                        <option value="<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></option>
                    <?php
                }
                ?>
				</select>
			</td>
			<td>Nơi Ban Hành</td>
			<td>
				<select name="manoibanhanh">

					<?php
foreach ($noibanhanhs as $key => $value) {
	?>
					<option value="<?php echo $value['manoibanhanh'] ?>"><?php echo $value['tennoibanhanh'] ?></option>
					<?php
}
?>
				</select>
			</td>
		</tr>		
		<tr>
			<td>Trích Yếu</td>
			<td>
				<textarea name="trichyeu">
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Nội Dung</td>
			<td>
				<textarea name="noidung">
				</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="file" name="file">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="add" value="Thêm">
			</td>
		</tr>
	</table>
</form>
<script>
function validateForm() {
  var mamon = document.forms["myForm"]["mamonan"].value;
  var tenmon = document.forms["myForm"]["tenmon"].value;
  var gia = document.forms["myForm"]["gia"].value;
  var hinh = document.forms["myForm"]["hinh"].value;
  if (mamon == "") {
    alert("Mã không được để trống !");
    return false;
  }
  if (tenmon == "") {
    alert("Chưa nhập tên món !");
    return false;
  }
  if (gia == "") {
    alert("Chưa nhập giá !");
    return false;
  }
  if (hinh == "") {
    alert("Chưa chọn hình !");
    return false;
  }
}
</script>