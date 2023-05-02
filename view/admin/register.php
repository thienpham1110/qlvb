<div id="register-wrapper" class="png_bg">
			<div id="register-top">
				<!-- Logo (221px width) -->
				<h1>Admin Register</h1>
				
			</div> <!-- End #logn-top -->
			
			<div id="register-content">
				
				<form action="index.php?ctrl=user&func=register" method="post"  name="registerForm" onsubmit="return validateForm()" enctype="multipart/form-data">
					<p>
						<label>Name</label>
						<input class="text-input" type="text" name="name"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="pass"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Confirm Password</label>
						<input class="text-input" type="password" name="cfpass"/>
					</p>
					<div class="clear"></div>
				
					<p>
						<input class="button" type="submit" value="Register" name="submit" />
					</p>
					
				</form>
			</div>
			
		</div> 
		
		<script>
function validateForm() {
  var name = document.forms["registerForm"]["name"].value;
  var username = document.forms["registerForm"]["username"].value;
  var pass = document.forms["registerForm"]["pass"].value;
  var cfpass = document.forms["registerForm"]["cfpass"].value;
  if (name == "") {
    alert("Chưa nhập tên đăng ký !");
    return false;
  }
  if (username == "") {
    alert("Chưa nhập tên tài khoản!");
    return false;
  }
  if (pass == "") {
    alert("Chưa nhập mật khẩu");
    return false;
  }
  if (cfpass == "") {
    alert("Nhập lại mật khẩu");
    return false;
  }

  if( pass != cfpass){
	alert("Mật khẩu nhập lại không đúng");
    return false;
  }
}
</script>