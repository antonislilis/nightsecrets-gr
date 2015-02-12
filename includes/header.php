<header>
	<div class="container">
		<h1 class="logo">
			<a href="index.php">
				<img alt="Porto" class="img-circle img-responsive" width="180" height="64" data-sticky-width="82" data-sticky-height="40" src="img/logo5.jpg">
			</a>
		</h1>
		<div class="search">
			<form id="searchForm" action="results.php" method="get">
				<div class="input-group">
					<input type="text" class="form-control search" name="q" id="q" placeholder="Αναζήτηση...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="icon icon-search"></i></button>
					</span>
				</div>
			</form>
		</div>
		<nav>
			<ul class="nav nav-pills nav-top">
				<li>
					<a href="about-us.php"><i class="icon icon-angle-right"></i>Σχετικά</a>
				</li>
				<li>
					<a href="contact-us"><i class="icon icon-angle-right"></i>Επικοινωνία</a>
				</li>
				<li class="phone">
					<span><i class="icon icon-phone"></i>210 5385100 </span>
				</li>
			</ul>
		</nav>
		<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
			<i class="icon icon-bars"></i>
		</button>
	</div>
	<div class="navbar-collapse nav-main-collapse collapse">
		<div class="container">
			<div class="social-icons">
				<ul class="social-icons">
					<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
					<li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
					<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
				</ul>
			</div>
		<nav class="nav-main mega-menu">
			<ul class="nav nav-pills nav-main" id="mainMenu">					
				<li>
					<a href="index.php">ΚΕΝΤΡΙΚΗ</a>
				</li>							
				<li>
					<a href="clients.php">Μαγαζια</a>
				</li>					
				<li class="dropdown mega-menu-item mega-menu-fullwidth">
					<a class="dropdown-toggle" href="#">
						Περιοχη
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="mega-menu-content">
								<div class="row">
<?php 

	$StringFormat = "
		<div class='col-md-2'><ul class='sub-menu'>
			<li><span class='mega-menu-sub-title'>%s</span>
				<ul class='sub-menu'>%s</ul>
			</li>
		</ul></div>
";
	$qry ="
	SELECT proastia, group_concat('<li><a href=\'location_results.php?q=',perioxi,'\'>',perioxi,'</a></li>' ORDER BY perioxi ASC SEPARATOR '') AS Location
	FROM `polymesa`.`locations`
	WHERE IsOnline = 1
	GROUP BY proastia
	ORDER BY DisplayOrder, @r ASC
	LIMIT 5;
";
    global $db;
	$query = $db->query($qry);
	while ($row = $query->fetch(PDO::FETCH_ASSOC))
	{
		$TextBuffer .=  vsprintf($StringFormat,$row);

	}
	// $stm = $db->query($qry);
	// var_dump($stm);
	// $stm->exeute();
	// $TextBuffer = '';
	// while( $row = $stm->fetch(PDO::FETCH_ASSOC) )
	// {
		// echo "hello";
	// }
	echo $TextBuffer;
	
?>											
								</div>
							</div>
						</li>
					</ul>
				</li>								
				<li>
					<a href="contact.php">Επικοινωνια</a>
				</li>
				<?php if (!isset($_SESSION['user_id'])):?>
				<li>
					<a href="page-login.php">Συνδεση</a>
				</li>
				<?php endif?>
				
				<?php if (isset($_SESSION['user_id'])):?>
				<li class="dropdown mega-menu-item mega-menu-signin signin logged" id="headerAccount">
					<a class="dropdown-toggle" href="page-login.html">
						<i class="icon icon-user"></i> <?php echo $user_data['username']; ?>
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-8">
										<div class="user-avatar">
											<div class="img-thumbnail">
												<img src="<?php echo getMyProfilePhoto(); ?>" alt=""><br>
												<a href="upload.php">Αλλαγή</a>
											</div>
											<p><strong><?php echo $user_data['username']; ?></strong><span><?php echo $user_data['email']; ?></span></p>
										</div>
									</div>
									<div class="col-md-4">
										<ul class="list-account-options">
											<li>
												<a href="settings.php">Ρυθμίσεις</a>
											</li>
											<li>
												<a href="myFavourites.php">Αγαπημένα</a>
											</li>
											<li>
												<a href="logout.php">Αποσύνδεση</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<?php endif?>
			</ul>
		</nav>
		</div>
	</div>
</header>
