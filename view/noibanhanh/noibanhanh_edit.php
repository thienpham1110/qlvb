<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			<!-- Logo (221px width) -->
			
			
			</div> <!-- End #logn-top -->
			<div id="login-content">
<form action="index.php?ctrl=admin_noibanhanh&func=updateNBH" method="post"  name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Mã Nhà hàng</td>
			<td>
				<input type="text" name="manoibanhanh" value="<?php echo $data['manoibanhanh'] ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>Tên Nhà Hàng</td>
			<td>
				<input type="text" name="tennoibanhanh" value="<?php echo $data['tennoibanhanh'] ?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="update" value="Cập Nhật">
			</td>
		</tr>
	</table>
</form>
</div>
</div>
<script>
function validateForm() {
  var manoibanhanh = document.forms["myForm"]["manoibanhanh"].value;
  var tennoibanhanh = document.forms["myForm"]["tennoibanhanh"].value;
  if (manoibanhanh != "<?php echo $data['manoibanhanh'] ?>") {
    alert("Không thể thay đổi mã nhà hàng !");
    return false;
  }
  if (tennoibanhanh == "") {
    alert("Chưa nhập tên nơi ban hành!");
    return false;
  }
}
</script>