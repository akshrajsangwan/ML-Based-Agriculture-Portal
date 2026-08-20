<!-- Footer -->
<footer class="footer-custom text-white pt-5 pb-4">
  <style>
    .footer-custom {
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: rgba(255,255,255,0.8);
      font-family: 'Inter', sans-serif;
      position: relative;
      z-index: 1;
      overflow: hidden;
    }
    
    /* Decorative top border */
    .footer-custom::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 4px;
      background: linear-gradient(90deg, #4ade80, #22c55e, #166534);
    }

    .footer-brand-text {
      font-family: 'Cinzel Decorative', cursive;
      font-size: 1.8rem;
      color: #fff;
      font-weight: 700;
    }

    .footer-links a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-block;
      margin-bottom: 10px;
    }

    .footer-links a:hover {
      color: #4ade80;
      transform: translateX(5px);
    }

    .social-btn {
      width: 40px; height: 40px;
      border-radius: 50%;
      background: rgba(255,255,255,0.1);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      transition: all 0.3s ease;
      margin-right: 10px;
      border: 1px solid rgba(255,255,255,0.1);
    }

    .social-btn:hover {
      background: #4ade80;
      color: #0f2027;
      transform: translateY(-3px);
    }
  </style>

  <div class="container text-center text-md-left">
    <div class="row text-center text-md-left">

      <!-- Column 1: Brand & About -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold footer-brand-text">
          <i class="fas fa-leaf text-success mr-2"></i> AgriPortal
        </h5>
        <p>
          Empowering farmers with AI-driven technology. We bridge the gap between tradition and innovation to ensure a sustainable future for agriculture.
        </p>
      </div>

      <!-- Column 2: Products -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 footer-links">
        <h5 class="text-uppercase mb-4 font-weight-bold text-success">Products</h5>
        <p><a href="#">Crop Prediction</a></p>
        <p><a href="#">Soil Analysis</a></p>
        <p><a href="#">Market Place</a></p>
        <p><a href="#">Weather Forecast</a></p>
      </div>

      <!-- Column 3: Useful Links -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 footer-links">
        <h5 class="text-uppercase mb-4 font-weight-bold text-success">Useful links</h5>
        <p><a href="#!">Your Account</a></p>
        <p><a href="#!">Become an Affiliate</a></p>
        <p><a href="#!">Shipping Rates</a></p>
        <p><a href="#!">Help & Support</a></p>
      </div>

      <!-- Column 4: Contact -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-success">Contact</h5>
        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
        <p><i class="fas fa-envelope mr-3"></i> info@agriportal.com</p>
        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
      </div>

    </div>

    <hr class="mb-4" style="background-color: rgba(255,255,255,0.1);">

    <div class="row align-items-center">
      <!-- Copyright -->
      <div class="col-md-7 col-lg-8">
        <p class="text-center text-md-left">© 2023 Copyright:
          <a href="#" style="text-decoration: none;">
            <strong class="text-success"> Agriculture Portal Team</strong>
          </a>
        </p>
      </div>

      <!-- Social Media -->
      <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="social-btn"><i class="fab fa-google-plus-g"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>