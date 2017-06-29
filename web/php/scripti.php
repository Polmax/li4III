<?php
$serverName="DESKTOP-ORC4LBG";
$connectionInfo = array( "Database"=>"Ambrosio", "UID"=>"pauloalves", "PWD"=>"polmax225080");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    echo "Sem conexão com BD";
    die;
}

    $file = json_decode(file_get_contents("../json/francesinha.json"), true);

if (!$file) {
    echo "RIP";
    die;
}

    $items = $file['response']['groups'][0]['items'];
    
foreach ($items as $item) {
    $nome = $item['venue']['name'];
    $morada = $item['venue']['location']['address'];
    $lat = $item['venue']['location']['lat'];
    $lng = $item['venue']['location']['lng'];
    $preco = $item['venue']['price']['message'];
    if (isset($item['venue']['contact']['phone'])) {
            $telefone = $item['venue']['contact']['phone'];
    } else {
        $telefone = '';
    }
    if (isset($item['venue']['contact']['facebook'])) {
            $social = "www.facebook.com/".$item['venue']['contact']['facebookUsername'];
            
    } else {
        $social = '';
    }

    $comentario=$item['tips'][0]['text'];
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $existe = sqlsrv_query($conn,"select * from Ambrosio.Local where(Nome='$nome')",$params,$options);

    $numeror=sqlsrv_num_rows($existe);

    if($numeror==0){
        echo "a inserir";
    $inserirLocal = sqlsrv_query($conn,"insert into Ambrosio.Local(Nome,Morada,Latitude,Longitude) values('$nome','$morada',$lat,$lng)");
 
    }
    $buscarId = sqlsrv_query($conn,"select Local.Id from Ambrosio.Local where(Nome='$nome')");
    sqlsrv_fetch( $buscarId );
    $idLocal = sqlsrv_get_field( $buscarId, 0);
   // echo "$idLocal\n";
    $inserircontactos= sqlsrv_query($conn,"insert into Ambrosio.Contactos(Tlm,Email,Fixo,Social,Local_Id) values('$telefone','','$telefone','$social',$idLocal)");
    
    //echo "insert into Ambrosio.Contactos(Tlm,Email,Fixo,Social,Local_Id) values('$telefone','','$telefone','$social',$idLocal)\n";
    
    
    $result = sqlsrv_query($conn,"insert into Ambrosio.Prato_Local(Preco,Prato_Id,Local_Id) values('$preco',0,$idLocal)");

    /*
    echo "comentario : ".$comentario."\n";
    echo "restaurante : ".$nome."\n";
    echo "morada : ".$morada."\n";
    echo "latitude : ".$lat."\n";
    echo "longitude : ".$lng."\n";
    echo "telefone : ".$telefone."\n";
    echo "preço : ".$preco."\n";
    echo "facebook : ".$social."\n";
    */
}
