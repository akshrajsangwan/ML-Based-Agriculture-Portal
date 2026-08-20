<?php
/* NOTE: We include contact.php so the user sees the page background 
   while the success/error popup is displayed.
*/
include 'contact.php'; 
include 'sql.php';

if (isset($_POST["submit"])) {
    $user_name = $_POST['name']; // Updated to match the 'name' attribute in my new contact.php template
    $user_mobile = $_POST['mobile']; // Updated attribute
    $user_email = $_POST['email']; // Updated attribute
    $user_address = $_POST['address'] ?? ''; // Safe check if address isn't sent
    $user_message = $_POST['message']; // Updated attribute

    $query = "INSERT into contactus(c_name, c_mobile, c_email, c_address, c_message) VALUES('$user_name','$user_mobile','$user_email','$user_address','$user_message')";
    $success = $conn->query($query);

    // Include SweetAlert2 CDN
    echo '<script src="[https://cdn.jsdelivr.net/npm/sweetalert2@11](https://cdn.jsdelivr.net/npm/sweetalert2@11)"></script>';

    if ($success) {
        echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Message Sent!',
                text: 'Thank you for contacting us. We will get back to you shortly.',
                icon: 'success',
                confirmButtonColor: '#2e7d32',
                confirmButtonText: 'Great!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        </script>";
    } else {
        echo "<script type='text/javascript'>
            Swal.fire({
                title: 'Oops...',
                text: 'Something went wrong. Please try again later.',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'contact.php';
                }
            });
        </script>";
    }
}
?>