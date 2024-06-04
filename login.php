<?php
    session_start();
    if(isset($_SESSION["email"])){
        header("Location: mhw3.php");
        exit;
    }

    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $conn = mysqli_connect("localhost", "root", "", "Kelloggs");
        $username = mysqli_real_escape_string($conn, $_POST["email"]);
        $query = "SELECT * FROM UTENTI WHERE email = '".$username."'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;

        if( mysqli_num_rows($res) > 0){
            $entry = mysqli_fetch_assoc($res);
            if(password_verify($_POST['password'], $entry['password'])){
                    $_SESSION["email"] = $entry["email"];
                    header("Location: mhw3.php");
                    exit;
            }
            else{
                $errore = "Email e/o password errate";
            }
        }
        else{
            $errore = "Email e/o password errate";
        }
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $errore = "Inserisci email e password.";
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kellogg's</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="login.js" defer></script>
</head>
<body>
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
    <section id = "login">
        <div class = "access">
            <h1>ACCEDI</h1>
            <p> È facile e GRATUITO iscriversi per ricevere le ultime notizie, offerte speciali e risparmi esclusivi da Kellogg's. <br>
                Sei già registrato al sito Kellogg's?</p>
                <?php
                if (isset($errore)) {
                    echo "<p class='error'>$errore</p>";
                } 
            ?>
                <form name = 'accedi' method = 'post'>
                    <p>
                        <label >*Indirizzo e-mail <br> <input type="text" name = 'email'> </label>
                    </p>
                    <p>
                        <label >*Password <br> <input type="password" name = 'password'> </label>
                    </p>
                    <p>
                        <label >&nbsp; <input type='submit' name = 'continua' value = 'CONTINUA'> </label>
                    </p>
                </form>
                <div class="signup"><h4>Non hai un account?</h4></div>
                <div class="signup-btn-container"><a class="signup-btn" href="signup.php">ISCRIVITI A KELLOGGS</a></div>
        </div>
    </section>
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
</body>
</html>