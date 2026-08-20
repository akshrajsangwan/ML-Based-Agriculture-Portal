<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/img/logo.png" />
  <title>Agriculture Portal - Smart Farming</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- Brand Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" xintegrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" xintegrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <!-- AOS Animation Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom & Template CSS -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/creativetim.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/custom_frontend.css"> <!-- Your global theme styles -->

  <style>
    /* --- INTEGRATED CLASSY NAVBAR STYLES (Matching fnav.php) --- */
    :root {
        --nav-bg-start: #0f2027; 
        --nav-bg-mid: #203a43;
        --nav-bg-end: #2c5364;
        --gold-accent: #eebb55; 
        --fresh-green: #4ade80; 
    }

    .navbar-custom {
        /* Added !important to override external white themes */
        background: linear-gradient(135deg, var(--nav-bg-start), var(--nav-bg-mid), var(--nav-bg-end)) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
        padding: 0.8rem 1rem;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        z-index: 1050; 
    }

    /* Brand Container */
    .navbar-brand {
        display: flex;
        align-items: center;
        text-decoration: none;
        gap: 12px;
    }

    /* Icon Box */
    .brand-icon-box {
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .brand-icon-box i {
        font-size: 1.4rem;
        background: linear-gradient(45deg, #4ade80, #22c55e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Typography */
    .brand-text-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        line-height: 1;
    }

    .brand-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        font-weight: 700;
        color: #ffffff !important; /* Force white text */
        letter-spacing: 0.5px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .brand-subtitle {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.65rem;
        font-weight: 600;
        color: var(--gold-accent);
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-top: 3px;
        margin-left: 2px;
    }
    
    .navbar-brand:hover .brand-icon-box {
        border-color: var(--fresh-green);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 222, 128, 0.2);
    }

    /* Link Styles */
    .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.85) !important;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 0.9rem;
        padding: 10px 15px !important;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-item:hover .nav-link {
        background: rgba(255, 255, 255, 0.08);
        color: #fff !important;
        transform: translateY(-1px);
    }

    /* Fix for Account Dropdown styling */
    .dropdown-menu {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        margin-top: 10px;
    }
    .dropdown-item {
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.2s;
    }
    .dropdown-item:hover {
        background-color: #f0fdf4;
        color: var(--fresh-green);
        padding-left: 25px;
    }
  </style>

</head>

