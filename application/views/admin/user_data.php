<?php $this->load->view("admin/header"); ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    	<h3>Users</h3>
		
		<?php
			if ($result)
			{	
				echo '
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">User Name</th>
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
						<tr
							class='.( $value['status'] == "0" ? "table-warning" : "" ).'
						>
							<td>'.$sr_no.'</td>
							<td>'.$value["userName"].'</td>
							
							<td>
								
								'.( $value['status'] == "1" ? "Active" : "Inactive" ).'
							</td>
							
							<td>
                                <button 
                                    class="open-modal-btn btn btn-warning" 
                                    data-toggle="modal" 
                                    field_id='.$value["userId"].' 
                                    data-target="#modal-box"
                                >
                                    Edit 
                                </button>
							</td>
							<td>
								<a
									class="del"
									data-id=" '.$value["userId"].' "
									data-title=" '.$value["userName"].' "
								>
									<button 
										type="button" 
										class="btn btn-danger"
										'.( $value['userId'] == "1" ? "disabled" : "").'
									>
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

			<a 
				class="btn btn-info"
				href="<?=base_url()."admin/login/new_user_admin" ?>";
			>
				Add New User
			</a>
      	</div>

	</main>

	<!-- The edit user modal box -->
	<div 
		class="modal fade" id="modal-box" tabindex="-1" role="dialog" 
		aria-labelledby="modal-box-title" aria-hidden="true"
	>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-box-title">
						Edit User
					</h5>
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
		if (isset($_SESSION['Updation_user'])) 
		{
			if($_SESSION['Updation_user']=="yes")
			{
				echo "alert('User Data Updated')";
			}
			else if($_SESSION['Updation_user']=="no")
			{
				echo "alert('Error! User Data Not Updated')";
			}
			else 
			{
				echo "alert('Error! UserName: $_SESSION[Updation_user] Already Used')";
			}
		}
	?>

	<?php
		if (isset($_SESSION['Add_user'])) 
		{
			if($_SESSION['Add_user']=="yes")
			{
				echo "alert('User Data Added')";
			}
			else if($_SESSION['Add_user']=="no")
			{
				echo "alert('Error! User Data Not Added')";
			}
			else 
			{
				echo "alert('Error! UserName: $_SESSION[Add_user] Already Used')";
			}
		}
	?>

	$(".del").click(function() 
		{
			var delete_id = $(this).attr('data-id');
			var delete_title = $(this).attr('data-title');
			var bool = confirm("Are you sure to delete the user:" +delete_title);

			if (bool) 
			{
				$.ajax(
					{ 
						url:'<?= base_url().'admin/login/delete_user/'?>'+delete_id,
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

	//edit user modal
	// Attach a click event listener to the button
    $(".open-modal-btn").click(function() 
        {
            // Make the Ajax request
            var userId= $(this).attr('field_id');
            
            $.ajax(
                {
                    url: "<?php echo base_url();?>admin/login/edituser/"+userId,
                    type: "POST",
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