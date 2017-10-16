
<div class="wrapper">
	<form class="form-signin" method="POST" autocomplete="off">
		<h2 class="form-signin-heading">Please login</h2>
		<div class="errors">
			<?php foreach($errors as $error):?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?= $error; ?>
				</div>
			<?php endforeach;?>
		</div>
		<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" />
		<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	</form>
</div>