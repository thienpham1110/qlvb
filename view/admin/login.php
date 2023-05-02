<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			<!-- Logo (221px width) -->
			
			
			</div> <!-- End #logn-top -->
			<div id="login-content">
			<p>
						 <label>
						 <?php
							if(isset($_SESSION['register_success']))
							{
								echo $_SESSION['register_success'];
								unset($_SESSION['register_success']);
							}
            ?>  
						 </label> 
					</p>
				<form action="index.php?ctrl=user&func=login" method="post"  name="loginForm" 
				onsubmit="return validateForm()" enctype="multipart/form-data">
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
					<!-- <p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div> -->
					<p>
						<input class="button" type="submit" value="Sign In" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div>
<script>	
		function validateForm() {

  var username = document.forms["loginForm"]["username"].value;
  var pass = document.forms["loginForm"]["pass"].value;
  if (username == "") {
    alert("Chưa nhập tên tài khoản!");
    return false;
  }
  if (pass == "") {
    alert("Chưa nhập mật khẩu");
    return false;
  }
}
</script>