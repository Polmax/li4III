<?php
session_start();
$serverName="DESKTOP-ORC4LBG";
$connectionInfo = array( "Database"=>"Ambrosio", "UID"=>"pauloalves", "PWD"=>"polmax225080");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    echo "Sem conexão com BD";
    die;
}
$pesquisa=$_POST['pesquisa1'];
$result = sqlsrv_query($conn,"SELECT l.nome FROM Ambrosio.Prato as p inner join Prato_Local as pl on pl.Prato_Id=p.Id inner join Local as l on l.Id=pl.Local_Id where (p.Nome='$pesquisa')");
if ($result!==false) {
   while($row = sqlsrv_fetch_array($result)){
      printf("%s\n",$row[0]);
   }

}
else echo "Prato não encontrado";
