
<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 25px;">Xe thuận tiện | Trang quản trị</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""><?php echo htmlentities($_SESSION['alogin'], ENT_QUOTES, 'UTF-8'); ?> <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php">Thay đổi mật khẩu</a></li>
					<li><a href="logout.php">Đăng xuất</a></li>
				</ul>
			</li>
		</ul>
	</div>
