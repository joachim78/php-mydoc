<?php

echo "<h2>printf():</h2>";

/*
  int printf ( string $format [, mixed $args [, mixed $... ]] )
  
  Retourne la taille de la chaîne affichée. 
*/
var_dump(M_PI);
printf("La valeur arrondie de pi vaut %d <br>", M_PI); // La valeur arrondie de pi vaut 3
printf("%d fois %d vaut %d <br>", 2, 3, 2*3);  // 2 fois 3 vaut 6
printf("La valeur de pi vaut %f <br>", M_PI); // La valeur de pi vaut 3.141593 (précision par défaut) 
printf("La valeur de pi vaut %s <br>", M_PI); // La valeur de pi vaut 3.1415926535898 
printf("notation scientifique:%e <br>", 150000);  // notation scientifique:1.500000e+5 

// Binaire:
printf("9 en binaire s'écrit %b <br>", 9);  // 9 en binaire s'écrit 1001 
// Octal:
printf("37 en octal s'écrit %o <br>", 37);  // 37 en octal s'écrit 45 (4*8e1 + 5*8e0) 

// Padding: on définit la longueur (ici, 6) et on remplit avec le nombre de zéros nécessaires:
printf("test: %06s <br>", 123);     //000123 
printf("test: %06s <br>", 12345);   //012345 
printf("test: %06s <br>", 123456);  //123456 
// les zéros sont mis à droite si signe négatif après le zéro
printf("test: %0-6s <br>", 123);    //123000 

// on peut utiliser d'autres caractères que le zéro, en mettant un "'" devant celui-ci:
printf("test: %'#6s <br>", 123);  //###123 
printf("test: %'x6s <br>", 123);  //xxx123  

// padding à la droite => faire suivre le symbole d'un signe "-"
 printf("test: %'#-6s <br>", 123);  //123### 

 // si on ne précise rien, on remplit avec des espaces par défaut:
 /*
           Hi
        Hello
Hello, world!
           123456789
 */
echo "<pre>";
printf( "%15s\n", "Hi" );
printf( "%15s\n", "Hello" );
printf( "%15s\n", "Hello, world!" );
printf("%20d <br>", 123456789);
echo "</pre>";

/*
Hi             
Hello          
Hello, world!  
*/
echo "<pre>";
printf( "%-15s\n", "Hi" );
printf( "%-15s\n", "Hello" );
printf( "%-15s\n", "Hello, world!" );
echo "</pre>";



// Précision des floats:
printf("La valeur arrondie de pi vaut %.2f <br>", M_PI);  //La valeur arrondie de pi vaut 3.14 
printf("La valeur arrondie de pi vaut %.10f <br>", M_PI); //La valeur arrondie de pi vaut 3.1415926536 

// cela fonctionne sur les strngs aussi:
printf("%.8s <br>", "Hello, World!"); //la chaîne est tronquée en fonction du facteur de précision => Hello, W 

// Il est possible de préciser l'ordre des paramètres: après le %, ajouter la position suivi du signe $:
$mailbox = "Inbox";
$totalMessages = 36;
$unreadMessages = 4;
printf('Your %2$s contains %3$d unread messages, and %1$d messages in total.', $totalMessages, $mailbox, $unreadMessages );  //Your Inbox contains 4 unread messages, and 36 messages in total.

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>sprintf():</h2>";

// Fonctionne exactement comme printf, sauf qu'elle retourne la chaîne formatée au lieu de l'afficher directement

$mailbox = "mailbox";
$totalMessages = 65;
$unreadMessages = 15;
$str = sprintf('Your %2$s contains %3$d unread messages, and %1$d messages in total.', $totalMessages, $mailbox, $unreadMessages );
var_dump($str); // 'Your mailbox contains 15 unread messages, and 65 messages in total.'

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>vprintf() et vsprintf():</h2>";

/*
  int vprintf ( string $format , array $args )
  string vsprintf ( string $format , array $args )
  
  vprintf() fonctionne comme printf(), mais accepte un tableau comme argument, au lieu d'une liste d'arguments.
  vsprintf() fonctionne comme sprintf(), mais accepte un tableau comme argument, au lieu d'une liste d'arguments.  
*/

vprintf('Your %2$s contains %3$d unread messages, and %1$d messages in total.', array($totalMessages, $mailbox, $unreadMessages) ); //Your mailbox contains 15 unread messages, and 65 messages in total.

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>fprintf():</h2>";

/*
    int fprintf ( resource $handle , string $format [, mixed $args [, mixed $... ]] )
    
    Écrit la chaîne produite avec le format format dans le flux représenté par handle. 
*/


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>sscanf():</h2>";

