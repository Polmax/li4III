<?php
// Start the session
session_start();
?>
    <!DOCTYPE html>
    <html>

    <body>

        <?php
        $connection =mysqli_connect("localhost", "root", "polmax", "sobrecarris");
// Set session variables
        $_SESSION["prato"] = "francesinha";
        print_r($_SESSION['prato']);
        $result = $connection->query("SELECT Descricao FROM prato WHERE(prato.Nome=\"Francesinha\")");
        $row=mysqli_fetch_row($result);
        printf("\n %s",$row[0]);
?>
<div></div>

    </body>

    </html>
