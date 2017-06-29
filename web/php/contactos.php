<?php
session_start();

$serverName="DESKTOP-ORC4LBG";
$connectionInfo = array( "Database"=>"Ambrosio", "UID"=>"pauloalves", "PWD"=>"polmax225080");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    echo "Sem conexão com BD";
    die;
}
?>
    <!DOCTYPE html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="../css/style.css" />
    </head>
 <body>
    
            <label class="tlm" >Telemóvel :</label>
            <div class="tlm"><?php
            $local=$_SESSION['idlocal'];
            $resulttlm = sqlsrv_query($conn, "SELECT Tlm FROM Ambrosio.Contactos where (Local_Id=$local)");
            sqlsrv_fetch($resulttlm);
            print(sqlsrv_get_field($resulttlm, 0));
            ?>
           </div>
           <label class="email" >Email :</label>
            <div class="email"><?php
            $local=$_SESSION['idlocal'];
            $resulttlm = sqlsrv_query($conn, "SELECT Email FROM Ambrosio.Contactos where (Local_Id=$local)");
            sqlsrv_fetch($resulttlm);
            print(sqlsrv_get_field($resulttlm, 0));
            ?>
           </div>
           </div>
           <label class="fixo" >Fixo :</label>
            <div class="fixo"><?php
            $local=$_SESSION['idlocal'];
            $resulttlm = sqlsrv_query($conn, "SELECT Fixo FROM Ambrosio.Contactos where (Local_Id=$local)");
            sqlsrv_fetch($resulttlm);
            print(sqlsrv_get_field($resulttlm, 0));
            ?>
           </div>
           </div>
           <label class="rs" >Rede social :</label>
            <div class="rs"><?php
            $local=$_SESSION['idlocal'];
            $resulttlm = sqlsrv_query($conn, "SELECT Social FROM Ambrosio.Contactos where (Local_Id=$local)");
            sqlsrv_fetch($resulttlm);
            print(sqlsrv_get_field($resulttlm, 0));
            ?>
           </div>

</body>

</html>
