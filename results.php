<?php
include 'core/init.php';
include 'includes/overall/header.php';
$search = ($_GET['q']);
?>	
<div role="main" class="main">
	<section class="page-top">
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<h2>Αποτελέσματα για: "<?php echo sanitize($search); ?>"</h2>
				</div>
			</div>
		</div>
	</section>
	<div class="container">	
		<i>Θυμηθείτε οτι μπορείτε να ψαχνετε για (Όνομα Μαγαζιού, Κατηγορία όπως πχ Night Club, τηλέφωνο μαγαζιου, email, Περιοχή).</i><br><br><br>
		<ul class="nav nav-pills sort-source" data-sort-id="magazia" data-option-key="filter">
			<li data-option-value="*" class="active"><a href="#">Όλα</a></li>
			<?php	$cats = getCategories();
					foreach ($cats as $cat) : ?>
			<li data-option-value=".<?php echo $cat['category']; ?>"><a href="#"><?php echo $cat['name']; ?></a></li>
			<?php endforeach ?>
		</ul>		
		<hr />
		<div class="row">
			<ul class="portfolio-list sort-destination" data-sort-id="magazia">	
			 <?php  $results = getClientsBySearch($search); 
					foreach ($results as &$result) :
					$likes = getLikes($result['client_id']); ?>
				<li class="col-md-3 isotope-item <?php echo $result['category']; ?>">
					<div class="portfolio-item img-thumbnail">
						<a href="client_details.php?client=<?php echo $result['name'];?>" class="thumb-info">
							<img alt="" class="img-responsive" src="<?php echo $result['main_photo'];?>" style="height:200px; width:253px;">
							<span class="thumb-info-title">
								<span class="thumb-info-inner"><?php echo $result['name'];?></span>
								<span class="thumb-info-type"><?php echo $result['notes'];?></span>
							</span>
							<span class="thumb-info-action">
								<span title="Universal" href="#" class="thumb-info-action-icon">
								<i class="icon icon-heart">
								<p class="number" id ="number"><?php echo $likes; ?></p>
								</i>
								</span>
							</span>
						</a>
					</div>
				</li>
			<?php endforeach ?>
			</ul>
		</div>	
	</div>

</div>
<?php include 'includes/overall/footer.php'; ?>		
