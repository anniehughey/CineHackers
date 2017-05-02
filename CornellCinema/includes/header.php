<div class="col-xs-12 col-lg-12 logo">
	<img src="images/cinemaLogo.png" alt="Cornell Cinema" class=logoIcon>
	<!-- img src: Cornell Cinema-->
</div>
<div id="toggle" class="visible-xs col-xs-6">
	<button onclick='togglemenu()'><img src="/images/hamburgerIcon.png" alt="menu icon"></button>
	<!-- hamburger menu icon was made by Annie Hughey in Photoshop-->
</div>
<div id="mobile" class="col-sm-12">
	<ul>
		<li><a href="index.php" class="dropbtn">HOME</a></li>

		<li>
			<div class="dropdown">
				<button class="dropbtn">FILMS</button>
				<div class="dropdown-content">
					<a href="schedule.php">SCHEDULE</a>
					<a href="series.php">SERIES</a>
					<a href="specialGuests.php">SPECIAL EVENTS</a>
					<a href="allFilms.php">ALL FILMS</a>
				</div>
				<!-- end of Films dropdown content-->


			</div>
			<!-- end of Films dropdown-->
		</li>

		<li>
			<div class="dropdown">
				<button class="dropbtn">ABOUT US</button>
				<div class="dropdown-content">
					<a href="ourStory.php">OUR STORY</a>
					<a href="locations.php">LOCATIONS</a>
					<a href="parking.php">PARKING</a>
					<a href="prices.php">PRICES</a>
				</div>
				<!-- end of Films dropdown content-->


			</div>
			<!-- end of Films dropdown-->
		</li>
		<li>
			<div class="search">
				<form method="post" action="searchResults.php">
					<input type="text" name="searchtext" placeholder="Search Movies or Events">
					<input type="submit" name="submitbutton" value="Search">
				</form>
				<a href="search.php" class="nav_item">
				</a>
			</div>
			<!-- end of search div-->
		</li>

	</ul>
</div>
<div id="desktop" class="visible-lg visible-xl visible-md visible-sm col-xs-12">
	<ul>
		<li><a href="index.php" class="dropbtn">HOME</a></li>

		<li>
			<div class="dropdown">
				<button class="dropbtn">FILMS</button>
				<div class="dropdown-content">
					<a href="schedule.php">SCHEDULE</a>
					<a href="series.php">SERIES</a>
					<a href="specialGuests.php">SPECIAL GUESTS</a>
					<a href="allFilms.php">ALL FILMS</a>
				</div>
				<!-- end of Films dropdown content-->


			</div>
			<!-- end of Films dropdown-->
		</li>

		<li>
			<div class="dropdown">
				<button class="dropbtn">ABOUT US</button>
				<div class="dropdown-content">
					<a href="ourStory.php">OUR STORY</a>
					<a href="locations.php">LOCATIONS</a>
					<a href="parking.php">PARKING</a>
					<a href="prices.php">PRICES</a>
				</div>
				<!-- end of Films dropdown content-->


			</div>
			<!-- end of Films dropdown-->
		</li>
		<li>
			<div class="search">
				<form method="post" action="searchResults.php">
					<input type="text" name="searchtext" placeholder="Search Movies or Events">
					<input type="submit" name="submitbutton" value="Search">
				</form>
				<a href="search.php" class="nav_item">
				</a>
			</div>
			<!--end of search div-->
		</li>

	</ul>
</div>
