<header>
	<div class="container">
		<h1 class="logo">
			<a href="index.html">
				<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="img/logo3.png">
			</a>
		</h1>
		<div class="search">
			<form id="searchForm" action="page-search-results.html" method="get">
				<div class="input-group">
					<input type="text" class="form-control search" name="q" id="q" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="icon icon-search"></i></button>
					</span>
				</div>
			</form>
		</div>
		<nav>
			<ul class="nav nav-pills nav-top">
				<li>
					<a href="about-us.html"><i class="icon icon-angle-right"></i>Σχετικά</a>
				</li>
				<li>
					<a href="contact-us.html"><i class="icon icon-angle-right"></i>Επικοινωνία</a>
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
						<a href="shortcodes.html">Ολα τα Μαγαζια</a>
					</li>
					
					<li>
						<a href="shortcodes.html">ΤΟP 10</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#">
							Αναζητηση
							<i class="icon icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="about-us.html">Βάση Περιοχής</a></li>
							<li><a href="about-us-basic.html">Βάση Ψήφων</a></li>
							<li><a href="about-me.html">Βάση τιμής</a></li>
						</ul>
					</li>
					<li>
						<a href="shortcodes.html">Επικοινωνια</a>
					</li>
					<li>
						<a href="shortcodes.html">Συνδεση</a>
					</li>
					<?php if (isset($_SESSION['user_id'])):?>
					<li class="dropdown mega-menu-item mega-menu-signin signin logged" id="headerAccount">
						<a class="dropdown-toggle" href="page-login.html">
							<i class="icon icon-user"></i> John Smith
							<i class="icon icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="mega-menu-content">
									<div class="row">
										<div class="col-md-8">
											<div class="user-avatar">
												<div class="img-thumbnail">
													<img src="img/clients/client-1.jpg" alt="">
												</div>
												<p><strong>John Smith</strong><span>CEO &amp; Founder - Okler</span></p>
											</div>
										</div>
										<div class="col-md-4">
											<ul class="list-account-options">
												<li>
													<a href="#">My Account</a>
												</li>
												<li>
													<a href="#">Log Out</a>
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