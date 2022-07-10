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
						<?php 
							if($this->session->userdata('username')){
								echo '<a class="nav-link text-white" href="'.base_url("/Login/logout").'">Logout</a>';
							}else{
								echo '<a class="nav-link text-white" href="'.base_url("/login").'">Login</a>';
							}
						?>
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
						<?php 
							$total = 0;
						?>
						<?php foreach ($cart as $c): ?>
						<tr>
							<th><?= $c['nama'] ?></th>
							<th><?= $c['qty'] ?></th>
							<th><?= "Rp " . number_format($c['harga']*$c['qty'],0,',','.') ?></th>
							<td><a style="margin-right: 5px;" href="<?= base_url("cart/atc?nama=".$c['nama']."&harga=".$c['harga']."&id=".$c['id']) ?>" class="btn btn-success">+</a><a style="margin-right: 5px;" href="<?= base_url("cart/atc?action=kurangi&nama=".$c['nama']."&harga=".$c['harga']."&id=".$c['id']) ?>" class="btn btn-danger">-</a></td>
						</tr>
						<?php 
						$total += $c['harga'] * $c['qty'];
						endforeach; ?>
					</tbody>
				</table>
				<br>
				<br>
				<h3>Total : <?= "Rp " . number_format($total,0,',','.'); ?></h3>
				<br>
				<div class="d-grid gap-2">
					<?php 

					if($this->session->userdata('username')){
						echo '
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutModal">
							Checkout
						</button>
						';
					}else{
						echo '<a class="btn btn-danger btn-block disabled" disabled>Silahkan Login Terlebih Dahulu</a>';
					}

					?>
				</div>
			</div>
		</section>

		<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url("cart/checkout") ?>" method="POST">
								<div class="alert alert-primary" role="alert">
									Silahkan Pilih Metode Pembayaran
								</div>
								<label>Metode Pembayaran</label>
								<select name="metode_pembayaran" id="" class="form-control">
									<option value="TRANSFER">Transfer Bank</option>
									<option value="QRIS">QRIS (GOPAY / OVO)</option>
									<option value="PAYLATER">SHOPEE PAYLATER</option>
								</select>
								<hr>
								<center>
									<h5>Alamat</h5>
								</center>
								<br>
								<label for="">Provinsi</label>
								<select name="" id="province_field" class="form-control">
										<option value="province_id" selected disabled>== PILIH PROVINSI ==</option>
									<?php foreach($province as $p): ?>
										
										<option value="<?= $p['province_id'] ?>"><?= $p['province'] ?></option>
									<?php endforeach; ?>
								</select>
								<br>
								<label for="">Kota</label>
								<select name="city_id" id="city_field" class="form-control">
									<option value="" selected disabled>== PILIH KOTA ==</option>
								</select>
								<br>
								<label>Alamat Lengkap</label>
								<textarea name="alamat" id="" class="form-control"></textarea>
								<br>
								<label for="">Layanan Antar</label>
								<select name="kurir" id="kurir_field" class="form-control">
									<option value="" selected disabled>== PILIH LAYANAN ANTAR ==</option>
								</select>
								<br>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary">Konfirmasi</button>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>
			$('#province_field').on('change', function() {
				$('#city_field').empty().append('<option value="" selected disabled>== PILIH KOTA ==</option>')
				$.get("<?= base_url('cart/city?province_id=') ?>" + this.value,function(d, status){
					let data = JSON.parse(d)
					for(var key in data){
            $("#city_field").append('<option value="'+data[key].city_id+'"+>'+data[key].city_name+'</option>');
          }
        });
			});

			$('#city_field').on('change', function() {
				$.get("<?= base_url('cart/ongkir?city_id=') ?>" + this.value,function(d, status){
					let data = JSON.parse(d)
					console.log(data)
					for(var key in data[0].costs){
						let value = data[0].name + "|" + data[0].costs[key].service + "|" + data[0].costs[key].cost[0].value;

            $("#kurir_field").append('<option value="'+value+'"+>'+data[0].name + " (" + data[0].costs[key].service + ") Rp " + data[0].costs[key].cost[0].value+'</option>');
          }
				});
			});
		</script>
  </body>
</html>
