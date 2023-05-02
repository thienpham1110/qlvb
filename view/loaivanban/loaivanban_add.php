
<form action="index.php?ctrl=admin_loai&func=addLoai" method="post"  name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Mã Loại</td>
			<td>
				<input type="text" name="maloai" value="">
			</td>
		</tr>
		<tr>
			<td>Tên Loại</td>
			<td>
				<input type="text" name="tenloai" value="">
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
  var maloai = document.forms["myForm"]["maloai"].value;
  var tenloai = document.forms["myForm"]["tenloai"].value;
  if (maloai == "") {
    alert("Mã loại không được bỏ trống!");
    return false;
  }
  if (tenloai == "") {
    alert("Chưa nhập tên loại!");
    return false;
  }
}
</script>