<?php error_reporting(0); ?>
<header class="navbar navbar-default navbar-static-top">
	<!-- start: NAVBAR COLLAPSE -->
	<div class="navbar-collapse collapse">
		<nav>

			<!-- start: MAIN NAVIGATION MENU -->
			<ul class="main-navigation-menu">
				<li>
					<a href="dashboard.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-home"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Dashboard </span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="current_borrow.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Borrowed Books </span>
							</div>
						</div>
					</a>
				</li>


				<li>
					<a href="return_history.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Returned Books </span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="saved_books.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Saved Books </span>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="saved_journals.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title">Saved Journals</span>
							</div>
						</div>
					</a>
				</li>




			</ul>
			<!-- end: CORE FEATURES -->


			<ul class="nav navbar-right">
				<!-- start: MESSAGES DROPDOWN -->
				<li style="padding-top:6% ">
					<h2>Atheneum</h2>
				</li>
				<?php
				$sql = $con->query("SELECT * FROM `student_info` where lib_id='" . $_SESSION['login'] . "'");
				$result = mysqli_fetch_array($sql);
				?>
				<li class="dropdown current-user">
					<a onclick="myFunction()" class="dropfun" data-toggle="dropdown">
						<img src="<?php echo $result['std_img'];
									?>" alt="sorry"> <span class="username"><?php echo $result['std_name'];
																			//assets/images/avatar-1.jpg																									 
																			?>
							<i class="ti-angle-down"></i></span>
					</a>
					<ul class="dropdown-menu dropdown-dark" id="myDropdown">


						<li>
							<a href="change-password.php">
								Change Password
							</a>
						</li>
						<li>
							<a href="logout.php">
								Log Out
							</a>
						</li>
					</ul>
				</li>
				<!-- end: USER OPTIONS DROPDOWN -->
			</ul>
		</nav>

		<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
		<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<div class="arrow-left"></div>
			<div class="arrow-right"></div>
		</div>
		<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
	</div>


	<!-- end: NAVBAR COLLAPSE -->
</header>
<style>
	.show {
		display: block;
	}
</style>
<script>
	function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
	}
</script>