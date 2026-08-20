<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/img/logo.png" />
  <title>Contact Us - Agriculture Portal</title>

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  
  <!-- Animations -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/nucleo-icons.css">
  <link rel="stylesheet" href="assets/css/nucleo-svg.css">
  <link rel="stylesheet" href="assets/css/creativetim.min.css">
  <link rel="stylesheet" href="assets/css/custom_frontend.css">
</head>

<body class="bg-white">

  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light position-sticky top-0 shadow-sm py-2">
    <div class="container">
      <a href="index.php" class="navbar-brand mr-lg-5">
        <img src="assets/img/nav.png" alt="AgriPortal Logo" style="height: 50px;" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item"><a href="index.php" class="nav-link font-weight-bold">Home</a></li>
          <li class="nav-item"><a href="index.php#services" class="nav-link font-weight-bold">Services</a></li>
          <li class="nav-item active"><a href="contact.php" class="nav-link font-weight-bold text-success">Contact</a></li>
          
          <li class="nav-item dropdown ml-lg-3">
             <a href="#" class="btn btn-sm btn-primary-custom dropdown-toggle" data-toggle="dropdown">Account</a>
             <div class="dropdown-menu">
                <a class="dropdown-item" href="farmer/flogin.php">Farmer Login</a>
                <a class="dropdown-item" href="customer/clogin.php">Customer Login</a>
                <a class="dropdown-item" href="admin/alogin.php">Admin Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="farmer/fregister.php">Sign Up</a>
             </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contact Hero & Form Wrapper -->
  <section class="section section-shaped section-lg" style="min-height: 100vh; padding-top: 80px;">
    <!-- Background Gradient -->
    <div class="hero-bg" style="background-image: linear-gradient(150deg, #184d36 15%, #2e7d32 70%, #81c784 94%); position:absolute; top:0; left:0; width:100%; height:100%; z-index:-1;"></div>
    
    <div class="container pt-lg-md">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <!-- Glassmorphism Card -->
          <div class="card bg-secondary shadow border-0" data-aos="fade-up" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.95);">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="row">
                <!-- Contact Info Side -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                  <h3 class="display-3 text-success font-weight-bold">Get in Touch</h3>
                  <p class="mt-3 text-muted">Let's talk about everything! We are here to help you.</p>
                  
                  <div class="d-flex align-items-center mt-4">
                    <div class="icon-shape-custom shadow-sm" style="width: 40px; height: 40px; font-size: 1rem;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <span class="ml-3 font-weight-600 text-dark">MIET, Baghpat Bypass, India</span>
                  </div>

                  <div class="d-flex align-items-center mt-4">
                    <div class="icon-shape-custom shadow-sm" style="width: 40px; height: 40px; font-size: 1rem;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <span class="ml-3 font-weight-600 text-dark">+91 79062 48476</span>
                  </div>

                  <div class="d-flex align-items-center mt-4">
                    <div class="icon-shape-custom shadow-sm" style="width: 40px; height: 40px; font-size: 1rem;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span class="ml-3 font-weight-600 text-dark">info@agriportal.com</span>
                  </div>
                </div>

                <!-- Contact Form Side -->
                <div class="col-lg-7">
                  <form role="form" method="POST" action="contact-script.php"> 
                    <div class="form-group mb-3">
                      <label class="font-weight-bold text-uppercase small text-muted">Full Name</label>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                        </div>
                        <input class="form-control" placeholder="Enter your Full Name" type="text" id="user_name" name="user_name" required>
                      </div>
                    </div>

                    <div class="form-group mb-3">
                      <label class="font-weight-bold text-uppercase small text-muted">Mobile Number</label>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                        </div>
                        <input class="form-control" placeholder="Enter your Mobile Number" type="tel" id="user_mobile" name="user_mobile" pattern="^[6-9]{1}[0-9]{9}$" title="Enter Valid 10 digit Mobile Number" required>
                      </div>
                    </div>

                    <div class="form-group mb-3">
                      <label class="font-weight-bold text-uppercase small text-muted">Email ID</label>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Enter your Email Id" type="email" id="user_email" name="user_email" required>
                      </div>
                    </div>

                    <div class="form-group mb-3">
                      <label class="font-weight-bold text-uppercase small text-muted">Address</label>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Enter your City/Pincode" type="text" id="user_address" name="user_address">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="font-weight-bold text-uppercase small text-muted">Message</label>
                      <textarea class="form-control form-control-alternative" id="user_message" name="user_message" rows="4" placeholder="Enter your Issue" required></textarea>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="submit" value="Submit" class="btn btn-primary-custom mt-4 w-100 shadow">
                        Send Message <i class="fas fa-paper-plane ml-2"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODALS (Required for your contact-script.php) -->
    
    <!-- Success Modal -->
    <div class="modal fade" id="mysuccessModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title text-white"><i class="fas fa-check-circle mr-2"></i> Success</h5>
                    <button type="button" class="close text-white" onclick="pagesuccessRedirect()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center py-4">
                    <h3 class="text-success">Thank you!</h3>
                    <p class="mb-0">Your message has been sent successfully. We will contact you shortly.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" onclick="pagesuccessRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Unsuccess Modal -->
    <div class="modal fade" id="myunsuccessModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white"><i class="fas fa-exclamation-triangle mr-2"></i> Error</h5>
                    <button type="button" class="close text-white" onclick="pageunsuccessRedirect()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center py-4">
                    <h3 class="text-danger">Oops!</h3>
                    <p class="mb-0">Something went wrong sending your message. Please try again.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" onclick="pageunsuccessRedirect()">Close</button>
                </div>
            </div>
        </div>
    </div>

  </section>

  <?php require("footer.php"); ?>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init();
      
      // Functions required by your script
      function pagesuccessRedirect() {
          location.replace('index.php');
      }
      function pageunsuccessRedirect() {
          location.replace('contact.php');
      }
  </script>
</body>
</html>