<?php
session_start();
$serverName="DESKTOP-ORC4LBG";
$connectionInfo = array( "Database"=>"Ambrosio", "UID"=>"pauloalves", "PWD"=>"polmax225080");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    echo "Sem conexão com BD";
    die;
}
$email=$_POST['email1']; // Fetching Values from URL.
$password= $_POST['password1']; // Password Encryption, If you like you can also leave sha1.
// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email inválido";
} else {
// Matching user input email and password with stored email and password in database.

    $result = sqlsrv_query($conn,"SELECT * FROM Ambrosio.Cliente WHERE (Email='$email' AND Password='$password')");
    if ($result!==false) {
        $_SESSION['username']=$email;
        echo "Login efectuado com sucesso";
    } else {
        echo "Email ou password erradas";
    }
}
sqlsrv_close ($conn); // Connection Closed.