/*
	mixed sscanf ( string $str , string $format [, mixed &$... ] )
	
	sscanf() est l'inverse de la fonction printf(). sscanf() lit des données dans la chaîne str, et l'interprète en fonction du format format, qui est décrit dans la documentation de la fonction sprintf(). 
	
	
*/

$str = '12345';

var_dump( sscanf($str, '%d') );	// array(12345)
var_dump( sscanf($str, '%d%d%d') ); // array(12345, null, null)
var_dump( sscanf($str, '%1d%1d%1d%1d%1d') ); 	// array(1, 2, 3, 4, 5)


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> trim(), ltrim(), and rtrim():</h2>";

/*
  string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] ): Supprime les espaces (ou d'autres caractères) en début et fin de chaîne 
  string ltrim ( string $str [, string $character_mask ] ): Supprime les espaces (ou d'autres caractères) de début de chaîne
  string rtrim ( string $str [, string $character_mask ] ): Supprime les espaces (ou d'autres caractères) de fin de chaîne
  
  Il est aussi possible de spécifier les caractères à supprimer en utilisant le paramètre character_mask. 
  Listez simplement les caractères que vous voulez supprimer dans ce paramètre. Avec .., vous   pourrez spécifier des intervalles de caractères. 
*/

$toto = "   1:   Chapitre   ";
var_dump( trim($toto) );  //'1.   Chapitre'
$toto = "1:Chapitre un";
var_dump( ltrim($toto, "0..9:") );  // 'Chapitre un'


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> str_ pad():</h2>";

/*
    string str_pad ( string $input , int $pad_length [, string $pad_string = " " [, int $pad_type = STR_PAD_RIGHT ]] )
*/

// complète la chaîne à droite pour atteindre 20 caractères (espace par défaut)
var_dump( str_pad( "Hello, world!", 20) ); // 'Hello, world!       ' 
// Ici, on précise le caractère de remplissage
var_dump( str_pad( "Hello, world!", 20, '*') ); // 'Hello, world!*******' 
// par défaut, le remplissage se fait à droite (STR_PAD_RIGHT), mais on peut le faire à gauche (STR_PAD_LEFT) ou des deux côtés (STR_PAD_BOTH):
var_dump( str_pad( "Hello, world!", 20, '*', STR_PAD_LEFT) ); // '*******Hello, world!'
var_dump( str_pad( "Hello, world!", 20, '*', STR_PAD_BOTH) ); // '***Hello, world!****'

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> wordwrap():</h2>";

/*
  string wordwrap ( string $str [, int $width = 75 [, string $break = "\n" [, bool $cut = false ]]] )
  
  Effectue la césure d'une chaîne
  
  - width: Le nombre de caractères à partir duquel la chaîne sera coupée. 
  - break: paramètre de retour ligne
  - cut: Si le paramètre cut vaut TRUE, la césure de la chaîne sera toujours à la taille width ou avant. Si vous avez un mot qui est plus long que la taille de césure, il sera coupé en morceaux : voir le second exemple. Lorsque vaut FALSE, la fonction ne va pas couper le mot, même si le paramètre width est plus petit que la taille du mot. 
*/

$nuut = "Alexis a deux ans et va à la crèche tous les jours, sauf le lundi et le mercredi.";

echo wordwrap($nuut, 20, "<br>");
echo "<br><br>";
$text = "Un mot très très loooooooooooooooooong.";
echo wordwrap($text, 10, "<br>");
echo "<br><br>";
echo wordwrap($text, 10, "<br>", true); // le mot long sera coupé à 10 caractères


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> number_format():</h2>";

/*
  string number_format ( float $number [, int $decimals = 0 ] )
  string number_format ( float $number , int $decimals = 0 , string $dec_point = "." , string $thousands_sep = "," )
  
  Accepte un, deux, ou quatre paramètres (et pas trois).
*/

$nb = 12346.789132;

// Si seul le paramètre number est donné, il sera formaté sans partie décimale, mais avec une virgule entre chaque millier;
var_dump( number_format($nb) ); //'12,347'
// Si les deux paramètres number et decimals sont fournis, number sera formaté avec decimals décimales, un point (".") comme séparateur décimal et une virgule entre chaque millier:
var_dump( number_format($nb, 2) );  // '12,346.79'

var_dump( number_format($nb, 2, ".", "") ); // '12346.79'


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> md5 ():</h2>";

/*
	string md5 ( string $str [, bool $raw_output = false ] )
	
	Calcule le MD5 de la chaîne de caractères str, sous la forme d'un nombre hexadécimal de 32 caractères. 
	Si le paramètre optionnel raw_output est défini à TRUE, alors le md5 est retourné au format binaire brut avec une longueur de 16.  
	
*/

