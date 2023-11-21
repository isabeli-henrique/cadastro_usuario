<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "cadastro_pessoa";

    $con = mysqli_connect($server, $user, $pass, $bd);

    if ($con) {
      // echo "Conectado!";
     } else {
        echo "Falha na Conexão!" . mysqli_connect_error();
     }
     function mostra_data($data) {
      $dt = explode('-', $data);
      $escreve = $dt[2] . "/" . $dt[1] . "/" . $dt[0];
      return $escreve;
     }
?>