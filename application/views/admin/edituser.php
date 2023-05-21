<form 
	enctype="multipart/form-data"
	action=" <?= base_url().'admin/login/edituser_post'?> "
	method="POST"
>

	<input 
		type="hidden" 
		name="user_id" 
		value="<?= $userId?>"
	>	

	<input 
		type="hidden" 
		name="old_user_name" 
		value="<?= $result[0]['userName'] ?>"
	>

	<div class="col-md-12">
		<label for="active_inactive" class="form-label">Status</label>
        
		<select
			class="form-control" 
			name="active_inactive"
            <?= $userId == "1" ? "disabled" : "" ?>
		>
			<option selected>Select Option</option>
			<option 
				value="1"
				<?= ( $result[0]['status'] == "1" ? "selected" : "" ) ?>
			>
				Active
			</option>
			<option 
				value="0"
				<?= ( $result[0]['status'] == "0" ? "selected" : "" ) ?>
			>
				Inactive
			</option>
		</select>
	</div>

	<div class="col-md-12">
		<label for="userName" class="form-label">User Name</label>
		<input type="text" 
			class="form-control" 
			name="userName"
			value="<?= $result[0]['userName'] ?>"
            <?= $userId == "1" ? "disabled" : "" ?>
		>
	</div>

	<div class="col-md-12">
		<label for="password" class="form-label">Password</label>
		<input type="text" 
			class="form-control" 
			name="password"
			value="<?= $result[0]['password'] ?>"
		>
	</div>

	<br/>
	<div class="col-12">
		<button type="submit" class="btn btn-primary">
			edit user data
		</button>
	</div>
</form>