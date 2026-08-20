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
$para2 = $row4['admin_name'];
?>

<!doctype html>
<html lang="en">
<?php require ('aheader.php'); ?>

<body class="bg-white" id="top">
  <?php require ('anav.php'); ?>
  
  <div class="wrapper" style="margin-top: 30px;">
    <div class="container-fluid">
        
      <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="display-4 font-weight-bold text-warning">Crop Stock</h2>
            <p class="lead text-muted">Overview of available crop quantities</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card admin-card">
                <div class="card-header border-0 d-flex align-items-center bg-transparent">
                    <h4 class="mb-0 text-warning"><i class="fas fa-store-alt mr-2"></i> Produced Crops List</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Crop Name</th>
                                    <th scope="col" class="text-center">Quantity (in KG)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT crop, quantity FROM production_approx where quantity > 0";
                                $query = mysqli_query($conn,$sql);
                                while($res = mysqli_fetch_array($query)){   
                                ?>        
                                <tr>
                                    <td class="text-center font-weight-bold"><?php echo $res['crop']; ?></td>
                                    <td class="text-center">
                                        <span class="badge badge-pill badge-warning" style="font-size:14px;">
                                            <?php echo $res['quantity']; ?> KG
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <?php require("footer.php");?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='fas fa-angle-left'></i>",
                    "next": "<i class='fas fa-angle-right'></i>"
                }
            }
        });
    });
  </script>
</body>
</html>