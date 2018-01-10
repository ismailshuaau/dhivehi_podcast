<div class="sub-menu">
	<nav>
		<span onclick="openPage('index.php')" tabindex="0" role="link" class="navbar-brand">
			<img src="https://image.freepik.com/free-vector/red-logo-play_1034-412.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
					    Player
		</span>
		<ul class="nav flex-column">
			<li class="nav-item">
				<span onclick="openPage('search.php')" tabindex='0' role="link" class="nav-link">
					Search
				<label for="" class="fa fa-search" aria-hidden="true"></label>
				<!-- <input class="search" type="text" placeholder="Search"> -->
				</span>
			</li>
			<li class="nav-item">
				<span onclick="openPage('browse.php')" tabindex="0" role="link" class="nav-link active" href="#">Browse</span>
			</li>
			<li class="nav-item">
				<span onclick="openPage('playlists.php')" tabindex="0" role="link" class="nav-link" href="#">My Playlists</span>
			</li>
			<li class="nav-item">
				<span onclick="openPage('settings.php')" tabindex="0" role="link" class="nav-link" href="#"><?php echo $userLoggedIn->getFirstAndLastName() ?></span>
			</li>
		</ul>
	</nav>
</div>