<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TokoABC | Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <!-- Custom styles for this template-->
  </head>
  <body>
    <nav class="navbar navbar-expand-lg shadow fixed-top" id="navbar" style="background-color:#0f172a">
      <div class="container">
        <a class="navbar-brand text-white" href="<?= base_url("/") ?>">Toko ABC</a>
        <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto text-white">
            <a class="nav-link text-white" href="<?= base_url("/") ?>">Home</a>
            <a class="nav-link text-white" href="">About</a>
            <a class="nav-link text-white" href="Cart">Cart</a>
            <a class="nav-link active text-white" href="<?= base_url("/login"); ?>">Login</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="login">
      <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
          <div class="col-lg-6 mx-auto my-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg">
                    <div class="p-5">
                      <div class="text-center">
                        <h4 class="text-dark mb-4">Form Register</h4>
                      </div>
                      <form action="" method="post" class="user">
                        <div class="form-group">
                          <label class="block text-gray-700 text-sm font-bold ml-3" for="login">Username</label>
                          <input type="name" class="form-control form-control-user mt-2" name="name" id="name" aria-describedby="emailHelp" placeholder="Masukkan Username...">
                        </div>
                      	<div class="form-group">
                          <label for="login" class="block text-gray-700 text-sm font-bold ml-3 mt-2">Password</label>
                          <input type="text" class="form-control mt-1" id="password" name="password" placeholder="Masukkan Password...">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block mt-3">Register</button>
                      </form>
                      <hr>
											<a href="<?= base_url("Login") ?>" class="text-primary">Already Have Account ? Login</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script> 
  </body>
</html>
