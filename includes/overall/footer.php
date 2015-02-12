<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribon">
				<span>Σχετικά</span>
			</div>
			<div class="col-md-3">
				<div class="newsletter">
					<h4>Newsletter</h4>
					<p>Αν θέλεις να ενημερώνεσαι με τις καλύτερες προσφορές απο τα συνεργαζόμενα μαγαζια και να είσαι πάντα μέσα κάνε subscribe εδώ</p>

					<div class="alert alert-success hidden" id="newsletterSuccess">
						<strong>Τέλεια!</strong> Έχεις προστεθεί στην λίστα μας.
					</div>

					<div class="alert alert-danger hidden" id="newsletterError"></div>

					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
						<div class="input-group">
							<input class="form-control" placeholder="Email Address" name="email" id="email" type="text">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">Go!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<!--<h4>Latest Tweet</h4>
				<div id="tweet" class="twitter" data-account-id="">
					<p>Please wait...</p>
				</div>-->
			</div>
			<div class="col-md-4">
				<div class="contact-details">
					<h4>Επικοινώνία</h4>
					<ul class="contact">
						<li><p><i class="icon icon-map-marker"></i> <strong>Διεύθυνση:</strong> Αγ.Σπυρίδωνος, Αιγάλεω, ΤΕΙ Αθηνών</p></li>
						<li><p><i class="icon icon-phone"></i> <strong>Τηλέφωνο:</strong> 210 5385100  </p></li>
						<li><p><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@teiath.gr</a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<h4>Ακολούθησε</h4>
				<div class="social-icons">
					<ul class="social-icons">
						<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
						<li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
						<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-1">
					<a href="index.php" class="logo">
						<img alt="Porto Website Template" class="img-responsive" src="img/logo5.jpg">
					</a>
				</div>
				<div class="col-md-7">
					<p>© Copyright 2014. All Rights Reserved.</p>
				</div>
				<div class="col-md-4">
					<nav id="sub-menu">
						<ul>
							<li><a href="page-faq.html">FAQ's</a></li>
							
							<li><a href="contact.php">Επικοινωνία</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>

</div> <!-- div class="body" -->

<!-- Libs -->
		<script src="vendor/jquery.js"></script>
		<script src="js/plugins.js"></script>
		<script src="vendor/jquery.easing.js"></script>
		<script src="vendor/jquery.appear.js"></script>
		<script src="vendor/jquery.cookie.js"></script>
		
		<script src="vendor/bootstrap.js"></script>
		<script src="vendor/twitterjs/twitter.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.js"></script>
		<script src="vendor/owl-carousel/owl.carousel.js"></script>
		<script src="vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
		<script src="vendor/magnific-popup/magnific-popup.js"></script>
		<script src="vendor/jquery.validate.js"></script>
		<script src="vendor/isotope/jquery.isotope.js"></script>
		<!-- Current Page Scripts -->
		<script src="js/views/view.home.js"></script>
		<!-- Theme Initializer -->
		<script src="js/theme.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
		<!-- 
		Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		 -->
	</body>
</html>