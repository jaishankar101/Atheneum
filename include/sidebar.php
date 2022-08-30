<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">

		<nav>

			<!-- start: department MENU -->
			<div class="navbar-title">
				<span>Department</span>
			</div>
			<ul class="books-navigation-menu">
				<?php
				$ret = mysqli_query($con, "SELECT * from `department`;");
				while ($row = mysqli_fetch_array($ret)) {
				?>
					<li>
						<a href="#<?php echo htmlentities($row['dept_id']); ?>">
							<div class="item-content">
								<div class="item-inner">
									<span class="title"><?php echo htmlentities($row['dept_name']); ?></span>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>


			</ul>
			<!-- end: CORE FEATURES -->

		</nav>
	</div>
</div>