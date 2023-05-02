<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			<!-- Logo (221px width) -->
			</div> <!-- End #logn-top -->
			<div id="login-content">
			<p>
            <label>	
                         Dashboard	
						 </label> <br>
						 <label>	
                         <?php
							if(isset($_SESSION['login_success']))
							{
								echo $_SESSION['login_success'];
								unset($_SESSION['login_success']);
							}
            ?>  					
						 </label> <br>
                         <label>	
                         <?php
							if(isset($_SESSION['admin_login']))
							{
								echo " Chào ".$_SESSION['admin_login'][0]['username'];
							}	
            ?>  					
						 </label> 
					</p>
			</div> <!-- End #login-content -->
		</div>
