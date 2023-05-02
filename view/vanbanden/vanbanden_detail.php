<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			<!-- Logo (221px width) -->
			<p>
						 <label >
						CHI TIẾT VĂN BẢN ĐẾN
						 </label> 
					</p>
			
			</div> <!-- End #logn-top -->
			<div id="login-content">
			<form action="index.php?ctrl=admin_vanbanden" method="post"  name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Số Văn Bản</td>
			<td>
				<input type="text" name="sovanban" value="<?php echo $vb['sovanban'] ?>">
			</td>
			
		</tr>
		<tr>
			<td>Người Ký Văn Bản</td>
			<td>
				<input type="text" name="nguoiky" value="<?php echo $vb['nguoiky'] ?>">
			</td>
		</tr>
		<tr>
			<td>Trích Yếu Nội Dung</td>
			<td>
				<textarea name="trichyeu"><?php echo $vb['trichyeu'] ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Ngày Ban Hành</td>
			<td>
				<input type="text" name="ngaybanhanh" value="<?php echo $vb['ngaybanhanh'] ?>">
			</td>
			
		</tr>
		<tr>
			<td>Ngày Đến</td>
			<td>
				<input type="text" name="ngayden" value="<?php echo $vbd['ngayden'] ?>">
			</td>
			
		</tr>
		<tr>
			<td>Số Trang</td>
			<td>
				<input type="text" name="sotrang" value="<?php echo $vbd['sotrang'] ?>">
			</td>
			
		</tr>
		<tr>
			<td>Người Nhận</td>
			<td>
				<input type="text" name="nguoinhan" value="<?php echo $vbd['nguoinhan'] ?>">
			</td>
			
		</tr>
		<tr>
			<td>Loại Văn Bản</td>
			<td>
				<input type="text" name="maloai" value="<?php echo $vb['tenloai'] ?>">
			</td>
			<!-- <td>
				<select name="maloai">
                <option value="<?php echo $vb['maloai'] ?>"><?php echo $vb['tenloai'] ?></option>

					<?php
                foreach ($loais as $key => $value) {
                    ?>
                        <option value="<?php echo $value['maloai'] ?>"><?php echo $value['tenloai'] ?></option>
                    <?php
                }
                ?>
				</select>
			</td> -->
		</tr>
		<tr>
			<td>Nơi Ban Hành</td>
			<td>
				<input type="text" name="noibanhanh" value="<?php echo $vb['manoibanhanh'] ?>">
			</td>
		</tr>
		<tr>
		<td>File</td>
			<td>
				<input type="text" name="tenfile" value="<?php echo $fvbd['tenfile'] ?>">
			</td>
			
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="update" >
			</td>
		</tr>
	</table>
</form>
</div> <!-- End #login-content -->
			
		</div>
<script>
function validateForm() {
  var mamon = document.forms["myForm"]["mamonan"].value;
  var tenmon = document.forms["myForm"]["tenmon"].value;
  var gia = document.forms["myForm"]["gia"].value;
  var hinh = document.forms["myForm"]["hinh"].value;
  if (mamon != "<?php echo $mon['mamonan'] ?>") {
    alert("Không thể đổi mã món ăn !");
    return false;
  }
  if (tenmon == "") {
    alert("Chưa nhập tên món ăn !");
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