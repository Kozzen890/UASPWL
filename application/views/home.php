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
            <a class="nav-link active text-white" aria-current="page" href="<?= base_url("/") ?>">Home</a>
            <a class="nav-link text-white" href="#">About</a>
            <a class="nav-link text-white" href="cart">Cart</a>
            <a class="nav-link text-white" href="<?= base_url("/login"); ?>">Login</a>
          </div>
        </div>
      </div>
    </nav>
		<div class="hero vh-100 d-flex align-items-center" id="home">
      <div class="container">
        <div class="row">
          <div class="col-10 mx-auto text-center">
            <h1 class="display-4 mb-4 text-white">Welcome to ABC Store</h1>
            <p class="text-white my-3">"Your Trusted Electronic Store Partner"</p>
          </div>
        </div>
      </div>
    </div>
		<section id="section">
      <div class="container">
				<?php if ($this->session->flashdata('msg')) { ?>
					<div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
				<?php } ?>
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <!-- <h6 class="text-primary">WHY CHOOSE US</h6> -->
            <h4 class="text-primary">DAFTAR BARANG</h4>
          </div>
        </div>
        <div class="row g-4 mt-2">
					<?php foreach($data_barang as $br) { ?>
          <div class="col-lg-4 col-sm-6">
							<div class="service card-effect bounceInUp">
								<div class="image">
									<!-- <i class="bx bxs-comment-detail"></i> -->
									<img src="<?= base_url("assets/image/".$br->image); ?>" alt="">
								</div>
								<h5 class="mt-4 mb-2"><?= $br->nama; ?></h5>
								<p><?= $br->deskripsi; ?></p>
								<p><?= $br->harga; ?></p>
								<a type="button" class="btn btn-success" href="<?= base_url("cart/atc?nama=".$br->nama."&harga=".$br->harga."&id=".$br->id) ?>">Pesan</a>
							</div>
          </div>
					<?php } ?>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
