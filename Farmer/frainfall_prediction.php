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
            <h2 class="display-4 font-weight-bold text-info">Rainfall Prediction</h2>
            <p class="lead text-muted">Predict rainfall to plan your irrigation</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-info"><i class="fas fa-cloud-rain mr-2"></i> Select Region & Month</h4>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="post">
                        <div class="form-group">
                            <label class="font-weight-bold">Region</label>
                            <select id="region-select" name="region" class="form-control" required>
                                <option value="">Select Region</option>
                            </select>
                            <script language="javascript"> print_region("region-select"); </script>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Month</label>
                            <select id="month-select" name="month" class="form-control" required>
                                <option value="">Select Month</option>
                            </select>
                            <script language="javascript"> print_months("month-select"); </script>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="Rainfall_Predict" class="btn btn-info btn-lg px-5 shadow">Predict</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(isset($_POST['Rainfall_Predict'])){ ?>
            <div class="card glass-card border-info">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0 text-white"><i class="fas fa-chart-bar mr-2"></i> Prediction Result</h4>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-dark">
                    <?php 
                        $region=trim($_POST['region']);
                        $month=trim($_POST['month']);

                        echo "Predicted Rainfall for <span class='text-info'>$region</span> in <span class='text-info'>$month</span> is:";
                        
                        $Jregion=json_encode($region);
                        $Jmonth=json_encode($month);

                        $command = escapeshellcmd("python ML/rainfall_prediction/rainfall_prediction.py $Jregion $Jmonth ");
                        $output = passthru($command);
                        echo "<div class='mt-3 display-4 text-info font-weight-bold'>$output mm</div>";
                    ?>
                    </h4>
                </div>
            </div>
            <?php } ?>

        </div>
      </div>
    </div>
  </div>

  <?php require("footer.php");?>
</body>
</html>