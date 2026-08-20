<!-- Modern AgriTech Navbar (Fixed Structure) -->
<style>
/* --- Custom Navbar Styling --- */
:root {
    /* Deep modern gradient for Agriculture/Tech feel */
    --nav-bg-start: #0f2027; 
    --nav-bg-mid: #203a43;
    --nav-bg-end: #2c5364;
    --accent-color: #4ade80; /* Bright green accent */
    --text-color: #ffffff;
}

.navbar-custom {
    background: linear-gradient(135deg, var(--nav-bg-start), var(--nav-bg-mid), var(--nav-bg-end));
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
    padding: 0.5rem 1rem;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    z-index: 1050; /* Ensure it stays on top */
}

.navbar-brand img {
    height: 45px;
    transition: transform 0.3s ease;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
}

.navbar-brand:hover img {
    transform: scale(1.05);
}

/* Main Links Styling */
.navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 500;
    letter-spacing: 0.5px;
    padding: 10px 15px !important;
    border-radius: 8px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0 2px;
    cursor: pointer;
}

/* Hover Effects */
.navbar-nav .nav-item:hover .nav-link {
    background: rgba(255, 255, 255, 0.1);
    color: var(--accent-color) !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.navbar-nav .nav-item:hover .nav-link i {
    transform: rotate(10deg) scale(1.1);
    color: var(--accent-color) !important;
}

/* Active State (Current Page) */
.nav-link.active-parent, 
.nav-link.activaa {
    background: rgba(74, 222, 128, 0.15);
    color: var(--accent-color) !important;
    border-bottom: 2px solid var(--accent-color);
}

/* Dropdown Menus */
.dropdown-menu {
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    background: #ffffff;
    padding: 8px;
    margin-top: 15px;
    animation: slideIn 0.3s ease forwards;
    overflow: hidden;
}

.dropdown-item {
    border-radius: 6px;
    padding: 10px 15px;
    font-weight: 500;
    color: #444;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 10px;
}

.dropdown-item i {
    width: 20px;
    text-align: center;
    color: #2c5364;
    transition: color 0.2s ease;
}

.dropdown-item:hover {
    background-color: #f0fdf4; /* Very light green */
    color: #166534; /* Dark green */
    padding-left: 20px; /* Slide right effect */
    text-decoration: none;
}

.dropdown-item:hover i {
    color: #166534;
}

/* Mobile Toggler */
.navbar-toggler {
    border: 2px solid rgba(255,255,255,0.5);
    padding: 5px;
}

/* Profile & Logout Specifics */
#profile .nav-link { border: 1px solid rgba(255,255,255,0.2); }
#profile:hover .nav-link { background: rgba(255,255,255,0.2); border-color: var(--accent-color); }

/* Animations */
@keyframes slideIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Fix for dropdown positioning context */
.dropdown {
    position: relative;
}
</style>

<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-custom position-sticky top-0 py-0">
    <div class="container-fluid">
        <!-- Brand -->
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
                <a href="../index.php" class="navbar-brand mr-lg-5 text-white">
                    <img src="../assets/img/nav.png" alt="Logo" />
                </a>
            </li>
        </ul>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
            aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white" style="background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\'rgba(255, 255, 255, 1)\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar_global">
            <!-- Mobile Header (Collapse Brand) -->
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-10 collapse-brand">
                        <a href="../index.html">
                            <img src="../assets/img/nav.png" />
                        </a>
                    </div>
                    <div class="col-2 collapse-close bg-danger">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global"
                            aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">
                
                <!-- Prediction -->
                <li class="nav-item" id="prediction">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="predictionMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-magic text-warning"></i> 
                            <span class="nav-link-inner--text">Prediction</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="predictionMenuLink">
                            <a class="dropdown-item" href="fcrop_prediction.php"><i class="fas fa-seedling"></i> Crop Prediction</a>
                            <a class="dropdown-item" href="fyield_prediction.php"><i class="fas fa-chart-line"></i> Yield Prediction</a>
                            <a class="dropdown-item" href="frainfall_prediction.php"><i class="fas fa-cloud-rain"></i> Rainfall Prediction</a>
                        </div>
                    </div>
                </li>

                <!-- Recommendation -->
                <li class="nav-item" id="recommendation">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="recommendationMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-gavel text-info"></i>
                            <span class="nav-link-inner--text">Recommendation</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="recommendationMenuLink">
                            <a class="dropdown-item" href="fcrop_recommendation.php"><i class="fas fa-thumbs-up"></i> Crop Recommendation</a>
                            <a class="dropdown-item" href="ffertilizer_recommendation.php"><i class="fas fa-flask"></i> Fertilizer Recommendation</a>
                        </div>
                    </div>
                </li>

                <!-- Trade -->
                <li class="nav-item" id="trade">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="tradeMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart text-success"></i>
                            <span class="nav-link-inner--text">Trade</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="tradeMenuLink">
                            <a class="dropdown-item" href="ftradecrops.php"><i class="fas fa-exchange-alt"></i> Trade Crops</a>
                            <a class="dropdown-item" href="fstock_crop.php"><i class="fas fa-cubes"></i> Crop Stocks</a>
                            <a class="dropdown-item" href="fselling_history.php"><i class="fas fa-history"></i> Selling History</a>
                        </div>
                    </div>
                </li>

                <!-- Tools -->
                <li class="nav-item" id="tools">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="toolsMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tools text-light"></i>
                            <span class="nav-link-inner--text">Tools</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="toolsMenuLink">
                            <a class="dropdown-item" href="fchatgpt.php"><i class="fad fa-robot text-primary"></i> Chat Bot</a>
                            <a class="dropdown-item" href="fweather_prediction.php"><i class="fas fa-cloud-sun text-warning"></i> Weather Forecast</a>
                            <a class="dropdown-item" href="fnewsfeed.php"><i class="fas fa-newspaper text-info"></i> News Feed</a>
                        </div>
                    </div>
                </li>

                <!-- Profile -->
                <li class="nav-item" id="profile">
                    <a href="fprofile.php" class="nav-link">
                        <i class="fas fa-user-circle"></i>
                        <span class="nav-link-inner--text font-weight-bold"></span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="flogout.php" class="nav-link">
                        <i class="fas fa-power-off text-danger"></i>
                        <span class="nav-link-inner--text font-weight-bold text-danger">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Smart Active Link Highlighter -->
<script>
    // This script waits for DOM to load, then highlights the current page's link
    // AND lights up the parent dropdown menu so the user knows where they are.
    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.href;
        
        // Find all links in the navbar
        var navLinks = document.querySelectorAll('#nav a');
        
        navLinks.forEach(function(link) {
            if (link.href === currentUrl) {
                // Add active class to the direct link
                link.classList.add('activaa');
                link.style.color = "#166534"; // Dark green for active dropdown item
                link.style.backgroundColor = "#f0fdf4"; // Light background for active item

                // If this link is inside a dropdown, highlight the parent dropdown toggle
                // We look for the closest .nav-item, then find the .dropdown-toggle inside it
                var parentItem = link.closest('.nav-item');
                if (parentItem) {
                    var toggle = parentItem.querySelector('.dropdown-toggle');
                    if (toggle) {
                        toggle.classList.add('active-parent');
                    }
                }
            }
        });
    });
</script>