<h2>Create a new user</h2>
<?php echo form_open('users/create') ?>
	<label>Name</label>
	<input type="text" name="name">
	<br>
	<label>Access</label>
	<input type="text" name="access_type">
	<br>
	<button type="submit">Submit</button>
</form>