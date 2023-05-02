
<form action="index.php?ctrl=admin_noibanhanh&func=addNoiBanHanh" method="post"  name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Mã Nơi Ban Hành</td>
			<td>
				<input type="text" name="manoibanhanh" value="">
			</td>
		</tr>
		<tr>
			<td>Tên Nơi Ban Hành</td>
			<td>
				<input type="text" name="tennoibanhanh" value="">
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
  var manoibanhanh = document.forms["myForm"]["manoibanhanh"].value;
  var tennoibanhanh = document.forms["myForm"]["tennoibanhanh"].value;
  if (manoibanhanh == "") {
    alert("Mã không được để trống !");
    return false;
  }
  if (tennoibanhanh == "") {
    alert("Chưa nhập tên nơi ban hành!");
    return false;
  }
}
</script>