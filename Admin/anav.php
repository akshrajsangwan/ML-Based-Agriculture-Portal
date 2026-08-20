<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light position-sticky top-0 shadow-sm py-2">
  <div class="container-fluid">
    <a href="../index.php" class="navbar-brand mr-lg-5">
       <img src="../assets/img/nav.png" style="height: 40px;" />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbar_global">
      <div class="navbar-collapse-header">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="../index.php"><img src="../assets/img/nav.png" /></a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global">
              <span></span><span></span>
            </button>
          </div>
        </div>
      </div>

      <ul class="navbar-nav align-items-lg-center ml-auto topnav">
        <li class="nav-item">
          <a href="afarmers.php" class="nav-link">
            <span class="nav-link-inner--text font-weight-bold"><i class="fas fa-users mr-1"></i> Farmers</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="acustomers.php" class="nav-link">
            <span class="nav-link-inner--text font-weight-bold"><i class="fas fa-user-friends mr-1"></i> Customers</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a href="aproducedcrop.php" class="nav-link">
            <span class="nav-link-inner--text font-weight-bold"><i class="fas fa-store-alt mr-1"></i> Crop Stock</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="aviewmsg.php" class="nav-link">
            <span class="nav-link-inner--text font-weight-bold"><i class="fas fa-envelope mr-1"></i> Queries</span>
          </a>
        </li>
        
        <li class="nav-item dropdown">
           <a href="aprofile.php" class="btn btn-sm btn-primary-custom text-white font-weight-bold ml-3">
             <i class="fas fa-user-shield mr-1"></i> <?php echo isset($para2) ? $para2 : 'Admin'; ?>
           </a>
        </li>
        
        <li class="nav-item">
          <a href="alogout.php" class="btn btn-sm btn-danger ml-2">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
.topnav .nav-link {
    color: var(--primary-green) !important;
    transition: all 0.3s;
}
.topnav .nav-link:hover {
    color: var(--accent-green) !important;
    transform: translateY(-2px);
}
</style>