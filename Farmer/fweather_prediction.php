<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
    header("location: ../index.php");
}
$query4 = "SELECT * from farmerlogin where email='$user_check'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);

// Logic to get District and Weather ID
$display_district="Select F_District from farmerlogin WHERE email='$user_check'";
$display_district_result=mysqli_query($conn,$display_district);
$display_district_name = mysqli_fetch_array($display_district_result);
$District_name_farmer=$display_district_name[0];

$url = 'static/citylist.json'; 
$data = file_get_contents($url); 
$district= json_decode($data); 
$district_weather_id=0;

foreach ($district as $district) {
    if ($district->name == trim($District_name_farmer)) {
        $district_weather_id=$district->id;
    }
}
if($district_weather_id<=0){
    $district_weather_id=1253952;
}
$city_weather_id=strval($district_weather_id);

date_default_timezone_set("Asia/Kolkata");
$apiKey = "870887df4d2b01335921fe396c69a360"; 
$cityId = $city_weather_id;

$googleApiUrl ="https://api.openweathermap.org/data/2.5/forecast?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response);
$forecast = $data->list;
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
            <h2 class="display-4 font-weight-bold text-danger">Live Weather</h2>
            <p class="lead text-muted">Real-time updates for <?php echo $District_name_farmer; ?></p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-12">
            
            <!-- Widget -->
            <div id="openweathermap-widget-9" class="shadow-sm rounded mb-4"></div>
            <script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 9,cityid: '<?php echo $cityId ?>',appid: '870887df4d2b01335921fe396c69a360',units: 'metric',containerid: 'openweathermap-widget-9',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>

            <!-- Data Table -->
            <div class="card glass-card">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-danger"><i class="fas fa-temperature-high mr-2"></i> Hourly Forecast</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Condition</th>
                                    <th class="text-center">Temp (Max/Min)</th>
                                    <th class="text-center">Humidity</th>
                                    <th class="text-center">Wind</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $loop=0; foreach($forecast as $f){ $loop++;
                                    $date = substr($f->dt_txt, 0, 10);
                                    $time = substr($f->dt_txt, 11);
                                ?>
                                <tr class="text-center">
                                    <td><strong><?php echo $date; ?></strong></td>
                                    <td><?php echo $time; ?></td>
                                    <td>
                                        <img src="http://openweathermap.org/img/w/<?php echo $f->weather[0]->icon; ?>.png" width="35" />
                                        <br><small><?php echo $f->weather[0]->description; ?></small>
                                    </td>
                                    <td>
                                        <span class="text-danger font-weight-bold"><?php echo $f->main->temp_max; ?>°C</span> 
                                        <small>/ <?php echo $f->main->temp_min; ?>°C</small>
                                    </td>
                                    <td><?php echo $f->main->humidity; ?>%</td>
                                    <td><?php echo $f->wind->speed; ?> km/h</td>
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
        $('#myTable').DataTable();
    });
  </script>
</body>
</html>