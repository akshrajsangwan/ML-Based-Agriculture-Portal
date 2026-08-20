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
            <h2 class="display-4 font-weight-bold text-success">Smart Crop Prediction</h2>
            <p class="lead text-muted">Find the most suitable crop for your land</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
            
            <!-- Input Card -->
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-success"><i class="fas fa-leaf mr-2"></i> Enter Details</h4>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">State</label>
                                    <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt" class="form-control" required></select>
                                    <script language="javascript">print_state("sts");</script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">District</label>
                                    <select id="state" name="district" class="form-control" required>
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Season</label>
                                    <select name="Season" class="form-control">
                                        <option value="">Select Season...</option>
                                        <option value="Kharif">Kharif</option>
                                        <option value="Whole Year">Whole Year</option>
                                        <option value="Autumn">Autumn</option>
                                        <option value="Rabi">Rabi</option>
                                        <option value="Summer">Summer</option>
                                        <option value="Winter">Winter</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" name="Crop_Predict" class="btn btn-success btn-lg px-5 shadow">Predict Crop</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Result Card -->
            <?php if(isset($_POST['Crop_Predict'])){ ?>
            <div class="card glass-card border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0 text-white"><i class="fas fa-poll mr-2"></i> Prediction Result</h4>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-success font-weight-bold">
                    <?php 
                        $state=trim($_POST['stt']);
                        $district=trim($_POST['district']);
                        $season=trim($_POST['Season']);

                        echo "Suitable crops for <span class='text-dark'>$district</span> in <span class='text-dark'>$season</span> season:";
                        echo "<br><br>";

                        $JsonState=json_encode($state);
                        $JsonDistrict=json_encode($district);
                        $JsonSeason=json_encode($season);
                        
                        $command = escapeshellcmd("python ML/crop_prediction/ZDecision_Tree_Model_Call.py $JsonState $JsonDistrict $JsonSeason");
                        $output = passthru($command);
                        echo $output;                   
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