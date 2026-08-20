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
            <h2 class="display-4 font-weight-bold text-success">Customer Management</h2>
            <p class="lead text-muted">View and manage registered customers</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card admin-card">
                <div class="card-header border-0 d-flex align-items-center bg-transparent">
                    <h4 class="mb-0 text-success"><i class="fas fa-users mr-2"></i> Registered Customers List</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">State</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Pincode</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php 
                                $sql = "SELECT cust_name, cust_id, email, phone_no, state, city, address, pincode FROM custlogin";
                                $query = mysqli_query($conn,$sql);
                                while($res = mysqli_fetch_array($query)){   
                                ?>        
                                <tr>
                                    <td><b><?php echo $res['cust_id']; ?></b></td>
                                    <td><?php echo $res['cust_name']; ?></td>
                                    <td><?php echo $res['email']; ?></td>
                                    <td><?php echo $res['phone_no']; ?></td>
                                    <td><?php echo $res['state']; ?></td>
                                    <td><?php echo $res['city']; ?></td>
                                    <td><?php echo $res['address']; ?></td>
                                    <td><?php echo $res['pincode']; ?></td>
                                    <td>
                                        <a href="acdelete.php?id=<?php echo $res['cust_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this customer?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
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