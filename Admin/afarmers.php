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
$para3 = $row4['admin_password'];
?>

<!doctype html>
<html lang="en">
<?php require ('aheader.php'); ?>

<body class="bg-white" id="top">
  <?php require ('anav.php'); ?>
  
  <!-- Header Background -->
  <div class="wrapper" style="margin-top: 30px;">
    <div class="container-fluid">
        
      <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="display-4 font-weight-bold text-success">Farmer Management</h2>
            <p class="lead text-muted">View and manage registered farmers</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card admin-card">
                <div class="card-header border-0 d-flex align-items-center bg-transparent">
                    <h4 class="mb-0 text-success"><i class="fas fa-list mr-2"></i> Registered Farmers List</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">ID</th>
                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">State</th>
                                    <th scope="col">District</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php 
                                $sql = "SELECT farmer_name, farmer_id, F_gender, email, phone_no, F_birthday, F_State, F_District, F_Location FROM farmerlogin";
                                $query = mysqli_query($conn,$sql);
                                while($res = mysqli_fetch_array($query)){   
                                ?>        
                                <tr>
                                    <td><b><?php echo $res['farmer_id']; ?></b></td>
                                    <td><?php echo $res['farmer_name']; ?></td>
                                    <td><?php echo $res['F_gender']; ?></td>
                                    <td><?php echo $res['email']; ?></td>
                                    <td><?php echo $res['phone_no']; ?></td>
                                    <td><?php echo $res['F_birthday']; ?></td>
                                    <td><?php echo $res['F_State']; ?></td>
                                    <td><?php echo $res['F_District']; ?></td>
                                    <td><?php echo $res['F_Location']; ?></td>
                                    <td>
                                        <a href="afdelete.php?id=<?php echo $res['farmer_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this farmer?');">
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

  <script src="[https://code.jquery.com/jquery-3.6.0.min.js](https://code.jquery.com/jquery-3.6.0.min.js)"></script>
  <script src="[https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js](https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js)"></script>
  <script type="text/javascript" charset="utf8" src="[https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js](https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js)"></script>
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