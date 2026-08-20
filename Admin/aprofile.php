<?php
session_start();
require('../sql.php'); 

$user = $_SESSION['admin_login_user'];
if(!isset($_SESSION['admin_login_user'])){
    header("location: ../index.php");
} 

$query4 = "SELECT * from admin where admin_name ='$user'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);
$para1 = $row4['admin_id'];
$para2 = $row4['admin_name'];
?>

<!doctype html>
<html lang="en">
<?php require ('aheader.php'); ?>

<body class="bg-white" id="top">
  <?php require ('anav.php'); ?>
  
  <!-- Header -->
  <div class="wrapper" style="margin-top: 50px;">
    <div class="container">
        
      <div class="row mb-5">
        <div class="col-md-12 text-center">
            <h2 class="display-4 font-weight-bold text-primary">Admin Dashboard</h2>
        </div>
      </div>

      <div class="row">
        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card admin-card h-100 text-center p-4">
                <div class="card-body">
                    <div class="mb-4">
                        <img src="../assets/img/admin.png" alt="admin" class="rounded-circle shadow-lg" width="150" style="border: 4px solid #fff;">
                    </div>
                    <h3 class="text-success font-weight-bold mb-1">Welcome, <?php echo $para2 ?></h3>
                    <p class="text-muted mb-4">Administrator</p>
                    
                    <div class="d-flex justify-content-center">
                        <div class="p-3 border rounded mr-2">
                            <small class="d-block text-muted">Admin ID</small>
                            <span class="h5 font-weight-bold"><?php echo $para1 ?></span>
                        </div>
                        <div class="p-3 border rounded">
                            <small class="d-block text-muted">Status</small>
                            <span class="h5 font-weight-bold text-success">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Privileges Card -->
        <div class="col-md-8 mb-4">
            <div class="card admin-card h-100">
                <div class="card-header bg-transparent border-0">
                    <h4 class="text-primary"><i class="fas fa-shield-alt mr-2"></i> System Privileges</h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-transparent border-0 pl-0">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow mr-3">
                                    <i class="fas fa-database"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Full Data Access</h6>
                                    <small class="text-muted">Access to all data within the Agriculture Portal.</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item bg-transparent border-0 pl-0">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow mr-3">
                                    <i class="fas fa-users-cog"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Customer Management</h6>
                                    <small class="text-muted">View and modify customer details and accounts.</small>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item bg-transparent border-0 pl-0">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow mr-3">
                                    <i class="fas fa-tractor"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Farmer Management</h6>
                                    <small class="text-muted">Manage farmer details and supply chains.</small>
                                </div>
                            </div>
                        </div>

                        <div class="list-group-item bg-transparent border-0 pl-0">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow mr-3">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Sales Reports</h6>
                                    <small class="text-muted">Access and sort sales reports and analytics.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <?php require("footer.php");?>
</body>
</html>