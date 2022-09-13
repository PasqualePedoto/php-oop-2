<!-- 
Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche.
L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
Il pagamento avviene con la carta di credito, che non deve essere scaduta.
BONUS:
Alcuni prodotti (es. antipulci) avranno la caratteristica che saranno disponibili solo in un periodo particolare (es. da maggio ad agosto).
NOTE:
Lo scopo di questo esercizio è farvi ragionare su quali classi utilizzare, quali proprietà e metodi dovrebbero avere e come sono relazionate
tra loro anche in termini di ereditarietà. Cercate di fare molta analisi, magari facendo uno schemino delle classi e delle loro proprietà e 
metodi su draw.io e solo dopo passate al codice. Meglio un'analisi fatta bene che del codice scritto male.
Non preoccupatevi se non riuscite a finirlo, purchè sia fatto bene fin dove arrivate. 
-->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Includiamo il file .php dedicato alle classi

include_once __DIR__ . '/models/Card.php';
include_once __DIR__ . '/models/RegisteredUser.php';
include_once __DIR__ . '/models/Doghouse.php';
include_once __DIR__ . '/models/FoodProduct.php';
include_once __DIR__ . '/models/Order.php';
include_once __DIR__ . '/models/ToysProduct.php';
include_once __DIR__ . '/models/Cart.php';

// Istanziamo il carrello
$card = new Card('1111222233334444','11/23',121);

$card->setBalance(2000);;

// Istanziamo l'utente
$user = new User('Pasquale','Pedoto');

// Istanziamo i prodotti
$croccantini = new FoodProduct('cibo','per mangiare',78,'12/23','sempre');
$gioco = new ToysProduct('gioco','per giocare',20,'stoffa','20x34');
$cuccia = new Doghouse('cuccia','per dormire',90,'190x75','blue','plastica');

// Aggiungiamo i prodotti al carrello
$user->addToCart($croccantini);
$user->addToCart($gioco);
$user->addToCart($cuccia);

// Indirizzo

$address = new Address('Milano',83018,'Via Cesinola',23,'Italy');

echo '<pre>';
var_dump($card);
echo '</pre>';

echo '<pre>';
var_dump($user->placeOrder($card,$address));
echo '</pre>';

echo '<pre>';
var_dump($card);
echo '</pre>';


?>