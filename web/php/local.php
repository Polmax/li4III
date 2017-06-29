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
    <link rel="stylesheet" href="../css/style.css" />
    </head>
 <body>
     </div>
           <label class="nl" >Nome do restaurante :</label>
            <div class="nl"><?php
            $local=$_SESSION['idlocal'];
            $resultnl = sqlsrv_query($conn, "SELECT Nome FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultnl);
            print(sqlsrv_get_field($resultnl, 0));
            ?>
           </div>
            <label class="morada" >Morada :</label>
            <div class="morada"><?php
            $local=$_SESSION['idlocal'];
            $resultmo = sqlsrv_query($conn, "SELECT Morada FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultmo);
            print(sqlsrv_get_field($resultmo, 0));
            ?>
           </div>
            <label class="la" >Latitude :</label>
            <div class="la"><?php
            $local=$_SESSION['idlocal'];
            $resultla = sqlsrv_query($conn, "SELECT Latitude FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultla);
            print(sqlsrv_get_field($resultla, 0));
            ?>
           </div>
            <label class="lo" >Longitude :</label>
            <div class="lo"><?php
            $local=$_SESSION['idlocal'];
            $resultlo = sqlsrv_query($conn, "SELECT Longitude FROM Ambrosio.Local where (Id=$local)");
            sqlsrv_fetch($resultlo);
            print(sqlsrv_get_field($resultlo, 0));
            ?>

    <div id="map" style="width:1800px;height:800px;background:yellow"></div>

    <script>
        function myMap() {
            var lat = <?php echo $_SESSION['latitude']; ?>;
            var long= <?php echo $_SESSION['longitude']; ?>;

            print(lat);
            var mapOptions = {
                center: new google.maps.LatLng(lat,long),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var myLatlng = new google.maps.LatLng(lat,long);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "local"
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBKCBxM6X5I1L5jsU8J4MlnvXImTbr8o4&callback=myMap"></script>


    

</body>

</html>
