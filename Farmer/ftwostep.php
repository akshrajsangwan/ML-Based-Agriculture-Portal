<?php
session_start();
require('../sql.php'); 
$user = $_SESSION['farmer_login_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Security Verification - AgriPortal</title>
  
  <!-- Fonts & Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="../assets/css/creativetim.min.css">
  <link rel="stylesheet" href="../assets/css/custom_frontend.css">
</head>

<body class="bg-white" onload="send_otp();">
  <!-- Simple Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm py-2 bg-white">
    <div class="container">
      <a href="../index.php" class="navbar-brand font-weight-bold text-success">
        <i class="fas fa-leaf mr-2"></i> AgriPortal
      </a>
    </div>
  </nav>

  <!-- OTP Section -->
  <section class="section section-shaped section-lg" style="min-height: 85vh; display: flex; align-items: center;">
    <div class="hero-bg" style="background-image: url('../assets/img/bg3.png'); filter: brightness(0.6);"></div>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card bg-secondary shadow border-0" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
            <div class="card-header bg-white pb-3 text-center border-0">
              <div class="icon icon-shape bg-gradient-warning text-white rounded-circle mb-3 shadow">
                  <i class="fas fa-shield-alt"></i>
              </div>
              <h4 class="text-warning font-weight-bold mb-0">Two-Factor Authentication</h4>
            </div>
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>We have sent a verification code to your email.</small>
              </div>
              
              <form>
                <div class="alert alert-success fade show text-center shadow-sm" style="display: none;" id="popup" role="alert">
                    <i class="fas fa-check-circle mr-1"></i> OTP Sent Successfully
                </div>
                
                <div class="alert alert-danger fade show text-center shadow-sm" style="display: none;" id="invalid" role="alert">
                    <i class="fas fa-times-circle mr-1"></i> Invalid OTP
                </div>
         
                <div class="form-group mb-4">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" id="otp" class="form-control form-control-lg" required placeholder="Enter 5-digit Code" name="farmer_otp" style="letter-spacing: 5px; text-align: center; font-weight: bold;">               
                    </div>
                </div>
                
                <div class="text-center">
                  <button type="button" class="btn btn-warning my-2 px-5 shadow" onclick="submit_otp()">Verify & Login</button>
                </div>
                
                <div class="text-center mt-3">
                    <button class="btn btn-sm btn-link text-muted" type="button" onclick="send_otp()">Resend Code</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require("footer.php");?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
     function send_otp () {
          $.ajax({
            url:"fsend_otp.php",
            type: "POST",
            success:function(result){
                 $("#popup").slideDown(); 
                 setTimeout(function(){ $("#popup").slideUp(); }, 3000);
           }
         });
     }

    function submit_otp(){
        var otp=jQuery('#otp').val();
        jQuery.ajax({
            url:'fcheck_otp.php',
            type:'post',
            data:'otp='+otp,
            success:function(result){
                if(result=='yes'){
                    window.location='fprofile.php';
                }
                if(result=='not_exist'){
                    $("#invalid").slideDown();
                    setTimeout(function(){ $("#invalid").slideUp(); }, 3000);
                }
            }
        });
    }
  </script>
</body>
</html>