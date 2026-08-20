<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
    header("location: ../index.php");
}
$query4 = "SELECT * from farmerlogin where email='$user_check'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);
$para1 = $row4['farmer_id'];
$para2 = $row4['farmer_name'];

$sql = "SELECT farmer_crop, farmer_quantity, farmer_price, `date` FROM farmer_history WHERE farmer_id='".$para1."' ";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include ('fheader.php'); ?>

<body class="bg-white" id="top">
  <?php include ('fnav.php'); ?>

  <div class="wrapper" style="margin-top: 30px;">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="display-4 font-weight-bold text-warning">Trade History</h2>
            <p class="lead text-muted">Your selling records</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-warning"><i class="fas fa-history mr-2"></i> Past Transactions</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Crop</th>
                                    <th scope="col" class="text-center">Quantity (KG)</th>
                                    <th scope="col" class="text-center">Total Price (₹)</th>
                                    <th scope="col" class="text-center">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                while($row = $result->fetch_assoc()) {
                                    $cropname=ucfirst($row["farmer_crop"]);
                                    $cropquantity=$row["farmer_quantity"];
                                    $cropprice=$row["farmer_price"];
                                    $currentdate=$row['date'];
                                ?>
                                <tr class="text-center">
                                    <td class="font-weight-bold text-dark"><?php echo $cropname; ?></td>
                                    <td><?php echo $cropquantity; ?></td>
                                    <td class="text-success font-weight-bold">₹<?php echo $cropprice; ?></td>
                                    <td class="text-muted"><small><?php echo $currentdate; ?></small></td>
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