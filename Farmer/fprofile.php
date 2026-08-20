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
$para3 = $row4['password'];
$para5 = $row4['email'];
$para6 = $row4['phone_no'];
$para7 = $row4['F_gender'];
$para8 = $row4['F_birthday'];
$para9 = $row4['F_State'];
$para10 = $row4['F_District'];
$para11 = $row4['F_Location'];

if(isset($_POST['farmerupdate'])) {
    $id = ($_POST['id']);
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $mobile = ($_POST['mobile']);
    $gender = ($_POST['gender']);
    $dob = ($_POST['dob']);
    $state = ($_POST['state']);
    $district = ($_POST['district']);       
    $city = ($_POST['city']);
    $pass = ($_POST['pass']);

    $query5 = "SELECT StateName from state where StCode ='$state'";
    $ses_sq5 = mysqli_query($conn, $query5);
    $row5 = mysqli_fetch_assoc($ses_sq5);
    $statename = $row5['StateName'];
              
    $updatequery1 = "UPDATE farmerlogin set farmer_name='$name', email='$email', phone_no='$mobile', F_gender='$gender', F_birthday='$dob', F_State='$statename', F_District='$district', F_Location='$city', password='$pass' where farmer_id='$id'";
    mysqli_query($conn, $updatequery1);
    header("location: fprofile.php");
}         
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
            <h2 class="display-4 font-weight-bold text-warning">Farmer Profile</h2>
        </div>
      </div>

      <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-md-4 mb-4">
            <div class="card glass-card text-center p-4 h-100">
                <div class="card-body">
                    <img src="../assets/img/agri.png" alt="Farmer" class="rounded-circle shadow-lg mb-4" width="150" style="border: 4px solid #fff;">
                    <h3 class="font-weight-bold text-warning mb-1"><?php echo $login_session ?></h3>
                    <p class="text-muted mb-4">Registered Farmer</p>
                    <button data-toggle="modal" data-target="#edit" class="btn btn-warning btn-block text-white shadow">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </button>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="col-md-8 mb-4">
            <div class="card glass-card h-100">
                <div class="card-header glass-header">
                    <h4 class="mb-0 text-success"><i class="fas fa-id-card mr-2"></i> Personal Information</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 font-weight-bold text-muted">Farmer ID</div>
                        <div class="col-sm-8 font-weight-bold"><?php echo $para1 ?></div>
                    </div>
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 font-weight-bold text-muted">Email</div>
                        <div class="col-sm-8"><?php echo $para5 ?></div>
                    </div>
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 font-weight-bold text-muted">Phone</div>
                        <div class="col-sm-8"><?php echo $para6 ?></div>
                    </div>
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 font-weight-bold text-muted">Gender</div>
                        <div class="col-sm-8"><?php echo $para7 ?></div>
                    </div>
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 font-weight-bold text-muted">Date of Birth</div>
                        <div class="col-sm-8"><?php echo $para8 ?></div>
                    </div>
                    <div class="row mb-3 border-bottom pb-2">
                        <div class="col-sm-4 font-weight-bold text-muted">Location</div>
                        <div class="col-sm-8"><?php echo "$para11, $para10, $para9"; ?></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title text-white"><i class="fas fa-user-edit mr-2"></i> Edit Profile</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" autocomplete="new-password">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Farmer ID</label>
                        <div class="col-md-9">
                            <input name="id" class="form-control bg-light" value="<?php echo "$para1"?>" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="name" value="<?php echo "$para2"?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="email" value="<?php echo "$para5"?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Mobile</label>
                        <div class="col-md-9">
                            <input class="form-control" type="number" name="mobile" value="<?php echo "$para6"?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Gender</label>
                        <div class="col-md-9">
                            <select class="form-control" name="gender">
                                <option selected hidden><?php echo "$para7"?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">DOB</label>
                        <div class="col-md-9">
                            <input class="form-control" name="dob" type="date" value="<?php echo "$para8"?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">State</label>
                        <div class="col-md-9">
                            <select onChange="getdistrict(this.value);" name="state" id="state" class="form-control">
                                <option value=""><?php echo "$para9"?></option>
                                <?php $query =mysqli_query($conn,"SELECT * FROM state");
                                while($row=mysqli_fetch_array($query)) { ?>
                                <option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">District</label>
                        <div class="col-md-9">
                            <select name="district" id="district-list" class="form-control">
                                <option value=""><?php echo "$para10"?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">City</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="city" value="<?php echo "$para11"?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input name="pass" type="password" value="<?php echo "$para3"?>" class="form-control" id="password" required />
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white" onclick="password_show_hide();" style="cursor:pointer;">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="farmerupdate" class="btn btn-warning text-white">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <?php include ('footer.php'); ?>

  <script>
  function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
  }
  
  function getdistrict(val) {
    $.ajax({
        type: "POST",
        url: "fget_district.php",
        data:'state_id='+val,
        success: function(data){
            $("#district-list").html(data);
        }
    });
  }
  </script>
</body>
</html>