<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>	

<?php
$client_name = $_GET['client'];
$client_id = client_id_from_name($client_name);
$client_data = client_data($client_id,'name','description','notes','category','address','logo','main_photo','telephone','perioxi','url','liked', 'video');
$number = getLikes($client_id);
?>
<script type="text/javascript">
	$(document).on('click','.add_favourite',function(){
		// var SerializedData = 'Function=AddToWatched&UserID='+$(this).attr('data-id')+'&MovieID='+$(this).attr('movie-id');
		var SerializedData = 'Function=AddToFavourites&ClientID='+$(this).attr('client-id');
		var _Item = $(this);
		$.post('ajax/dispatcher.php',SerializedData,function(data,success){
			if (success=='success'){
				if (data.status=='ok')
				{
					// alert(data.text);				
					$(_Item).removeClass('add_favourite');
					$(_Item).addClass('remove_favourite');	
					$(_Item).find('span').text(data.newtext);
					//var _src = $(_img).attr('src').replace('off','on');
					//$(_img).attr('src',_src);
					//$(_Item).closest.getElementById('ChangeBorder').children.removeClass;
				
				}
				//display_message(data.title,data.text);
			}
		},'json')
	})
	
	$(document).on('click','.remove_favourite',function(){
		// var SerializedData = 'Function=AddToWatched&UserID='+$(this).attr('data-id')+'&MovieID='+$(this).attr('movie-id');
		var SerializedData = 'Function=RemoveFavourites&ClientID='+$(this).attr('client-id');
		var _Item = $(this);
		$.post('ajax/dispatcher.php',SerializedData,function(data,success){
			if (success=='success'){
				if (data.status=='ok')
				{
					 //alert(data.text);				
					$(_Item).removeClass('remove_favourite');
					$(_Item).addClass('add_favourite');	
					$(_Item).find('span').text(data.newtext);
					
					//var _src = $(_img).attr('src').replace('off','on');
					//$(_img).attr('src',_src);
					//$(_Item).closest.getElementById('ChangeBorder').children.removeClass;
				
				}
				//display_message(data.title,data.text);
			}
		},'json')
	})

	$(document).on('click','.liked',function(){
		// var SerializedData = 'Function=AddToWatched&UserID='+$(this).attr('data-id')+'&MovieID='+$(this).attr('movie-id');
		var SerializedData = 'Function=RemoveLike&ClientID='+$(this).attr('client-id');
		var _Item = $(this);
		$.post('ajax/dispatcher.php',SerializedData,function(data,success){
			if (success=='success'){
				if (data.status=='ok')
				{
					// alert(data.text);	
					$(_Item).removeClass('liked');
					$(_Item).addClass('likednon');						
					$(_Item).find('span').text(data.newlikes);
					$(_Item).find('.goDislike').css("color:white");
					
					//var _img = $(_Item).find('img.img-swap');
					//var _src = $(_img).attr('src').replace('off','on');
					//$(_img).attr('src',_src);
					//$(_Item).closest.getElementById('ChangeBorder').children.removeClass;
				
				}
				//display_message(data.title,data.text);
			}
		},'json')
	})

	$(document).on('click','.likednon',function(){
		// var SerializedData = 'Function=AddToWatched&UserID='+$(this).attr('data-id')+'&MovieID='+$(this).attr('movie-id');
		var SerializedData = 'Function=AddLike&ClientID='+$(this).attr('client-id');
		var _Item = $(this);
		$.post('ajax/dispatcher.php',SerializedData,function(data,success){
			if (success=='success'){
				if (data.status=='ok')
				{
					// alert(data.text);				
					$(_Item).removeClass('likednon');						 
					$(_Item).addClass('liked');
					$(_Item).find('span').text(data.newlikes);
					//var _img = $(_Item).find('img.img-swap');
					//var _src = $(_img).attr('src').replace('off','on');
					//$(_img).attr('src',_src);
					//$(_Item).closest.getElementById('ChangeBorder').children.removeClass;
				
				}
				//display_message(data.title,data.text);
			}
		},'json')
	})
	
	$(document).on('click','.clientvideoopen',function(){
		var _Item = $(this);
					$(_Item).removeClass('clientvideoopen');						 
					$(_Item).addClass('clientvideoclose');
					$(_Item).find('span').text("Close Video");	
		
	})
	
	$(document).on('click','.clientvideoclose',function(){
		var _Item = $(this);	
					$(_Item).removeClass('clientvideoclose');						 
					$(_Item).addClass('clientvideoopen');
					$(_Item).find('span').text("Show Video");	
		
	})

</script>	

<script type="text/javascript">
	function toggleDiv(divId) {
		$("#"+divId).toggle("slow");
	}
</script>	

