<?php $this->load->view("admin/header"); ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    	<h3>View Blog</h3>

		<!-- Add Modal Box Button
		<button 
			id="open-add-modal-btn" 
			class="btn btn-primary" 
			data-toggle="modal" 
			data-target="#add-modal-box"
		>
			Add a new Blog
		</button>
		Add Modal Box 
		<div 
			class="modal fade" id="add-modal-box" tabindex="-1" role="dialog" 
			aria-labelledby="modal-box-title" aria-hidden="true"
		>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modal-box-title">Add Blog</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						Placeholder for the Ajax response 
						<div id="modal-content-placeholder">
						Loading
						</div>
					</div>
				</div>
			</div>
		</div> -->
		
		<?php
			if ($result)
			{	
				echo '
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Description</th>
									<th scope="col">Image</th>
									<th scope="col">Status</th>
									<th scope="col">Edit</th>
									<th scope="col">Delete</th>
								</tr>
							</thead>

							<tbody>
				';
				$sr_no = 1;
				foreach ($result as $key => $value) 
				{
					echo '
						<tr>
							<td>'.$sr_no.'</td>
							<td>'.$value["blog_title"].'</td>
							<td>'.$value["blog_desc"].'</td>
							<td>
								<img 
									src=" '.base_url().$value["blog_img"].' " 
									class="img-fluid" width="100"
								>
							</td>
							<td>
								
								'.( $value['status'] == "1" ? "Published" : "Unpublished" ).'
							</td>
							
							<td>
                                <button 
                                    class="open-modal-btn btn btn-warning" 
                                    data-toggle="modal" 
                                    field_id='.$value["blogid"].' 
                                    data-target="#modal-box"
                                >
                                    Edit 
                                </button>
							</td>
							<td>
								<a
									class="del"
									data-id=" '.$value["blogid"].' "
									data-title=" '.$value["blog_title"].' "
								>
									<button 
										type="button" 
										class="btn btn-danger">
										Delete
									</button>
								</a>
							</td>
						</tr>
					';			
					$sr_no++;
				}
			}

			else
			{
				echo "No Record Found";
			}
		?>
          		</tbody>
        	</table>
      	</div>

	</main>

	<!-- The edit modal box -->
	<div 
		class="modal fade" id="modal-box" tabindex="-1" role="dialog" 
		aria-labelledby="modal-box-title" aria-hidden="true"
	>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-box-title">Edit Blog</h5>
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<!-- Placeholder for the Ajax response -->
					<div id="modal-content-placeholder">
					Loading...
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php $this->load->view('admin/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
	<?php
		if (isset($_SESSION['Updation'])) 
		{
			if($_SESSION['Updation']=="yes")
			{
				echo "alert('Blog Updated')";
			}
			else if($_SESSION['Updation']=="no")
			{
				echo "alert('Error! Blog Not Updated')";
			}
		}
	?>

	$(".del").click(function() 
		{
			var delete_id = $(this).attr('data-id');
			var delete_title = $(this).attr('data-title');
			var bool = confirm("Are you sure to delete the blog:" +delete_title);

			if (bool) 
			{
				$.ajax(
					{ 
						url:'<?= base_url().'admin/blog/deleteblog/'?>'+delete_id,
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

<script>
    // Attach a click event listener to the button
    $(".open-modal-btn").click(function() 
        {
            // Make the Ajax request
            var blogid= $(this).attr('field_id');
            
            $.ajax(
                {
                    url: "<?php echo base_url();?>admin/blog/editblog/"+blogid,
                    type: "POST",
                    // data: {blog_id:blogid},
                    success: function(response) 
                    {
                        // Update the content of the modal box
                        $("#modal-content-placeholder").html(response);
                        // Open the modal box
                        $("#modal-box").modal("show");
                    },

                    error: function() 
                    {
                        // Handle errors
                        $("#modal-content-placeholder").html("Error loading content.");
                        $("#modal-box").modal("show");
                    }
                }
            );
        }
    );

</script>

<!-- <script>
    // Attach a click event listener to the button
    $("#open-add-modal-btn").click(function() 
        {
            // Make the Ajax request
            $.ajax(
                {
                    url: "<?php echo base_url();?>admin/blog/addblog",
                    type: "GET",
                    success: function(response) 
                    {
                        // Update the content of the modal box
                        $("#modal-content-placeholder").html(response);
                        // Open the modal box
                        $("#modal-box").modal("show");
                    },

                    error: function() 
                    {
                        // Handle errors
                        $("#modal-content-placeholder").html("Error loading content.");
                        $("#modal-box").modal("show");
                    }
                }
            );
        }
    );

</script> -->