<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Kellogg's</title>
    <link rel="stylesheet" href="mhw3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="mhw3.js" defer></script>
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
    <div class="image2">
            <button id="previous" class="hidden"></button>
            <button id="cambia_img" class="hidden"></button>
        <a id="image22" href="https://www.krazytastybasehunt.com/it_IT/home.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/C3_EN_CUSTOM_2884x1026_STATIC_022113_R0.png" alt=""></a>
    </div>
    <section class="Prodotti">
        <button id="changeProductback" class="hidden"></button>
        <button id="changeProduct" class="hidden"></button>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/coco-pops-consumer-brand.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/circle.png" alt="">
                <p>Coco Pops®</p>
            </a>
        </div>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/extra-consumer-brand.html">
                <div class="slide_product_extra"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/Dark_Choc_SE.png" alt="">
                <p>Extra®</p>
            </div>
            </a>
        </div>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/all-bran-consumer-brand.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/all-bran.png" alt="">
                <p>All-Bran®</p>
            </a>
        </div>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/kellogg-s-corn-flakes-consumer-brand.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/kelloggs-corn-flakes.png" alt="">
                <p>Kellogg’s® Corn Flakes</p>
            </a>
        </div>

        <div class="second_product hidden">
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/miel-pops-consumer-brand.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/miel-pops.png" alt="">
                <p>Miel Pops®</p>
            </a>
        </div>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/frosties-consumer-brand.html">
                <div class="slide_product_extra"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/frosties.png" alt="">
                <p>Frosties®</p>
            </a>
        </div>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/krave-consumer-brand.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/krave.png" alt="">
                <p>Krave®</p>
            </a>
        </div>
        <div class="slide_product">
            <a href="https://www.kelloggs.it/it_IT/brands/nice-morning-consumer-brand.html"><img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/nicemorning.png" alt="">
                <p>Nice Morning®</p>
            </a>
        </div>
    </div>
        
        </section>
        <div class="bottone">
            <a class="button" href="https://kelloggs.ie/en_IE/brands.html">SCOPRI DI PIU'</a>
            </div>
            <div class="benefici">
                <button id="changeBackgroundnext"></button>
                <button id="changeBackgroundback"></button>
                <div class="contenitore_testo">
                    <h3>I benefici dei cereali</h3>
                    <p>Tutti abbiamo sentito dire almeno una volta che la colazione è un pasto molto importante e che i cereali sono una delle scelte migliori per la colazione.</p>
                    <p>
                        <a class="button" href="">SCOPRI DI PIU'</a>
                    </p>
                </div>
            </div>
            <div class="doppio">
                <div class="first_2">
                    <div class="title1">
                        <h3>Chi siamo</h3>
                        <p>Fare la differenza è al centro di tutto ciò che facciamo.</p>
                        <p>
                            <a class="button" href="">SCOPRI DI PIU'</a>
                        </p>
                    </div>
                    <div class="img_inf">
                        <img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/icon-middle.svg" alt="">
                    </div>
                </div>
                <div class="second_2">
                    <div class="title1">
                        <h3>Lavorare in Kellogg</h3>
                        <p>Entra a far parte del team.</p>
                        <p>
                            <a class="button" href="">SCOPRI DI PIU'</a>
                        </p>
                    </div>
                    <div class="img_inf">
                        <img src="https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/home/rejoin.png" alt="">
                    </div>
                </div>
            </div>
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