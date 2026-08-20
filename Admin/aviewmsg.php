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
            <h2 class="display-4 font-weight-bold text-info">User Queries</h2>
            <p class="lead text-muted">Messages from the Contact Us form</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card admin-card">
                <div class="card-header border-0 d-flex align-items-center bg-transparent">
                    <h4 class="mb-0 text-info"><i class="fas fa-envelope-open-text mr-2"></i> Inbox</h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Message</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php 
                                $q = "select * from contactus";
                                $query = mysqli_query($conn,$q);
                                while($res = mysqli_fetch_array($query)){   
                                ?>        
                                <tr>
                                    <td><b><?php echo $res['c_id']; ?></b></td>
                                    <td><?php echo $res['c_name']; ?></td>
                                    <td><?php echo $res['c_mobile']; ?></td>
                                    <td><a href="mailto:<?php echo $res['c_email']; ?>"><?php echo $res['c_email']; ?></a></td>
                                    <td><?php echo $res['c_address']; ?></td>
                                    <td style="max-width: 300px; white-space: normal;"><?php echo $res['c_message']; ?></td>
                                    <td class="text-center">
                                        <a href="amsgdelete.php?id=<?php echo $res['c_id']; ?>" class="btn btn-sm btn-danger btn-icon-only rounded-circle" onclick="return confirm('Delete this message?');" title="Delete Message">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
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