<?php
    session_start();
    $prova = array();

    if(!isset($_SESSION["email"])){
        echo json_encode($prova);
        exit;
    }
    
    if(isset($_GET['id_prodotto']) && isset($_GET['azione'])){

        $azione = $_GET['azione'];
        $conn = mysqli_connect("localhost", "root", "", "Kelloggs");

        if($azione == "aggiungi"){
            $query = "INSERT INTO PREFERITI VALUES ('".$_SESSION['email']."','".$_GET['id_prodotto']."')";
            $res = mysqli_query($conn, $query);
            $prova[] = "aggiunto";
        }
        else if($azione == "rimuovi"){
            $query = "DELETE FROM PREFERITI WHERE email = '".$_SESSION['email']."' AND prodotto = '".$_GET['id_prodotto']."'";
            $res = mysqli_query($conn, $query);

        }

        echo json_encode($prova);
    }
    echo json_encode($prova);

?>
