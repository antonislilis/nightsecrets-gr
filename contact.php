<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>	
<div role="main" class="main">
	<section class="page-top">
		<div class="container">	
			<div class="row">
				<div class="col-md-12">
					<h2>Επικοινωνία</h2>
				</div>
			</div>
		</div>
	</section>

	<!-- Google Maps -->
	<div id="googlemaps" class="google-map hidden-xs"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-success hidden" id="contactSuccess">
					<strong>Success!</strong> Your message has been sent to us.
				</div>

				<div class="alert alert-danger hidden" id="contactError">
					<strong>Error!</strong> There was an error sending your message.
				</div>
				<!--<h2 class="short"><strong>Επικοινωνία</strong></h2>-->
				<form action="php/contact-form.php" id="contactForm" type="post">
					<div class="row">
						<div class="form-group">
							<div class="col-md-6">
								<label>Το όνομά σας *</label>
								<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name">
							</div>
							<div class="col-md-6">
								<label>Το email σας *</label>
								<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Θέμα</label>
								<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Μήνυμα *</label>
								<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="submit" value="Στέιλτε Μήνυμα" class="btn btn-primary btn-lg" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<h4 class="push-top">Είδατε στα <strong>FAQ's ;</strong></h4>
				<p>Μπορείτε να ελέγξετε στις ήδη απαντημένες ερωτήσεις μήπως βρείτε απάντηση πρίν επικοινωνήσετε μαζί μας</p>
				<hr />
				<h4>Τα <strong>Γραφεία</strong> μας</h4>
				<ul class="list-unstyled">
					<li><i class="icon icon-map-marker"></i> <strong>Διεύθυνση:</strong> Αγ.Σπυρίδωνος, Αιγάλεω, ΤΕΙ Αθηνών</li>
					<li><i class="icon icon-phone"></i> <strong>Τηλέφωνο:</strong> 210 5385100 </li>
					<li><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@teiath.gr">mail@teiath.gr</a></li>
				</ul>

				<hr />

				<h4>Ώρες <strong>Επικοινωνίας</strong></h4>
				<ul class="list-unstyled">
					<li><i class="icon icon-time"></i> Δευτέρα - Παρασκευή 9πμ εώς 5μμ</li>
					<li><i class="icon icon-time"></i> Σάββατο - 9πμ εώς 2μμ</li>
					<li><i class="icon icon-time"></i> Κυριακή - Κλειστά</li>
				</ul>
			</div> <!-- md 6 -->
		</div> <!-- row -->
	</div> <!-- container -->
</div> <!-- main -->

	
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="vendor/jquery.gmap.js"></script>
<script>
	/*
	Map Settings

		Find the Latitude and Longitude of your address:
			- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
			- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

	*/
	// Map Markers
	var mapMarkers = [{
		address: "Αγίου Σπυρίδωνος, Αιγάλεω 22",
		html: "<strong>NightTerror</strong><br>Αιγάλεω 122 43",
		icon: {
			image: "img/pin.png",
			iconsize: [26, 46],
			iconanchor: [12, 46]
		},
		popup: true
	}];

	// Map Initial Location
	var initLatitude = 38.0020116;
	var initLongitude = 23.6783249;

	// Map Extended Settings
	var mapSettings = {
		controls: {
			panControl: true,
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: true,
			streetViewControl: true,
			overviewMapControl: true
		},
		scrollwheel: false,
		markers: mapMarkers,
		latitude: initLatitude,
		longitude: initLongitude,
		zoom: 16
	};

	var map = $("#googlemaps").gMap(mapSettings);

	// Map Center At
	var mapCenterAt = function(options, e) {
		e.preventDefault();
		$("#googlemaps").gMap("centerAt", options);
	}
</script>
<!-- Page Scripts -->
<script src="js/views/view.contact.js"></script>

<?php include 'includes/overall/footer.php'; ?>		
