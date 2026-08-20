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
            <h2 class="display-4 font-weight-bold text-warning">Fertilizer Advisor</h2>
            <p class="lead text-muted">Get optimal fertilizer suggestions</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-warning"><i class="fas fa-seedling mr-2"></i> Soil & Crop Data</h4>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nitrogen (N)</label>
                                <input type='number' name='n' placeholder="Ex: 37" required class="form-control mb-3">
                            </div>
                            <div class="col-md-4">
                                <label>Phosphorous (P)</label>
                                <input type='number' name='p' placeholder="Ex: 0" required class="form-control mb-3">
                            </div>
                            <div class="col-md-4">
                                <label>Potassium (K)</label>
                                <input type='number' name='k' placeholder="Ex: 0" required class="form-control mb-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Temperature</label>
                                <input type='number' name='t' placeholder="Ex: 26" required class="form-control mb-3">
                            </div>
                            <div class="col-md-4">
                                <label>Humidity</label>
                                <input type='number' name='h' placeholder="Ex: 52" required class="form-control mb-3">
                            </div>
                            <div class="col-md-4">
                                <label>Soil Moisture</label>
                                <input type='number' name='soilMoisture' placeholder="Ex: 38" required class="form-control mb-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Soil Type</label>
                                <select name="soil" class="form-control mb-3">
                                    <option value="">Select Soil Type</option>
                                    <option value="Sandy">Sandy</option>
                                    <option value="Loamy">Loamy</option>
                                    <option value="Black">Black</option>
                                    <option value="Red">Red</option>
                                    <option value="Clayey">Clayey</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Target Crop</label>
                                <select name="crop" class="form-control mb-3">
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

                        <div class="text-center mt-4">
                            <button type="submit" name="Fert_Recommend" class="btn btn-warning btn-lg px-5 shadow text-white">Get Recommendation</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(isset($_POST['Fert_Recommend'])){ ?>
            <div class="card glass-card border-warning">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0 text-white"><i class="fas fa-flask mr-2"></i> Result</h4>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-dark font-weight-bold">
                    <?php 
                        $n=trim($_POST['n']); $p=trim($_POST['p']); $k=trim($_POST['k']);
                        $t=trim($_POST['t']); $h=trim($_POST['h']); $sm=trim($_POST['soilMoisture']);
                        $soil=trim($_POST['soil']); $crop=trim($_POST['crop']);

                        echo "Recommended Fertilizer: ";
                        
                        $Jsonn=json_encode($n); $Jsonp=json_encode($p); $Jsonk=json_encode($k);
                        $Jsont=json_encode($t); $Jsonh=json_encode($h); $Jsonsm=json_encode($sm);
                        $Jsonsoil=json_encode($soil); $Jsoncrop=json_encode($crop);

                        $command = escapeshellcmd("python ML/fertilizer_recommendation/fertilizer_recommendation.py $Jsonn $Jsonp $Jsonk $Jsont $Jsonh $Jsonsm $Jsonsoil $Jsoncrop ");
                        $output = passthru($command);
                        echo "<span class='text-warning text-uppercase display-4 d-block mt-2'>$output</span>";
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