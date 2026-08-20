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
            <h2 class="display-4 font-weight-bold text-info">Soil Analysis & Recommendation</h2>
            <p class="lead text-muted">Based on N-P-K and Environmental factors</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-info"><i class="fas fa-flask mr-2"></i> Soil Details</h4>
                </div>
                <div class="card-body">
                    <form role="form" action="#" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nitrogen (N)</label>
                                    <input type='number' name='n' placeholder="Ex: 90" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phosphorous (P)</label>
                                    <input type='number' name='p' placeholder="Ex: 42" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Potassium (K)</label>
                                    <input type='number' name='k' placeholder="Ex: 43" required class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Temperature (°C)</label>
                                    <input type='number' name='t' step=0.01 placeholder="Ex: 21" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Humidity (%)</label>
                                    <input type='number' name='h' step=0.01 placeholder="Ex: 82" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>pH Value</label>
                                    <input type='number' name='ph' step=0.01 placeholder="Ex: 6.5" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Rainfall (mm)</label>
                                    <input type='number' name='r' step=0.01 placeholder="Ex: 203" required class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="Crop_Recommend" class="btn btn-info btn-lg px-5 shadow">Get Recommendation</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if(isset($_POST['Crop_Recommend'])){ ?>
            <div class="card glass-card border-info">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0 text-white"><i class="fas fa-clipboard-check mr-2"></i> Recommendation</h4>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-dark font-weight-bold">
                    <?php 
                        $n=trim($_POST['n']); $p=trim($_POST['p']); $k=trim($_POST['k']);
                        $t=trim($_POST['t']); $h=trim($_POST['h']); $ph=trim($_POST['ph']); $r=trim($_POST['r']);

                        echo "Best crop to plant: ";
                        
                        $Jsonn=json_encode($n); $Jsonp=json_encode($p); $Jsonk=json_encode($k);
                        $Jsont=json_encode($t); $Jsonh=json_encode($h); $Jsonph=json_encode($ph); $Jsonr=json_encode($r);
                        
                        $command = escapeshellcmd("python ML/crop_recommendation/recommend.py $Jsonn $Jsonp $Jsonk $Jsont $Jsonh $Jsonph $Jsonr ");
                        $output = passthru($command);
                        echo "<span class='text-info text-uppercase display-4 d-block mt-2'>$output</span>";
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