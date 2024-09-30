<body class="bg-primary">
	<main class="container">
		<div class="row justify-content-center">
			<div class="col max-w-500-px">
				<div class="card overflow-hidden border-0 shadow-lg p-5 my-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
					</div>
					<form>
						<div class="row my-2">
							<div class="col">
								<input type="text" name="email" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="row my-2">
							<div class="col">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="row my-2">
							<div class="col">
								<button type="submit" class="btn btn-primary w-100">SIGN IN</button>
							</div>
						</div>
					</form>
					<hr>
					<div class="row text-center">
						<div class="col-12 col-sm-6">
							<a class="small" href="forgot-password.html">Forgot Password?</a>
						</div>
						<div class="col-12 col-sm-6">
							<a class="small" href="<?=base_url('auth/signup'); ?>">Signup ???</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
