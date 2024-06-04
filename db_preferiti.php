<?php
      session_start();
      // Connessione al database
      $conn = mysqli_connect("localhost", "root", "", "Kelloggs");
      // Inizializza array di eventi
      $prodotti = array();
      // Leggi eventi
      $email = mysqli_real_escape_string($conn, $_SESSION['email']);
      $query = "SELECT P.ID, P.NOME, P.URL FROM PREFERITI PR JOIN PRODOTTI P ON PR.prodotto = P.ID WHERE PR.email = '".$email."'";
      $res = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($res))
      {
            $prodotti[] = $row;
      }
      // Chiudi
      mysqli_free_result($res);
      mysqli_close($conn);
      // Ritorna
     /* $data = array(
        "prodotti" => $prodotti
      );*/
      echo json_encode($prodotti);

?>