<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "Kelloggs");
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $query = mysqli_query($conn, "SELECT * FROM UTENTI WHERE email='".$email."'");
    while($r = mysqli_fetch_assoc($query)){
        $email_utente = $r['email'];
        $nome_utente = $r['nome'];
        $cognome_utente = $r['cognome'];
    }

    if(isset($_POST["cancella"])){
        $cancella = mysqli_query($conn, "DELETE FROM UTENTI WHERE email = '".$_SESSION['email']."'");
        $cancella_preferiti = mysqli_query($conn, "DELETE FROM PREFERITI WHERE email='".$_SESSION['email']."'");
        session_start();
        if(isset($_SESSION['email'])){
            session_destroy();
            header("Location: login.php");
            exit;
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancella Profilo | Kellogg's</title>
    <link rel="stylesheet" href="profilo_personale.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="profilo_personale.js" defer></script>
</head>
<header>
        <div class="first">
            <div class="logo">
                <a href="mhw3.php" class="Logo"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/kelloggs-logo-mb.png" alt=""></a>
            </div>
            <div class="barra_nav">
                <div class="contatti">
                    <a href="https://www.kelloggs.it/it_IT/contact_us_it.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/icon-contact-us.png" alt=""></a>
                </div>
                <div class="navigazione">
                    <nav id="navi">
                        <a class="link" href="" data-target="chi_siamo">Chi siamo</a>
                        <img src="freccia.png" alt="">
                        <div id="chi_siamo" class="menu hidden"> 
                            <div class="flex column">
                                <a href="">La nosta visione e il nostro impegno</a>
                                <a href="">Le nostre sedi</a>
                                <a href="">La nostra storia</a>
                                </div>
                        </div>
                        <a class="link" href="prodotti.php" data-target="prodotti">I nostri prodotti</a>
                        <img src="freccia.png" alt="">
                        <div id="prodotti" class="menu hidden">
                            <div class="intero">
                                <div class="primo">
                                    <a href=""> Coco Pops®</a>
                                    <a href=""> Extra®</a>
                                    <a href=""> Frosties®</a>
                                    <a href=""> Kellogg's Barretta</a>
                                    <a href=""> Kellogg’s® Corn Flakes</a>
                                    <a href=""> Krave®</a>
                                    <a href=""> Miel Pops®</a>
                                </div>
                                <div class="primo">
                                    <a href=""> Nice Morning®</a>
                                    <a href=""> Rice Krispies®</a>
                                    <a href=""> Variety</a>
                                    <a href=""> W. K. Kellogg®</a>
                                    <a href=""> All-Bran®</a>
                                    <a href=""> Special K®</a>
                                </div>
                            </div>
                        </div>
                        <a class="link" href="" data-target="impatto">Il nostro impatto</a>
                        <img src="freccia.png" alt="">
                        <div id="impatto" class="menu hidden"> 
                                <div class="flex column">
                                    <a href="">Nutrizione e benessere</a>
                                    <a href="">Ambiente</a>
                                    <a href="">La nostra comunità</a>
                                    <a href="">I valori del nostro fondatore</a>
                                </div>
                        </div>

                        <a class="link" href="" data-target="novità">Le nostre novità</a>
                        <img src="freccia.png" alt="">
                        <div id="novità" class="menu hidden">
                                <div class="flex column">
                                    <a href="">Ufficio Stampa</a>
                                    <a href="">Promozioni</a>
                                </div>
                        </div>
                        <a href="">Lavorare in Kellogg</a>                        
                    </nav>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            </div>
        </div>
        <div class="second">
            <?php if(isset($_SESSION['email'])): ?>
            <a class="kcal" href="pagina_calorie.php"><img src="calorie.png" alt=""></a>
            <a class="recipe" href="pagina_ricette.php"><img src="recipe.png" alt=""></a>
            <a class="like" href="Prodotti_Preferiti.php"><img src="favorite.png" alt=""></a>
            <a class="edit_profile" href="profilo_personale.php"><img src="edit_profile.png" alt=""></a>
            <a class="login hidden" href="login.php"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/login.svg" alt=""></a>
            <a class="logout" href="logout.php"><img src="logout_24.png" alt=""></a>
            <?php else: ?>
            <a class="login" href="login.php"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/login.svg" alt=""></a>
            <a class="kcal hidden" href="pagina_calorie.php"><img src="calorie.png" alt=""></a>
            <a class="recipe hidden" href=""><img src="recipe.png" alt=""></a>
            <a class="like hidden" href="Prodotti_Preferiti.php"><img src="favorite.png" alt=""></a>
            <a class="edit_profile hidden" href="profilo_personale.php"><img src="edit_profile.png" alt=""></a>
            <a class="logout hidden" href="logout.php"><img src="logout_24.png" alt=""></a>
            <?php endif; ?>
            <a class="italy" href=""><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/italy_flag.png" alt=""></a>
        </div>
    </header>
    <div class = "piccola_barra">
        <span class = "k">
            <a href="mhw3.php"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/kelloggs-initial-logo.png" alt=""></a>
            </span>
        <span class = "testo">Elimina il profilo</span>
    </div>
    <form method="post" id = "cancellazione">
            <input class="button" type="submit" name="cancella" value="Conferma Cancellazione">
    </form>
            <footer>
                <div class="contenitore_1">
                    <div class="list">
                            <a href="">Chi siamo</a></li>
                            <a href="">I nostri prodotti</a></li>
                            <a href="">Il nostro impatto</a></li>
                            <a href="">Le nostre novità</a></li>
                    </div>
                    <div class="list">
                            <a href="">Contatti</a></li>
                            <a href="">Note legali</a></li>
                            <a href="">Informativa sulla privacy</a></li>
                            <a href="">Lavorare in Kellogg</a></li>
                    </div>
                    <div class="list">
                            <a href="">Mappa del sito</a></li>
                            <a href="">Promozioni</a></li>
                            <a href="">Preferenze sui cookie</a></li>
                            <a href="">Ethics Line</a></li>
                    </div>
                </div>
                <div class="contenitore_2">
                    <p>© 2023 Kellanova. All rights reserved.</p>
                    <div class="social_links">
                        <a href="https://www.facebook.com/kelloggsitalia"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/icon-facebook.png" alt=""></a>
                        <a href="https://www.instagram.com/kelloggs_it/"><img src="	https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/icon-instagram.png" alt=""></a>
                        <a href="https://www.linkedin.com/company/kellogg-company/"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/icon-linkedin.png" alt=""></a>
                    </div>
                </div>
            </footer>
    