<body class="bg-white" id="top" onload="myFunction()">

  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-custom position-sticky top-0 py-0">
    <div class="container">
      <a href="index.php" class="navbar-brand mr-lg-5">
        <div class="brand-icon-box">
            <i class="fas fa-leaf"></i>
        </div>
        <div class="brand-text-wrapper">
            <span class="brand-title">Agriculture</span>
            <span class="brand-subtitle">Portal</span>
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\'rgba(255, 255, 255, 1)\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.php">
                 <span class="text-success font-weight-bold">AgriPortal</span>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global">
                <span></span><span></span>
              </button>
            </div>
          </div>
        </div>

        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item">
            <a href="#services" class="nav-link"><span class="nav-link-inner--text">Services</span></a>
          </li>
          <li class="nav-item">
            <a href="#features" class="nav-link"><span class="nav-link-inner--text">Features</span></a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link"><span class="nav-link-inner--text">Contact</span></a>
          </li>
          
          <!-- FIXED ACCOUNT DROPDOWN -->
          <li class="nav-item ml-lg-3">
             <div class="dropdown">
                <a href="#" class="btn btn-sm btn-primary-custom dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle mr-1"></i> Account
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="farmer/flogin.php">Farmer Login</a>
                  <a class="dropdown-item" href="admin/alogin.php">Admin Login</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="farmer/fregister.php">Farmer Signup</a>
                </div>
             </div>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-bg" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('assets/img/bg1.png');"></div>
    <div class="container">
      <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
        <!-- Main Text Updated -->
        <h1 class="display-3 text-white font-weight-bold">The Future of <br>Smart Farming</h1>
        
        <p class="lead">
          Empowering farmers with AI-driven crop recommendations, real-time weather forecasts, and direct market access. Farming made smarter, not harder.
        </p>
        <div class="hero-cta mt-4">
          <a class="btn btn-primary-custom mr-3" href="#services">Explore Services</a>
          <a class="btn btn-outline-custom" href="farmer/fregister.php">Join Now</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="services">
    <div class="container">
      <div class="row justify-content-center mb-5" data-aos="fade-up">
        <div class="col-md-8 text-center">
          <span class="badge badge-success badge-pill mb-2 text-uppercase">What We Offer</span>
          <h2>Our Core Services</h2>
          <p class="text-muted">Everything you need to manage your farm efficiently.</p>
        </div>
      </div>

      <div class="row">
        <!-- Service 1 -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
          <div class="card card-service">
            <img class="card-img-top" src="assets/img/bg2.png" alt="Crop Prediction" onerror="this.src='https://images.unsplash.com/photo-1530507629858-e49769a7d975?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
            <div class="card-body">
              <h3>Crop Prediction</h3>
              <p>Utilize advanced algorithms to decide the best crop for your soil type and climate conditions.</p>
            </div>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card card-service">
            <img class="card-img-top" src="assets/img/bg3.png" alt="Weather Forecast" onerror="this.src='https://images.unsplash.com/photo-1592210454359-9043f067919b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
            <div class="card-body">
              <h3>Weather Forecast</h3>
              <p>Real-time weather updates to help you plan your sowing and harvesting schedules effectively.</p>
            </div>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="card card-service">
            <img class="card-img-top" src="assets/img/bg4.png" alt="Market Prices" onerror="this.src='https://images.unsplash.com/photo-1488459716781-31db52582fe9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
            <div class="card-body">
              <h3>Market Connect</h3>
              <p>Stay updated with the latest market prices and sell your produce directly to consumers.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section (Alternating) -->
  <section id="features" class="features-section">
    <div class="container">
      
      <!-- Feature Row 1 -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="feature-box">
            <div class="icon-shape-custom">
              <i class="fas fa-seedling"></i>
            </div>
            <h3>For Farmers</h3>
            <p class="lead text-muted">
              Get personalized recommendations for crops and fertilizers. Our AI analyzes your soil data to suggest optimal farming strategies.
            </p>
            <ul class="list-unstyled mt-4">
              <li class="py-2"><i class="fas fa-check-circle text-success mr-2"></i> Soil Health Analysis</li>
              <li class="py-2"><i class="fas fa-check-circle text-success mr-2"></i> Fertilizer Calculator</li>
              <li class="py-2"><i class="fas fa-check-circle text-success mr-2"></i> Direct Selling Platform</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <img class="img-fluid rounded shadow-lg" src="assets/img/agri.png" alt="Farmers" onerror="this.src='https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
        </div>
      </div>

      <!-- Feature Row 2 -->
      <div class="row align-items-center mt-5">
        <div class="col-lg-6 order-lg-2" data-aos="fade-left">
          <div class="feature-box">
            <div class="icon-shape-custom">
              <i class="fas fa-shopping-basket"></i>
            </div>
            <h3>For Customers</h3>
            <p class="lead text-muted">
              Buy fresh produce directly from the source. We bridge the gap between the farm and your table, ensuring quality and fair prices.
            </p>
            <a href="#" class="btn btn-link text-success font-weight-bold pl-0 mt-2">Learn more <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 order-lg-1" data-aos="fade-right">
          <img class="img-fluid rounded shadow-lg" src="assets/img/customers.png" alt="Customers" onerror="this.src='https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';">
        </div>
      </div>

    </div>
  </section>

  <!-- Why Choose Us (Icons) -->
  <section class="section bg-secondary">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-8">
          <h2>Why Choose AgriPortal?</h2>
          <p class="lead text-muted">We combine technology with tradition to bring you the best farming tools.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card border-0 shadow-sm h-100 py-4">
            <div class="card-body text-center">
              <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                <i class="ni ni-settings-gear-65"></i>
              </div>
              <h6 class="text-primary text-uppercase">Reliable</h6>
              <p class="description mt-3">99% accuracy in crop prediction models.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="card border-0 shadow-sm h-100 py-4">
            <div class="card-body text-center">
              <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                <i class="ni ni-html5"></i>
              </div>
              <h6 class="text-success text-uppercase">Fast</h6>
              <p class="description mt-3">Optimized for speed on all devices.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="card border-0 shadow-sm h-100 py-4">
            <div class="card-body text-center">
              <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                <i class="ni ni-world"></i>
              </div>
              <h6 class="text-warning text-uppercase">Real-Time</h6>
              <p class="description mt-3">Live weather data integration.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="card border-0 shadow-sm h-100 py-4">
            <div class="card-body text-center">
              <div class="icon icon-shape icon-shape-info rounded-circle mb-4">
                <i class="ni ni-satisfied"></i>
              </div>
              <h6 class="text-info text-uppercase">News</h6>
              <p class="description mt-3">Latest agricultural news feed.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tech Stack -->
  <section class="tech-stack" id="tech">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
          <h3>Built With Modern Technology</h3>
        </div>
      </div>
      <div class="row">
        <!-- Tech Items -->
        <div class="col-6 col-md-2 mb-3">
          <div class="tech-card">
            <img src="assets/img/html.png" alt="HTML5" onerror="this.style.display='none'">
            <h6 class="text-primary">HTML5</h6>
          </div>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <div class="tech-card">
            <img src="assets/img/css3.png" alt="CSS3" onerror="this.style.display='none'">
            <h6 class="text-primary">CSS3</h6>
          </div>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <div class="tech-card">
            <img src="assets/img/js.png" alt="JS" onerror="this.style.display='none'">
            <h6 class="text-warning">JavaScript</h6>
          </div>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <div class="tech-card">
            <img src="assets/img/bootstrap.png" alt="Bootstrap" onerror="this.style.display='none'">
            <h6 class="text-purple">Bootstrap</h6>
          </div>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <div class="tech-card">
            <img src="assets/img/php2.png" alt="PHP" onerror="this.style.display='none'">
            <h6 class="text-dark">PHP</h6>
          </div>
        </div>
        <div class="col-6 col-md-2 mb-3">
          <div class="tech-card">
            <img src="assets/img/mysql.png" alt="MySQL" onerror="this.style.display='none'">
            <h6 class="text-info">MySQL</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Daily Quote Section -->
  <div class="container pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="chat-widget" data-aos="fade-up">
          <i class="fas fa-quote-left fa-2x text-muted mb-3"></i>
          <div id="quote" class="chat-quote-box">
            Loading daily agriculture quote...
          </div>
          <span id="author" class="chat-author"></span>
        </div>
      </div>
    </div>
  </div>

  <?php require("footer.php"); ?>

  <!-- Core JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <!-- AOS Animation JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script>
    // Initialize Animations
    AOS.init({
      once: true,
      offset: 100,
      duration: 800,
    });

    // OpenAI Quote Script
    const apiKey = "sk-xxxxxxxxxxxxxxxxxxx"; 
    const chatbox = document.getElementById("quote");
    const authorN = document.getElementById("author");

    function myFunction(){
      const msg = "give me a short inspiring quote related to agriculture and farming with author name separated by ' - '";
      // Simulating API call for demo purposes if key is invalid
      if (apiKey === "sk-xxxxxxxxxxxxxxxxxxx") {
         setTimeout(() => {
             chatbox.innerHTML = "The farmer is the only man in our economy who buys everything at retail, sells everything at wholesale, and pays the freight on both ways.";
             authorN.innerHTML = "- John F. Kennedy";
         }, 1000);
         return;
      }

      if (msg) {
          var settings = {
              url: "https://api.openai.com/v1/chat/completions",
              method: "POST",
              timeout: 0,
              headers: {
                  Authorization: "Bearer " + apiKey,
                  "Content-Type": "application/json"
              },
              data: JSON.stringify({
                  model: "gpt-3.5-turbo",
                  messages: [{ "role": "user", "content": msg }]
              })
          };

          $.ajax(settings).done(function(response) {
              const content = response.choices[0].message.content;
              const parts = content.split(" - ");
              chatbox.innerHTML = parts[0];
              if(parts[1]) authorN.innerHTML = "- " + parts[1];
          }).fail(function() {
              chatbox.innerHTML = 'Farming looks mighty easy when your plow is a pencil, and you\'re a thousand miles from the corn field.';
              authorN.innerHTML = "- Dwight D. Eisenhower";
          });
      }
    };
  </script>

</body>
</html>