<?php
session_start();
$connection =mysqli_connect("localhost", "root", "polmax", "sobrecarris"); // Establishing connection with server..
if (!$connection) {
    echo "Sem conexão com BD";
}
$pesquisa=$_POST['pesquisa1'];
$result = $connection->query("SELECT l.nome FROM sobrecarris.prato as p inner join prato_local as pl on pl.Prato_Id=p.Id inner join local as l on l.Id=pl.Local_Id where (p.Nome=\"$pesquisa\")");
$data = mysqli_num_rows($result);

if ($data>0) {
   while($row = mysqli_fetch_row($result)){
      printf("%s\n",$row[0]);
   }

}
else echo "Prato não encontrado";
