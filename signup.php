<?php
    session_start();
        if (!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["confirm_email"]) && 
        !empty($_POST["password"]) && !empty($_POST["confirm_password"]) && !empty($_POST["allow"]))
    {
        $error = array();
        $conn = mysqli_connect("localhost", "root", "", "Kelloggs");

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM UTENTI WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }

        if (strcmp($_POST["email"], $_POST["confirm_email"]) != 0) {
            $error[] = "Le email non coincidono";
        }


        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO UTENTI(email, nome, cognome, password) VALUES('$email', '$name', '$surname', '$password')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["email"] = $_POST["email"];
                mysqli_close($conn);
                header("Location: mhw3.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["name"])) {
        $error = array("Riempi tutti i campi");
    }

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione | Kellogg's</title>
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="signup.js" defer></script>
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

    <section id = "signup">
        <div class = "Registrati">
            <h1>Iscriviti oggi</h1>
            <p> È facile e GRATUITO iscriversi per ricevere le ultime notizie, offerte speciali e risparmi esclusivi da Kellogg's®. <br>
                Sei già iscritto a Kellogg's? <a href="login.php">Accedi subito</a></p>
                <form name = "Registrazione" method = 'post' autocomplete = "off">
                <div class="names">
                    <div class="name">
                        <label for='name'>*Nome</label><br>
                        <input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                        <div><img src="close.svg"/><span>Devi inserire il tuo nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label><br>
                        <input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                        <div><img src="close.svg"/><span>Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="email">
                    <label for='email'>*Email</label><br>
                    <input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><img src="close.svg"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="confirm_email">
                    <label for='confirm_email'>*Conferma e-mail</label><br>
                    <input type='email' name='confirm_email' <?php if(isset($_POST["confirm_email"])){echo "value=".$_POST["confirm_email"];} ?>>
                    <div><img src="close.svg"/><span>Le e-mail non coincidono</span></div>
                </div>
                <div class="password">
                    <label for='password'>*Password</label><br>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <div><img src="close.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>*Conferma Password</label><br>
                    <input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
                    <div><img src="close.svg"/><span>Le password non coincidono</span></div>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                    <label for='allow'>Dichiaro di accettare <a href="https://www.kelloggs.ie/en_IE/privacy-notice.html">l'informativa sulla Privacy</a></label>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                    <label for='allow'>Ci impegniamo a proteggere la tua privacy. Kellogg <br> 
                    Europe Trading Limited (Kellogg) tratterà i tuoi dati solo <br>
                    per attivare il tuo account Kellogg, registrare le tue <br> 
                    preferenze, contattarti in merito a promozioni future e <br> 
                    per finalità di marketing. Non venderemo mai i tuoi <br>
                    dati a terzi, ma potremmo combinarli con dati di altre <br> 
                    fonti per creare profili anonimizzati/pseudonimizzati <br>
                    per la pubblicità mirata. I tuoi dati saranno trattati e <br>
                    conservati su server ubicati negli Stati Uniti. Kellogg<br>
                    assicura che tutti i responsabili del trattamento siano <br>
                    obbligati a garantire il rispetto della protezione dei dati<br>
                    ai sensi delle clausole contrattuali standard (SCC) dell'UE. <br>
                    Conserveremo i tuoi dati fin quando il tuo consenso sarà valido<br>
                    e tu desidererai ricevere comunicazioni di marketing. <br>
                    Hai il diritto di accedere ai tuoi dati, revocare il tuo<br>
                    consenso e richiedere la cancellazione dei tuoi dati. <br>
                    Hai inoltre il diritto di contattare un'autorità di controllo <br>
                    per la protezione dei dati. Per ulteriori domande in merito a <br>
                    come utilizziamo i tuoi dati consulta la nostra <a href="https://www.kelloggs.ie/en_IE/privacy-notice.html">l'informativa sulla Privacy</a> <br>
                    Puoi anche contattarci all’indirizzo <a href="">DataPrivacyOfficer@kellogg.com</a></label>
                </div>
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><img src='close.svg'/><span>".$err."</span></div>";
                    }
                } ?>
                <div class="submit">
                    <input type='submit' value="CONTINUA" id="submit">
                </div>
                </form>
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