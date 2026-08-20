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
            <h2 class="display-4 font-weight-bold text-info">Yield Prediction</h2>
            <p class="lead text-muted">Estimate your harvest potential</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-info"><i class="fas fa-chart-line mr-2"></i> Farm Data</h4>
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
                                    <select name="Season" class="form-control" required>
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

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Crop</label>
                                    <select name="crop" class="form-control" required>
                                        <option value="">Select Crop</option>
                                        <option value="Maize">Maize</option>
                                        <option value="Sugarcane">Sugarcane</option>
                                        <option value="Cotton">Cotton</option>
                                        <option value="Tobacco">Tobacco</option>
                                        <option value="Paddy">Paddy</option>
                                        <option value="Barley">Barley</option>
                                        <option value="Wheat">Wheat</option>
                                        <option value="Millets">Millets</option>
                                        <option value="Oil seeds">Oil seeds</option>
                                        <option value="Pulses">Pulses</option>
                                        <option value="Ground Nuts">Ground Nuts</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">Temp (°C)</label>
                                    <input type="number" name="temperature" class="form-control" step="0.01" placeholder="Ex: 26" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">Rainfall (mm)</label>
                                    <input type="number" name="rainfall" class="form-control" step="0.01" placeholder="Ex: 1200" required>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="Yield_Predict" class="btn btn-info btn-lg px-5 shadow">Predict Yield</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(isset($_POST['Yield_Predict'])){ ?>
            <div class="card glass-card border-info">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0 text-white"><i class="fas fa-calculator mr-2"></i> Prediction Result</h4>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-dark">
                    <?php 
                        $state=trim($_POST['stt']);
                        $district=trim($_POST['district']);
                        $season=trim($_POST['Season']);
                        $crop=trim($_POST['crop']);
                        $temp=trim($_POST['temperature']);
                        $rain=trim($_POST['rainfall']);

                        echo "Expected Yield for <span class='text-info'>$crop</span> in <span class='text-info'>$district</span>:";
                        
                        $JsonState=json_encode($state);
                        $JsonDistrict=json_encode($district);
                        $JsonSeason=json_encode($season);
                        $JsonCrop=json_encode($crop);
                        $JsonTemp=json_encode($temp);
                        $JsonRain=json_encode($rain);

                        $command = escapeshellcmd("python ML/yield_prediction/yield_prediction.py $JsonState $JsonDistrict $JsonSeason $JsonCrop $JsonTemp $JsonRain");
                        $output = passthru($command);
                        echo "<div class='mt-3 display-4 text-info font-weight-bold'>$output Quintals/Hectare</div>";
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