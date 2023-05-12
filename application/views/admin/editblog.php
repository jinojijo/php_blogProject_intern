<form 
	enctype="multipart/form-data"
	action=" <?= base_url().'admin/blog/editblog_post'?> "
	method="POST"
>

	<input 
		type="hidden" 
		name="blog_id" 
		value="<?= $blog_id?>"
	>	

	<div class="col-md-12">
		<label for="publish_unpublish" class="form-label">Publish Status</label>
		<select
			class="form-control" 
			name="publish_unpublish"
		>
			<option selected>Select Option</option>
			<option 
				value="1"
				<?= ( $result[0]['status'] == "1" ? "selected" : "" ) ?>
			>
				Publish
			</option>
			<option 
				value="0"
				<?= ( $result[0]['status'] == "0" ? "selected" : "" ) ?>
			>
				Unpublish
			</option>
		</select>
	</div>

	<div class="col-md-12">
		<label for="blogTitle" class="form-label">Blog Title</label>
		<input type="text" 
			class="form-control" 
			name="blogTitle"
			value="<?= $result[0]['blog_title'] ?>"
		>
	</div>

	<div class="col-md-12">
		<label for="blogDesc" class="form-label">Description</label>
		<textarea 
			class="form-control" 
			name="blogDesc" 
			rows="3"
		><?= $result[0]['blog_desc'] ?>
		</textarea>
	</div>
	
	<div class="col-12">
		<label for="blogImg" class="form-label">Image</label>
		<br/>
		<img 
			src="<?= base_url().$result[0]['blog_img'] ?> "
			width="100"
		>
		<input type="file" 
			name="blogImg"
		>
	</div>

	<br/>
	<div class="col-12">
		<button type="submit" class="btn btn-primary">
			edit blog
		</button>
	</div>
</form>

		

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