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
<?php require ('fheader.php'); ?>

<body class="bg-white" id="top">
  <?php include ('fnav.php'); ?>

  <div class="wrapper" style="margin-top: 30px;">
    <div class="container-fluid">
      
      <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="display-4 font-weight-bold text-dark">Latest Agriculture News</h2>
            <p class="lead text-muted">Stay updated with the farming world</p>
        </div>
      </div>

      <div class="row">
        <?php
        error_reporting(E_ERROR | E_PARSE);
        // Using a fallback API URL or your key
        $url="https://newsapi.org/v2/everything?q=farmers&sortBy=popularity&apiKey=873fdaaba81b4d199bb0196a564088ac"; 
        
        // Add Context for file_get_contents to handle some server restrictions
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: AgriPortal/1.0\r\n"
            ]
        ];
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $newsdata = json_decode($response);

        if($newsdata && isset($newsdata->articles)) {
            foreach($newsdata->articles as $news) {
                // Filter out articles without images for better UI
                if(!empty($news->urlToImage)) {
        ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0" style="transition: transform 0.3s;">
                <img class="card-img-top" src="<?php echo $news->urlToImage ?>" alt="News image" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title font-weight-bold text-dark"><?php echo substr($news->title, 0, 60) . '...'; ?></h6>
                    <p class="card-text text-muted small flex-grow-1">
                        <i class="far fa-user mr-1"></i> <?php echo substr($news->author ? $news->author : 'Unknown', 0, 20); ?> <br>
                        <i class="far fa-clock mr-1"></i> <?php echo date("d M Y", strtotime($news->publishedAt)); ?>
                    </p>
                    <a href="<?php echo $news->url ?>" target="_blank" class="btn btn-sm btn-outline-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
        <?php 
                }
            }
        } else {
            echo '<div class="col-12 text-center"><p class="text-muted">Unable to fetch news at this moment. Please try again later.</p></div>';
        }
        ?>   
      </div>
    </div>
  </div>

  <?php require("footer.php");?>
</body>
</html>