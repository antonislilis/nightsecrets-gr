<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>	

<div role="main" class="main">
	<div id="content" class="content full">
		<div class="slider-container">
			<div class="slider" id="revolutionSlider">
				<ul>
					<li data-transition="fade" data-slotamount="13" data-masterspeed="300" >

						<img src="img/slides/slide-back4.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

						<div class="tp-caption sft stb visible-lg"
							 data-x="72"
							 data-y="180"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo"><img src="img/slides/slide-title-border.png" alt=""></div>

						<div class="tp-caption top-label lfl stl"
							 data-x="122"
							 data-y="180"
							 data-speed="300"
							 data-start="500"
							 data-easing="easeOutExpo">ΚΑΛΩΣ ΗΡΘΑΤΕ ΣΤO</div>

						<div class="tp-caption sft stb visible-lg"
							 data-x="372"
							 data-y="180"
							 data-speed="300"
							 data-start="1000"
							 data-easing="easeOutExpo"><img src="img/slides/slide-title-border.png" alt=""></div>

						<div class="tp-caption main-label sft stb"
							 data-x="30"
							 data-y="210"
							 data-speed="300"
							 data-start="1500"
							 data-easing="easeOutExpo">NightSecrets.gr</div>

						<div class="tp-caption bottom-label sft stb"
							 data-x="80"
							 data-y="280"
							 data-speed="500"
							 data-start="2000"
							 data-easing="easeOutExpo">Τελική εργασία για το έτος 2014-15</div>

						<div class="tp-caption blackboard-text lfb "
							 data-x="530"
							 data-y="300"
							 data-speed="500"
							 data-start="3450"
							 data-easing="easeOutExpo" style="font-size: 37px;">Για να εισαι</div>

						<div class="tp-caption blackboard-text lfb "
							 data-x="555"
							 data-y="350"
							 data-speed="500"
							 data-start="3650"
							 data-easing="easeOutExpo" style="font-size: 47px;">παντα μεσα</div>

						<div class="tp-caption blackboard-text lfb "
							 data-x="580"
							 data-y="400"
							 data-speed="500"
							 data-start="3850"
							 data-easing="easeOutExpo" style="font-size: 32px;">και γρηγορα</div>
					</li>
				</ul>
			</div>
		</div> <!-- slider container -->
		<div class="home-intro">
			<div class="container">

				<div class="row">
					<div class="col-md-8">
						<p>
							Ο καλύτερος τρόπος για να βρείτε τα καλύτερα μαγαζιά της <em>Αθήνας.</em>
							<span>Μήν αργείς, άρχισε να ψάχνεις τώρα τις καλύτερες λύσεις για την διασκέδασή σου!!!</span>
						</p>
					</div>
					<?php if (isset($_SESSION['user_id'])){
					} else {?>
					<div class="col-md-4">
						<div class="get-started">
							<a href="page-login.php" class="btn btn-lg btn-primary">Συνδέσου τώρα!</a>
							<div class="learn-more">ή <a href="page-login.php">κάνε εγγραφή.</a></div>
						</div>
					</div>
					<?php } ?>
				</div>

			</div>
		</div>
		<div class="container">
			<div class="row">
				<hr class="tall" />
			</div>
		</div>
		<div class="container">
			<div class="row center">
				<div class="col-md-12">
					<h2 class="short word-rotator-title">
						Περισσότερα απο 100 συναργαζόμενα  
						<strong>
							<span class="word-rotate">
								<span class="word-rotate-items">
									<span>Night Clubs</span>
									<span>Bars</span>
									<span>Εστιατόρια</span>
									<span>Καφέ</span>
									<span>και άλλα</span>
								</span>
							</span>
						</strong>
						μόνο στο...
					</h2>
					<h2><em>NightSecrets</em></h2>
				</div>
			</div>
			<div class="row center">
				<div class="owl-carousel" data-plugin-options='{"items": 6, "singleItem": false, "autoPlay": true}'>
				
				
				   <?php $clients = getClients();
				   foreach ($clients as &$client) {
				   $client_data = client_data($client['client_id'], 'logo');
				   ?>
					<div>
						<img class="img-responsive" src="<?php echo $client_data['logo']; ?>" alt="" height="80" width="160"><br>
				
					</div>
					<?php } ?>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div> <!-- main -->

			


<?php include 'includes/overall/footer.php'; ?>		
