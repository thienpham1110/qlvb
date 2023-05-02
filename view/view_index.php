<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Simpla Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="admincp/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="admincp/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="admincp/resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it. -->
		
		<link rel="stylesheet" href="admincp/resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="admincp/resources/css/red.css" type="text/css" media="screen" />  
	 
		
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="admincp/resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="admincp/resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="admincp/resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="admincp/resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="admincp/resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="admincp/resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="admincp/resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->

			<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?php echo BASE_URL ?>/index.php">
			<img id="logo" src="<?php echo BASE_URL ?>/admincp/resources/images/logo.png" alt="Admin Login" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">
				<?php
							if(isset($_SESSION['admin_login']))
							{
								echo $_SESSION['admin_login'][0]['username'];
							}	
            ?>  	
			</a><br />
				
				<br />
				<a href="<?php echo BASE_URL ?>/index.php?ctrl=User&func=login_index" title="Login">Login</a> 
				| <a href="<?php echo BASE_URL ?>/index.php?ctrl=User&func=register_index" title="Sign Out">Register</a>
				| <a href="<?php echo BASE_URL ?>/index.php?ctrl=User&func=logoutad" title="Sign Out">Logout</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->

				<li>
					<a href="<?php echo BASE_URL ?>/index.php?ctrl=User&func=dashboard_index" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>
				</li>
				
				<li>
					<a href="" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
					Quản Lý Văn Bản
					</a>
					<ul>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_vanbanden">Văn Bản Đến</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_loai">Văn Bản Đi</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_nhahang">Văn Bản Nội Bộ</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_loai">Loại Văn Bản</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_noibanhanh&func=index">Nơi Ban Hành</a></li>
					</ul>
				</li>
				<li>
					<a href="" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
					Văn Bản Nội Bộ
					</a>
					<ul>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin">Thêm Văn Bản Mới</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=admin_loai">DS Văn Bản NB</a></li> 
					</ul>
				</li>
				<li>
					<a href="<?php echo BASE_URL ?>/admincp/#" class="nav-top-item">
						Hệ Thống
					</a>
					<ul>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=khachhang&func=gethoadon">Tài Kho</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?ctrl=khachhang">Khách Hàng</a></li>
					</ul>
				</li>
				

			</ul> <!-- End #main-nav -->
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<!-- Page Head -->
			<div class="content-box">				
						<!-- <?php include "view/admin/$admin_sub_view";?>  
			</div> 
			<div class="clear"></div> <!-- End .clear -->
			
			
		</div> <!-- End #main-content -->
		
	</div>
</body>
  
</html>



