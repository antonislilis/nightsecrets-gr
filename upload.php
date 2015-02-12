<?php 
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>
<script type="text/javascript">
	$(document).on('click','.deletePhoto',function(){
		var SerializedData = 'Function=RemovePhoto&ActionID='+$(this).attr('action-id');
		var _Item = $(this);
		$.post('ajax/dispatcher.php',SerializedData,function(data,success){
			if (success=='success'){
				if (data.status=='ok')
				{
					//alert(data.text);				
					$(_Item).parent().parent().parent().parent().fadeOut(1000);
				
				}		
			}
		},'json')
	})
	
	$(document).on('click','.SetProfile',function(){
		var SerializedData = 'Function=SetProfilePhoto&ActionID='+$(this).attr('action-id');
		var _Item = $(this);
		$.post('ajax/dispatcher.php',SerializedData,function(data,success){
			if (success=='success'){
				if (data.status=='ok')
				{
					//alert(data.text);				
					//$(_Item).parent().parent().parent().parent().fadeOut(1000);
				location.reload();
				}		
			}
		},'json')
	})
</script>

<div role="main" class="main">
	<section class="page-top">
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<h2>Οι φωτογραφίες του προφίλ σας</h2>
				</div>
			</div>
		</div>
	</section>	
	<div class="container">
	  <div class="col-md-4 pull-right">
			<h4> Ανεβάστε καινούρια φωτογραφία </h4>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="image" class="btn bg-danger"/>
					<input type="submit" value="Upload" name="action" class="btn btn-primary btn-lg"/>
				</div>
			</form>
			<?php if($_FILES['image']['name']) {
			list($file,$error) = upload('image','img/avatars/','jpeg,gif,png,jpg');
			if($error) print $error;
			} ?>
		</div>	
	</div>
	
	<div class="container">
	<style>
	.profilePhoto :hover .tooldetails {display:block; background:black; opacity:0.8;}
	.tooldetails {display:none;}
	.movie-container .tooldetails p {color:white; opacity:none;}
	</style>
		<div class="row">
			<?php 
			$photos = getAllMyPhotos();
			foreach ($photos as $photo): ?>
				<div class="col-md-3 profilePhoto" style="margin-top: 40px;">
					<a class="img-thumbnail lightbox pull-left" href="<?php echo $photo['photo_path']; ?>" data-plugin-options='{"type":"image"}'>
						<img class="img-responsive" width="215" src="<?php echo $photo['photo_path']; ?>" style="height:180px;">	
						<span class="zoom tooldetails">
						<i class="icon icon-16 icon-white-shadowed icon-search"></i>
						</span>			
					</a>		
					<div class="portfolio-info">
						<ul>						
							<li>
								<a href='javascript:;' rel="tooltip" data-original-title="Delete" class="deletePhoto"  action-id=<?php echo $photo['avatars_id'];?>>
								<font size=4><i class="icon icon-trash-o" style="color:red;" id=""></i><span></span></font></a>
							</li>							
							<li>
								<a href='javascript:;' rel="tooltip" data-original-title="Set" class="SetProfile" action-id=<?php echo $photo['avatars_id'];?>>
								<font size=4><i class="icon icon-picture-o" style="color:#744BA9;"></i><span></span></font></a>
							</li>
						</ul>
					</div>					
				</div>					
			<?php endforeach ?>
		</div>
	</div>	<!-- container -->
</div> <!-- main -->
<?php
include 'includes/overall/footer.php';
 ?>