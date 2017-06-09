<?php
$connection =mysqli_connect("localhost", "root", "polmax", "sobrecarris"); // Establishing connection with server..

if (!$connection) {
    echo "Please try later.";
}
$email=$_POST['email1']; // Fetching Values from URL.
$password= $_POST['password1']; // Password Encryption, If you like you can also leave sha1.
// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email.......";
} else {
// Matching user input email and password with stored email and password in database.

    $result = $connection->query("SELECT * FROM cliente WHERE (Email=\"$email\" AND Password=\"$password\")");
    $data = mysqli_num_rows($result);
    if ($data==1) {
        echo "Successfully Logged in...";
    } else {
        echo "Email or Password is wrong...!!!!";
    }
}
mysqli_close ($connection); // Connection Closed.
