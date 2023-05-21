<?php $this->load->view("admin/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

		<h1 class="fw-light">
			Blog Title : <?= $result[0]['blog_title'] ?>
		</h1>

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
								Blog Description :
								<pre>
									<?= $result[0]['blog_desc'] ?>
								</pre>
							</p>

							
							<?php
								if ($numlike) 
								{
									if($numlike[0]['count(*)'] > 0)
									{
										if($numlike[0]['count(*)'] == 1)
										{
											echo "<b>1 like</b>" ;
										}
										elseif($numlike[0]['count(*)'] > 1)
										{
											echo "<b> 
												'.$numlike[0]['count(*)'].' likes
											</b>";
										}
									}
								}
							?>

						</div>

						<?php
							if ($cmt) 
							{
						?>

							Comments:
							<?php
								foreach ($cmt as $c) 
								{
							?>
								<div class="card-body">
									<p class="card-text">
										<table>
											<tr>
												<td>
													<a
														class="del"
														data-id="<?=$c['id']?>"
														data-title="<?=$c["comment"]?>"
													>
														<span data-feather="trash-2" color="red"></span>
													</a>
													&nbsp;
												</td>
												<td>
													<?php
														$userName=$this->ArticleModel->getUser($c["userid"]);
														echo '<b>'.$userName[0]->userName.'</b>';
														echo '<br/>';
														echo $c["comment"];
													?>
												</td>
												
											</tr>
										</table>
									</p>
								</div>

							<?php } 
						}
						?>
							
						</div>
						<a 
							class="btn btn-secondary"
							href="<?= base_url().'admin/blog/' ?>"
						>
							View All Blog
						</a>
					</div>
				</div>
		</div>
	</div>
	
</main>
<?php $this->load->view('admin/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
	$(".del").click(function() 
		{
			var delete_id = $(this).attr('data-id');
			var delete_title = $(this).attr('data-title');
			var bool = confirm("Are you sure to delete the comment: " +delete_title);

			if (bool) 
			{
				$.ajax(
					{ 
						url:'<?= base_url().'admin/blog/delete_comment/'?>'+delete_id,
						type:"POST",
						data:{'delete_id': delete_id},

						success:function(response)
						{
							console.log(response);
							if(response == "deleted")
							{
								location.reload();
							}
							else if(response == "Not DELETED")
							{
								alert("something went wrong");
							}
						}

					}
				);
			}
			else
			{

			}
		}
	);
</script>