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
					<!-- <a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-user"></i>
							</div>
							<div class="item-inner">
								<span class="title"> books </span><i class="icon-arrow" onclick="addsub()"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<a href=".php">
								<span class="title">Locate Books </span>
							</a>
						</li>
						<li>
							<a href="add_book.php">
								<span class="title"> Add Books</span>
							</a>
						</li>
						<li>
							<a href="Manage_books.php">
								<span class="title"> Manage Books </span>
							</a>
						</li>

					</ul> -->
				</li>

				<li>
					<a href="user_logs.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-user"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Students </span><i class="icon-arrow"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">

						<li>
							<a href="manage_users.php">
								<span class="title"> Manage Students </span>
							</a>
						</li>
						<li>
							<a href="user_logs.php">
								<span class="title"> Student Session Logs </span>
							</a>
						</li>

					</ul>
				</li>

				<li>
					<a href="borrow_history.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-file"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Borrow History </span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="add_book.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Add Books </span>
							</div>
						</div>
					</a>
				</li>



				<li>
					<a href="manage_books.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-list"></i>
							</div>
							<div class="item-inner">
								<span class="title"> Manage Books</span>
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


				<li class="dropdown current-user">
					<a onclick="myFunction()" class="dropfun" data-toggle="dropdown">
						<img src="assets/images/avatar-1.jpg" alt="Peter"> <span class="username"><?php echo $_SESSION['admin-name'] ?>
							<i class="ti-angle-down"></i></i></span>
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