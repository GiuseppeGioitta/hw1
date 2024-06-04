<?php

      // Connessione al database
      $conn = mysqli_connect("localhost", "root", "", "Kelloggs");
      // Inizializza array di eventi
      $prodotti = array();
      // Leggi eventi
      $res = mysqli_query($conn, "SELECT * FROM PRODOTTI ORDER BY tipologia");
      while($row = mysqli_fetch_assoc($res))
      {
            $prodotti[] = $row;
      }
      // Chiudi
      mysqli_free_result($res);
      mysqli_close($conn);
      // Ritorna
      $data = array(
        "prodotti" => $prodotti
      );
      echo json_encode($data);

?>