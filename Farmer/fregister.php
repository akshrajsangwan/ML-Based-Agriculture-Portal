<?php
include('fregisterScript.php'); 
require_once("../sql.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/logo.png" />
  <title>Farmer Registration - AgriPortal</title>

  <!-- Fonts & CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="../assets/css/creativetim.min.css">
  <link rel="stylesheet" href="../assets/css/custom_frontend.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script>
    function getdistrict(val) {
        $.ajax({
        type: "POST",
        url: "fget_district.php",
        data:'state_id='+val,
        success: function(data){
            $("#district-list").html(data);
        }
        });
    }
  </script> 
</head>

<body class="bg-white">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg navbar-light position-sticky top-0 shadow-sm py-2">
    <div class="container">
      <a href="../index.php" class="navbar-brand mr-lg-5 text-success font-weight-bold">
        <i class="fas fa-chevron-left mr-2"></i> Back to Home
      </a>
    </div>
  </nav>

  <!-- Register Section -->
  <section class="section section-shaped section-lg" style="min-height: 100vh;">
    <!-- Background -->
    <div class="hero-bg" style="background-image: url('../assets/img/bg2.png'); filter: brightness(0.5);"></div>
    
    <div class="container pt-lg-md">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card bg-secondary shadow border-0" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
            <div class="card-header bg-white pb-4 text-center">
              <h3 class="text-warning font-weight-bold mb-0">Join as a Farmer</h3>
              <small class="text-muted">Start your smart farming journey today</small>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              
              <div id="success"><?php echo $error; ?></div>
              
              <form name="insert" action="" method="post">
                <h6 class="heading-small text-muted mb-4">User Information</h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Full Name</label>
                            <input class="form-control" type="text" name="name" required placeholder="Your Name"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Email Address</label>
                            <input class="form-control" type="email" name="email" required placeholder="name@example.com"/>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Mobile Number</label>
                            <input class="form-control" type="number" name="mobile" required pattern="[6789][0-9]{9}" placeholder="10 Digit Number"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Date of Birth</label>
                            <input class="form-control" name="dob" type="date"/>
                        </div>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Location Details</h6>
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">State</label>
                            <select onChange="getdistrict(this.value);" name="state" id="state" class="form-control">
                                <option value="">Select State</option>
                                <?php $query =mysqli_query($conn,"SELECT * FROM state");
                                while($row=mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">District</label>
                            <select name="district" id="district-list" class="form-control">
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">City</label>
                            <input class="form-control" type="text" name="city" required placeholder="City Name"/>
                        </div>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Security</h6>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <div class="input-group">
                                <input name="password" type="password" class="form-control" id="password" required placeholder="********"/>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();" style="cursor: pointer;"><i class="fas fa-eye" id="show_eye"></i></span>
                                </div>
                            </div>
                            <small class="form-text text-muted">Min 8 chars, 1 number, 1 uppercase.</small>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Confirm Password</label>
                            <input name="confirmpassword" type="password" class="form-control" required placeholder="********"/>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button name="farmerregister" class="btn btn-warning my-4 btn-lg px-5 text-white">Create Account</button>
                </div>
                
                <div class="text-center">
                    <a href="flogin.php" class="text-muted"><small>Already have an account? Login here</small></a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require("../footer.php"); ?> <!-- Assuming footer is one level up or modify path as needed -->

  <script>
    $("#success").fadeTo(2000, 500).slideUp(500, function(){ $("#success").slideUp(500); });
    
    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      if (x.type === "password") {
        x.type = "text";
        show_eye.classList.remove("fa-eye");
        show_eye.classList.add("fa-eye-slash");
      } else {
        x.type = "password";
        show_eye.classList.remove("fa-eye-slash");
        show_eye.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>