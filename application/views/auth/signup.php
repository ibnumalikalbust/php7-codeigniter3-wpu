<body class="bg-primary">
	<main class="container">
		<div class="row justify-content-center">
			<div class="col max-w-500-px">
				<div class="card overflow-hidden border-0 shadow-lg p-5 my-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Register Account!</h1>
					</div>
					<form method="post" action="<?= base_url('auth/signup'); ?>" autocomplete="off">
						<div class="row my-2">
							<div class="col-12">
								<input type="text" name="name" class="form-control" placeholder="Full Name" value="<?= set_value('name'); ?>">
								<?= form_error('name', '<span class="fs-12-px text-red">', '</span>'); ?>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-12">
								<input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<span class="fs-12-px text-red">', '</span>'); ?>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-12">
								<input type="password" name="password1" class="form-control" placeholder="Your Password" value="<?= set_value('password1'); ?>">
								<?= form_error('password1', '<span class="fs-12-px text-red">', '</span>'); ?>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-12">
								<input type="password" name="password2" class="form-control" placeholder="Confirm Password" value="<?= set_value('password2'); ?>">
								<?= form_error('password2', '<span class="fs-12-px text-red">', '</span>'); ?>
							</div>
						</div>
						<div class="row my-2">
							<div class="col-12">
								<button type="submit" class="btn btn-primary w-100">SIGN UP</button>
							</div>
						</div>
					</form>
					<hr>
					<div class="row text-center">
						<div class="col-12 col-sm-6">
							<a class="small" href="forgot-password.html">Forgot Password?</a>
						</div>
						<div class="col-12 col-sm-6">
							<a class="small" href="<?=base_url('auth/signin'); ?>">Signin ???</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
