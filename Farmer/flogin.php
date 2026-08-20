<?php
include('floginScript.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Farmer Login - Agriculture Portal</title>
  
  <!-- Load shared assets manually since this page doesn't use fheader.php directly in some structures -->
  <link href="[https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap](https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap)" rel="stylesheet">
  <link rel="stylesheet" href="[https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css](https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css)">
  <link rel="stylesheet" href="[https://pro.fontawesome.com/releases/v5.10.0/css/all.css](https://pro.fontawesome.com/releases/v5.10.0/css/all.css)">
  <link rel="stylesheet" href="../assets/css/creativetim.min.css">
  <link rel="stylesheet" href="../assets/css/custom_frontend.css">
</head>

<body class="bg-white">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg navbar-light position-sticky top-0 shadow-sm py-2">
    <div class="container">
      <a href="../index.php" class="navbar-brand text-success font-weight-bold">
        <i class="fas fa-chevron-left mr-2"></i> Back to Home
      </a>
    </div>
  </nav>

  <!-- Login Section -->
  <section class="section section-shaped section-lg" style="min-height: 90vh; display:flex; align-items:center;">
    <!-- Background Image -->
    <div class="hero-bg" style="background-image: url('../assets/img/bg3.png'); filter: brightness(0.6);"></div>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card bg-secondary shadow border-0" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
            <div class="card-header bg-white pb-3">
              <div class="text-center">
                <h4 class="text-warning font-weight-bold mb-0">Farmer Login</h4>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Welcome back! Please login to continue.</small>
              </div>
              
              <form method="post" action="">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email ID" type="text" name="farmer_email" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="farmer_password" id="password" required>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="password_show_hide();" style="cursor: pointer;">
                          <i class="fas fa-eye" id="show_eye"></i>
                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div>
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" name="farmerlogin" class="btn btn-warning my-4 w-100 text-white font-weight-bold shadow">Login</button>
                </div>
                
                <div class="text-center text-danger font-weight-bold">
                    <?php echo $error; ?>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-white"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="fregister.php" class="text-white"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="[https://code.jquery.com/jquery-3.6.0.min.js](https://code.jquery.com/jquery-3.6.0.min.js)"></script>
  <script src="[https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js](https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js)"></script>
  <script>
  function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
  }
  </script>
</body>
</html>