<div role="main" class="main">

	<section class="page-top">
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<h2>Μαγαζιά</h2>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="portfolio-title">
			<div class="row">
				<div class="portfolio-nav-all col-md-1">
					<a href="clients.php" rel="tooltip" data-original-title="Πίσω στα μαγαζιά"><i class="icon icon-th"></i></a>
				</div>
				<div class="col-md-10 center">
					<h2 class="shorter"><strong><?php echo $client_data['name'];?></strong></h2>
				</div>				
				<div class="portfolio-info">
					<div class="row">
						<div class="col-md-12 center">
						
							<ul>
							<?php 
							
						$iLiked = iLiked($client_id);
						if ($iLiked == 0) {
						?>
								<li>
									<a href='javascript:;' rel="tooltip" data-original-title="Didnt Like" class="likednon" client-id =<?php echo $client_id; ?>><i class="icon icon-heart goLike" style="color:black;" id=""></i><font size=3><span><?php echo getLikes($client_id) ?></span></font></a>
								</li>
								<?php } else if ($iLiked == 1 ){  ?>
								<li>
									<a href='javascript:;' rel="tooltip" data-original-title="Liked" class="liked" client-id =<?php echo $client_id; ?>><i class="icon icon-heart goDislike" style="color:red;" id=""></i><font size=3><span><?php echo getLikes($client_id) ?></span></font></a>
								</li>
								<?php } ?>
								<li>
									<i class="icon icon-tags"></i> <font size=3><span><?php echo $client_data['notes']; ?></span></font>
								</li>
							</ul>
						</div>
					</div>
				</div>			
			</div>
		</div>

		<hr class="tall">
		
		<div class="row">
			<div class="col-md-4">	
				<div class="owl-carousel" data-plugin-options='{"items": 1, "autoHeight": true}'>
					<div>
						<div class="thumbnail">
							<img alt="" class="img-responsive" src="<?php echo $client_data['logo']; ?>">
						</div>
					</div>
					<div>
						<div class="thumbnail">
							<img alt="" class="img-responsive" src="<?php echo $client_data['main_photo']; ?>">
						</div>
					</div>	
				</div>				
				<?php 
				$iFavourite = iFavourite($client_id);
				if ($iFavourite == 0) {
				?>
				
				<a href='javascript:;' class="btn btn-primary btn-icon add_favourite" id="" client-id =<?php echo $client_id; ?>>
					<i class="icon icon-star"></i>
					<span>Προσθήκη σε Αγαπημένα</span>
				</a>
				<?php } else { ?>
				<a href='javascript:;' class="btn btn-primary btn-icon remove_favourite" id="" client-id =<?php echo $client_id; ?>>
					<i class="icon icon-star"></i>
					<span>Αγαπημένo</span>
				</a>
				<?php } ?>
				<span class="arrow hlb" data-appear-animation="rotateInUpLeft" data-appear-animation-delay="800" style="width:90px;"></span>
			</div>					
			<div class="col-md-8">
				<h4><strong>Περιγραφή</strong></h4>
				<p class="taller"><?php echo $client_data['description']; ?></p>
				<ul class="portfolio-details">
					<li>
						<p><strong>Τηλέφωνο Επικοινωνίας</strong></p>
						<ul class="list list-skills icons list-unstyled list-inline">
							<li><i class="icon icon-phone"></i><?php echo $client_data['telephone']; ?></li>
							
						</ul>
					</li>
					<li>
						<p><strong>Περιοχή</strong></p>
						<p><?php echo $client_data['address']; ?> , <strong><?php echo $client_data['perioxi']; ?></strong></p>
					</li>					
					<li>
						<p><strong>Site</strong></p>
						<p><a href="<?php echo $client_data['url']; ?>"> <?php echo $client_data['url']; ?></a></p>
					</li>					
				</ul>
					<a class="btn bg-danger clientvideoopen" href="javascript:toggleDiv('Video');"><span>Show Video</span></a>
					<div id="Video" style="display:none;">
						<?php echo  $client_data['video']; ?>
					</div>		
			</div>
		</div>

		<hr class="tall" />

		<div class="row">
			<div class="col-md-12">
				<h3>Προτεινόμενα <strong><?php echo $client_data['notes']; ?></strong></h3>
			</div>
			<ul class="portfolio-list">			
			<?php 
			$categories = getClientsByCategory($client_data['category']);
			
			foreach ($categories as &$category) :
			$client_cat_id = $category['client_id'];
			$client_cat_data = client_data($client_cat_id, 'logo', 'name', 'main_photo', 'notes');
			?>
			
				<li class="col-md-3">
					<div class="portfolio-item thumbnail">
						<a href="client_details.php?client=<?php echo $client_cat_data['name']; ?>" class="thumb-info">
							<img alt="" class="img-responsive" src="<?php echo $client_cat_data['main_photo']; ?>" style="min-height:200px;">
							<span class="thumb-info-title">
								<span class="thumb-info-inner"><?php echo $client_cat_data['name']; ?></span>
								<span class="thumb-info-type"><?php echo $client_cat_data['notes']; ?></span>
							</span>
							<span class="thumb-info-action">
								<span title="Universal" href="#" class="thumb-info-action-icon"><i class="icon icon-link"></i></span>
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
