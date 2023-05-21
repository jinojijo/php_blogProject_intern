<?php $this->load->view("admin/header"); ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<form 
				enctype="multipart/form-data"
				action=" <?= base_url().'admin/blog/addblog_post'?> "
				method="POST"
			>

				<div class="col-md-12">
					<label for="blogTitle" class="form-label">Blog Title</label>
					<input type="text" class="form-control" name="blogTitle">
				</div>

				<br/>
				<div class="col-md-12">
					<label for="blogDesc" class="form-label">Description</label>
					<textarea class="form-control" name="blogDesc" rows="3"></textarea>
				</div>
				
				<br/>
				<div class="col-12">
					<label for="blogImg" class="form-label">Image</label>
					<br/>
					<input type="file" name="blogImg">
				</div>

				<br/>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">
						Upload
					</button>
				</div>

				<br/>
				<div class="col-12">
					<a 
						class="btn btn-secondary"
						href="<?= base_url().'admin/dashboard' ?>"
					>
						Cancel
					</a>
				</div
			</form>
		</div>
	</main>
	
<?php $this->load->view('admin/footer.php'); ?>

<script>
	<?php
		if (isset($_SESSION['Insertion'])) 
		{
			if($_SESSION['Insertion']=="yes")
			{
				echo "alert('Blog Added')";
			}
			else
			{
				echo "alert('Error! Blog Not Added')";
			}
		}
	?>
</script>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('blogDesc');
</script>