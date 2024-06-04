CREATE DATABASE Kelloggs;
USE Kelloggs;

CREATE TABLE UTENTI(
	email VARCHAR(255) PRIMARY KEY,
    nome VARCHAR(255) NOT NULL, 
    cognome VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO UTENTI VALUES ('giuseppegioitta42@gmail.com', 'Giuseppe', 'Gioitta', 'CampioniItalia20');

SELECT * FROM UTENTI;


CREATE TABLE PRODOTTI(
	ID INTEGER PRIMARY KEY,
    NOME VARCHAR(255),
    TIPOLOGIA VARCHAR(255),
    DESCRIZIONE VARCHAR(255),
    URL VARCHAR(255)
);

INSERT INTO PRODOTTI VALUES (1, 'Frosties®', 'Cereali', 'Cereali Kelloggs Frosties: fiocchi di mais con un delizioso rivestimento glassato, i Kelloggs Frosties regalano davvero un gustoso inizio di giornata...', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_4508506/kicproductimage-121045_kicproductimage-121045.jpg');
INSERT INTO PRODOTTI VALUES (2, 'Coco Pops', 'Cereali', '-30% di zuccheri***, 100% irresistibile Ma non preoccuparti, i nostri cereali Coco Pops Risetti rimangono irresistibili...abbiamo infatti mantenuto il sapore inconfondibile riducendo solamente il contenuto di zucchero, senza l utilizzo di dolcificanti artificiali**!', 'https://www.kelloggs.it/content/dam/europe/kelloggs_it/images/our_brands/new/Coco%20Pops%20Risetti.jpg');
INSERT INTO PRODOTTI VALUES (3, 'Coco Pops Barchette', 'Cereali', 'Deliziosi fiocchi di frumento tostato con cioccolato, ricco in vitamine e minerali che faranno la tua colazione più divertente. Ti soprenderà come fanno diventare il latte cioccolatoso!', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_2794111/prod_img-3772844_coco_pops_barchette.jpg');
INSERT INTO PRODOTTI VALUES (4, 'Coco Pops Palline', 'Cereali', 'Palline di mais al cacao tostato con cioccolato, ricco in vitamine e minerali che faranno la tua colazione più divertente. Ti soprenderà come fanno diventare il latte cioccolatoso!', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_507505/prod_img-3394680_prod_img-3394680.png');
INSERT INTO PRODOTTI VALUES (5, 'Coco Pops Snack', 'Snack', 'Barretta di riso soffiato al cacao su una base al latte e con aggiunta di vitamina D e calcio.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_253581/prod_img-253740_coco_pops_snack.jpg');
INSERT INTO PRODOTTI VALUES (6, 'EXTRA® Cioccolato e Nocciole', 'Cereali', 'Inizia la tua giornata con una piccola Extra gioia, grazie a un risveglio Extra con i suoi agglomerati di granola integrale extra-croccanti ed extra-large. Una granola naturalmente deliziosa, arricchita con pezzetti di delicato cioccolato, gustosi frutti di bosco e croccantissime nocciole… Un piacere EXTRA-ordinario!', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_529367/prod_img-6593217_dark_choc_se.png');
INSERT INTO PRODOTTI VALUES (7, 'Extra Barretta Cacao con Crema di Nocciole', 'Snack', 'Che sia per colazione, merenda o una pausa di gusto, regalati un momento di piacere assaporando la barretta Extra Cacao e crema di Nocciole! Questa nuova ricetta unisce la dolcezza della crema di nocciole con la deliziosa croccantezza delle nocciole tostate e la delicatezza del cacao. Senza olio di palma. Nessun aroma artificiale', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_977091/prod_img-990798_extra_barretta_cacao_con_crema_di_nocciole.jpg');
INSERT INTO PRODOTTI VALUES (8, 'Extra Barretta con Crema di Mandorla', 'Snack', 'Che sia per colazione, merenda o una pausa di gusto, regalati un momento di piacere assaporando la barretta Extra con Crema di Mandorla! Senza olio di palma. Nessun aroma artificiale', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_977098/prod_img-990810_extra_barretta_con_crema_di_mandorla.jpg');
INSERT INTO PRODOTTI VALUES (9, 'Extra® Barista', 'Cereali', 'AGGLOMERATI DI AVENA AL GUSTO CAFFE CON MANDORLE E RICCIOLI DI CIOCCOLATO. AL LATTE.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_1411570/prod_img-3571091_barista_se.png');
INSERT INTO PRODOTTI VALUES (10, 'Extra® Cioccolato al Latte', 'Cereali', 'Cereali ripieni di crema al cioccolato al latte.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_689845/prod_img-4352928_milk_choc_se.png');
INSERT INTO PRODOTTI VALUES (11, 'Extra® Frutta E Frutta Secca', 'Cereali', 'Croccanti agglomerati di avena con frutta disidratata e frutta a guscio.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_2794117/prod_img-9296083_fruit_and_nut_se.png');
INSERT INTO PRODOTTI VALUES (12, 'Extra® Frutti Rossi', 'Cereali', 'Croccanti agglomerati di avena con mora, lampone e ribes rosso liofilizzati.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_6786334/prod_img-6927382_red_berries_se.png');
INSERT INTO PRODOTTI VALUES (13, 'Extra® Nocciole Caramellate', 'Cereali', 'Croccanti agglomerati di avena con nocciole caramellate.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_1716606/prod_img-1783155_caramelised_nut_se.png');
INSERT INTO PRODOTTI VALUES (14, 'Extra® Original', 'Cereali', 'Croccanti agglomerati di avena con aggiunta di vitamine (niacina, B6, B2, B1, acido folico, B12) e ferro', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_6536517/prod_img-530363_original_se.png');
INSERT INTO PRODOTTI VALUES (15, 'Kelloggs Barretta Mandorle e Cioccolato', 'Snack', 'Barretta di arachidi, mandorle e avena con pezzi di cioccolato su una base al cioccolato.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_4186804/prod_img-4809401_barretta-mandorle-e-cioccolato.jpg');
INSERT INTO PRODOTTI VALUES (16, 'Kelloggs Barretta Mandorle, Miele e Semi', 'Snack', 'Barretta di arachidi, mandorle, semi e avena con miele', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_6536525/prod_img-6553113_barretta-mandorle-miele-e-semi.jpg');
INSERT INTO PRODOTTI VALUES (17, 'Kelloggs Barretta Mandorle e Caramello al Sale Marino', 'Snack', 'Barretta di cereali con arachidi, mandorle e avena con caramello salato al sale marino.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_9765614/prod_img-12175160_barretta-mandorle-e-caramello-al-sale-marino.jpg');
INSERT INTO PRODOTTI VALUES (18, 'Kelloggs Barretta Mandorle e Cioccolato al Latte', 'Snack', 'Barretta di arachidi, mandorle e avena con cioccolato al latte.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_6580178/prod_img-9263450_barretta-mandorle-e-cioccolato-al-latte.jpg');
INSERT INTO PRODOTTI VALUES (19, 'Kelloggs Barretta Mandorle e Frutta', 'Snack', 'Barretta di arachidi, mandorle, pezzi di mirtilli rossi, uvetta e avena.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_4186803/prod_img-4809400_barretta-mandorle-e-frutta.jpg');
INSERT INTO PRODOTTI VALUES (20, 'All-Bran Barretta cioccolato', 'Snack', 'Barretta di cereali con frumento e fibra di avena, arricchita con crusca di frumento e pezzi di cioccolato, con aggiunta di vitamine (niacina, B6, B2, B1, acido folico, D, B12) e ferro.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_253576/prod_img-253710_all-bran-new.png');
INSERT INTO PRODOTTI VALUES (21, 'Krave Choco Brownie', 'Cereali', 'Dedicato a tutti gli amanti del cioccolato alla ricerca di un esperienza di gusto unica. Il nostro ultimo lancio, Krave gusto Choco Brownie, è un nuovo, entusiasmante modo per gustare un ricco e delizioso brownie in un croccante cereale.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_3352658/prod_img-3890066_05059319029221_c1l1.png');
INSERT INTO PRODOTTI VALUES (22, 'Krave Choco Nut', 'Cereali', 'Se ti va il cioccolato, amerai questi croccanti fagottini di riso, avena e frumento ripieni con una deliziosa crema di cioccolato e nocciole. Per i Chocovores più spietati!', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_253597/prod_img-253865_krave_choco_nut.jpg');
INSERT INTO PRODOTTI VALUES (23, 'Krave Cookies & Cream Flavour', 'Cereali', 'La gamma Kellogg’s Krave si arricchisce di un gusto irresistibile, Cookies and Cream Flavour. Con buonissimo ripieno al gusto di crema all’interno di cereali croccanti al cacao: ti farà impazzire!', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_12195006/prod_img-1004307_05059319016900_a1l1.jpg_j.png');
INSERT INTO PRODOTTI VALUES (24, 'Krave Choco Roulette', 'Cereali', 'Cioccolato bianco, al latte e con nocciola. Tre esplosivi sapori che potrai trovare all’interno di questi croccanti fagottini di riso, avena e frumento, Quale ti toccherà adesso?', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_2794331/prod_img-10475562_krave_roulette.jpg');
INSERT INTO PRODOTTI VALUES (25, 'Krave Milk Choco', 'Cereali', 'Sul cioccolato al latte tutti siamo d’accordo, vero? È sempre buonissimo! Prova questi deliziosi e croccanti fagottini di riso, avena e frumento ripieni di cremoso cioccolato al latte.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_253598/prod_img-253872_krave_milk_choco.jpg');
INSERT INTO PRODOTTI VALUES (26, 'Rice Krispies', 'Cereali', 'Riso soffiato che riempirà la tua colazione con il miglior gusto per aiutarti a cominciare la giornata alla grande. Con vitamine e minerali.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_4508660/kicproductimage-127505_kicproductimage-127505.jpg');
INSERT INTO PRODOTTI VALUES (27, 'Miel Pops Anellini', 'Cereali', 'Divertenti anellini di avena, frumento, orzo e segale, con tutta la bontà del miele. Porta il miglior gusto alla tua colazione! Con vitamine, minerali e miele.', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_253595/prod_img-253856_prod_img-253856.png');
INSERT INTO PRODOTTI VALUES (28, 'Corn Flakes', 'Cereali', 'Fiocchi di mais con aggiunta di vitamine niacina, B6, B2, B1, acido folico, D, B12 e ferro', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_449/prod_img-198128_prod_img-198128.png');
INSERT INTO PRODOTTI VALUES (29, 'Special K Barretta Cioccolato Fondente', 'Snack', 'Barretta di frumento integrale con cereali e pezzi di cioccolato su una base al cioccolato, con aggiunta di vitamine (niacina, B6, acido folico)', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_6536561/prod_img-697846_kelloggs-special-k-barretta-cioccolato-fondente.png');
INSERT INTO PRODOTTI VALUES (30, 'Special K Barretta Cioccolato al Latte', 'Snack', 'Barretta di frumento integrale con cereali e pezzi di cioccolato al latte su una base al cioccolato al latte, con aggiunta di vitamine (niacina, B6 e acido folico).', 'https://images.kglobalservices.com/www.kelloggs.it/it_it/product/product_253645/prod_img-4456872_special_k_barretta_cioccolato_al_latte.jpg');

SELECT * FROM PRODOTTI;


DROP TABLE PREFERITI;

CREATE TABLE PREFERITI(
	email VARCHAR(255),
    prodotto INTEGER,
    PRIMARY KEY(email, prodotto)
);

SELECT *FROM PREFERITI;
