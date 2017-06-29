<?php
session_start();

$serverName="DESKTOP-ORC4LBG";
$connectionInfo = array( "Database"=>"Ambrosio", "UID"=>"pauloalves", "PWD"=>"polmax225080");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    echo "Sem conexão com BD";
    die;
}

$_SESSION['idlocal']=355;
$local=$_SESSION['idlocal'];
$resultla = sqlsrv_query($conn, "SELECT Latitude FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultla);
            $latitude=sqlsrv_get_field($resultla, 0);

$resultlo = sqlsrv_query($conn, "SELECT Longitude FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultlo);
            $longitude=sqlsrv_get_field($resultlo, 0);

$resultnl = sqlsrv_query($conn, "SELECT Nome FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultnl);
            $nomel=sqlsrv_get_field($resultnl, 0);
$_SESSION['latitude']=$latitude;
$_SESSION['longitude']=$longitude;
$_SESSION['nomelocal']=$nomel;
?>
<!DOCTYPE html>
<head>
    <title>Menu</title>
    <img src="../assets/francesinham.jpg" alt="Prato" width="680" height="484" style="position: absolute; left:100;top:200px">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/buttonstyle.css" />


</head>

<body>
    <div>
        <button onclick="location.href = '../php/prato.php';" type="button" id="button" class="buttonR"><?php printf($_SESSION['prato'])?></button>
        <button onclick="location.href = '../php/local.php';" type="button" id="button" class="buttonR">Caracterização do local</button>
        <button onclick="location.href = '../php/relatos.php';" type="button" id="button" class="buttonR">Relatos de clientes</button>
        <button onclick="location.href = '../php/contactos.php';" type="button" id="button" class="buttonR">Contactos</button>
        <button onclick="location.href = '../php/mapa.php';" type="button" id="button" class="buttonR">Localização</button>
    </div>

</body>

</html>
?>