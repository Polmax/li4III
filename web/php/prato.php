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
    

      
<div id="prato">
    <?php
   
    $prato=$_SESSION['prato'];
    $_SESSION['imagem']=$prato . ".jpg";
    ?>
    <img src="../assets/<?php print( $_SESSION['imagem']);?>" alt="Ambrosio" width="800" height="700" style="position: relative">
            <label class="prato" >Prato :</label>
            <div class="nprato"><?php
            $resultp = sqlsrv_query($conn, "SELECT Nome FROM Ambrosio.Prato where (Nome='$prato')");
            sqlsrv_fetch($resultp);
            print(sqlsrv_get_field($resultp, 0));
            ?>
            </div>
            <label class="descricao">Descrição :</label>
            <div class="dprato"><?php
             header("Content-Type: text/html; charset=ISO-8859-1",true);
            $resultd= sqlsrv_query($conn, "SELECT Descricao FROM Ambrosio.Prato where (Nome='$prato')");
            sqlsrv_fetch($resultd);
            print(sqlsrv_get_field($resultd, 0));
            ?>
</div>
</div>
</body>

</html>
