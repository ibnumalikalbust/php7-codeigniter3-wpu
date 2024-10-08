<div class="container-fluid">
	<div class="card mb-3 max-w-500-px">
		<div class="row g-0">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><?= $user['name']; ?></h5>
					<p class="card-text">Email : <?= $user['email']; ?></p>
					<p class="card-text">Member Since : <?= date('d M Y', $user['created_at']) ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>