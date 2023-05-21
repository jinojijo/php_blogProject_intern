<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<main>
	
	<!-- <section class="py-5 text-center container">
		<div class="row py-lg-5">
			<div class="col-lg-6 col-md-8 mx-auto"> -->
				<h1 class="fw-light">
					<?= $result[0]['blog_title'] ?>
				</h1>
			<!-- </div>
		</div>
	</section> -->

	<div class="album py-5 bg-body-tertiary">
		<div class="container">
				<div class="col-md-12">
					<div class="card shadow-sm">

						<img
							class="card-img-top"
							src=" <?= base_url().$result[0]['blog_img'] ?> "
							height="300"
						>

						<div class="card-body">
							<p class="card-text">
								<?= $result[0]['blog_desc'] ?>
							</p>

							<form
								method="POST"
							>

								<input 
									type="hidden" 
									id="blog_id" 
									name="blog_id"
									value="<?= $result[0]['blogid']?>"
								>

								<?php
									if ($like) 
									{
								?>
									
									<?php 
										$likedOR = 0;
										foreach ($like as $key => $value) 
										{
											if ($value['userid']==$user_id) 
											{
												$likedOR = 1;
											}
										}
										
										if ($like[0]['liked']==1 && $likedOR==1) 
										{
										
									?>
										<button type="submit" class="unlike">
											<span>
												<!-- HEAVY BLACK HEART &#10084; -->
												&#10084;
											</span>
										</button>
									<?php
										} 
										else 
										{
									?>	
										<button type="submit" class="like">
											<span>
												<!-- WHITE HEART SUIT  -->
												&#9825;
											</span>	
										</button>
									<?php		
										}		
									}
									else
									{
								?>
									<button type="submit" class="like">
										<span> 
											<!-- WHITE HEART SUIT  -->
											&#9825;
										</span>
									</button>	  
								<?php
									}
								?>
							</form>
							
							<?php
								if ($numlike) 
								{
									if($numlike[0]['count(*)'] > 0)
									{
										if($numlike[0]['count(*)'] == 1)
										{
											echo "1 like" ;
										}
										elseif($numlike[0]['count(*)'] > 1)
										{
											echo $numlike[0]['count(*)']." likes";
										}
									}
								}
							?>

						</div>

						<?php
							if ($cmt) 
							{
						?>

							Comment:
							<?php
								foreach ($cmt as $c) 
								{
							?>
								<div class="card-body">
									<p class="card-text">
										<?php
											$userName=$this->ArticleModel->getUser($c["userid"]);
											echo '<b>'.$userName[0]->userName.'</b>';
											echo '<br/>';
											echo $c["comment"];
										?>
									</p>
								</div>

							<?php } 
						}
						?>
							<form 
								method="POST"
							>

								<input 
									type="hidden" 
									id="blog_id" 
									name="blog_id"
									value="<?= $result[0]['blogid']?>"
								>	

								<label for="comment" class="form-label">Comment</label>

								<div class="row">
									<div class="col-md-10">
										<textarea class="form-control" id="comment" name="comment" rows="1">
										</textarea>
									</div>

									<div class="col-2">
										<button type="submit" class="btn btn-primary add_comment">
											<!-- THREE-D TOP-LIGHTED RIGHTWARDS ARROWHEAD -->
											&#10146;
										</button>
									</div>
								</div>
							</form>
						</div>
						
					</div>
				</div>
		</div>
	</div>

</main>


<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
	$(".add_comment").click(function() 
		{
			var comment=$("#comment").val();
			var blogid=$("#blog_id").val();

			$.ajax(
				{ 
					url:'<?= base_url().'home/add_comment'?>',
					type:"POST",
					data:{comment:comment,blogid:blogid},
					
					success:function(response)
					{
						console.log(response);
					}

				}
			);	
		}
	);

	$(".like").click(function() 
		{
			var blogid=$("#blog_id").val();

			$.ajax(
				{ 
					url:'<?= base_url().'home/like'?>',
					type:"POST",
					data:{blogid:blogid},
					
					success:function(response)
					{
						console.log(response);
					}

				}
			);	
		}
	);

	$(".unlike").click(function() 
		{
			var blogid=$("#blog_id").val();
			
			$.ajax(
				{ 
					url:'<?= base_url().'home/unlike'?>',
					type:"POST",
					data:{blogid:blogid},
					
					success:function(response)
					{
						console.log(response);
					}

				}
			);	
		}
	);
</script>