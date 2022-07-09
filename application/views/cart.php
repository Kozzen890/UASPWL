<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko ABC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg shadow fixed-top" id="navbar" style="background-color:#0f172a">
      <div class="container">
        <a class="navbar-brand text-white" href="<?= base_url("/") ?>">Toko ABC</a>
        <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="navbar-nav ms-auto text-white">
            <a class="nav-link text-white" aria-current="page" href="<?= base_url("/") ?>">Home</a>
            <a class="nav-link text-white" href="#">About</a>
            <a class="nav-link text-white active" href="<?= base_url("cart") ?>">Cart</a>
            <a class="nav-link text-white" href="<?= base_url("/login"); ?>">Login</a>
            <!-- <a class="nav-link text-white" href="<?= base_url("/pages/trending") ?>">Trending</a> -->
          </div>
        </div>
      </div>
    </nav>

		<section id="section">
      <div class="container">
				<?php if ($this->session->flashdata('msg')) { ?>
					<div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
				<?php } ?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Nama Barang</th>
							<th scope="col">Qty</th>
							<th scope="col">Harga</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cart as $c): ?>
						<tr>
							<th><?= $c['nama'] ?></th>
							<th><?= $c['qty'] ?></th>
							<th><?= $c['harga']*$c['qty'] ?></th>
							<td><a style="margin-right: 5px;" href="<?= base_url("cart/atc?nama=".$c['nama']."&harga=".$c['harga']."&id=".$c['id']) ?>" class="btn btn-success">+</a><a style="margin-right: 5px;" href="<?= base_url("cart/atc?action=kurangi&nama=".$c['nama']."&harga=".$c['harga']."&id=".$c['id']) ?>" class="btn btn-danger">-</a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
