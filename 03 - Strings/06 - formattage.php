<?php

echo "<h2>printf():</h2>";

/*
  int printf ( string $format [, mixed $args [, mixed $... ]] )
  
  Retourne la taille de la cha�ne affich�e. 
*/
var_dump(M_PI);
printf("La valeur arrondie de pi vaut %d <br>", M_PI); // La valeur arrondie de pi vaut 3
printf("%d fois %d vaut %d <br>", 2, 3, 2*3);  // 2 fois 3 vaut 6
printf("La valeur de pi vaut %f <br>", M_PI); // La valeur de pi vaut 3.141593 (pr�cision par d�faut) 
printf("La valeur de pi vaut %s <br>", M_PI); // La valeur de pi vaut 3.1415926535898 
printf("notation scientifique:%e <br>", 150000);  // notation scientifique:1.500000e+5 

// Binaire:
printf("9 en binaire s'�crit %b <br>", 9);  // 9 en binaire s'�crit 1001 
// Octal:
printf("37 en octal s'�crit %o <br>", 37);  // 37 en octal s'�crit 45 (4*8e1 + 5*8e0) 

// Padding: on d�finit la longueur (ici, 6) et on remplit avec le nombre de z�ros n�cessaires:
printf("test: %06s <br>", 123);     //000123 
printf("test: %06s <br>", 12345);   //012345 
printf("test: %06s <br>", 123456);  //123456 
// les z�ros sont mis � droite si signe n�gatif apr�s le z�ro
printf("test: %0-6s <br>", 123);    //123000 

// on peut utiliser d'autres caract�res que le z�ro, en mettant un "'" devant celui-ci:
printf("test: %'#6s <br>", 123);  //###123 
printf("test: %'x6s <br>", 123);  //xxx123  

// padding � la droite => faire suivre le symbole d'un signe "-"
 printf("test: %'#-6s <br>", 123);  //123### 

 // si on ne pr�cise rien, on remplit avec des espaces par d�faut:
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



// Pr�cision des floats:
printf("La valeur arrondie de pi vaut %.2f <br>", M_PI);  //La valeur arrondie de pi vaut 3.14 
printf("La valeur arrondie de pi vaut %.10f <br>", M_PI); //La valeur arrondie de pi vaut 3.1415926536 

// cela fonctionne sur les strngs aussi:
printf("%.8s <br>", "Hello, World!"); //la cha�ne est tronqu�e en fonction du facteur de pr�cision => Hello, W 

// Il est possible de pr�ciser l'ordre des param�tres: apr�s le %, ajouter la position suivi du signe $:
$mailbox = "Inbox";
$totalMessages = 36;
$unreadMessages = 4;
printf('Your %2$s contains %3$d unread messages, and %1$d messages in total.', $totalMessages, $mailbox, $unreadMessages );  //Your Inbox contains 4 unread messages, and 36 messages in total.

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>sprintf():</h2>";

// Fonctionne exactement comme printf, sauf qu'elle retourne la cha�ne format�e au lieu de l'afficher directement

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
    
    �crit la cha�ne produite avec le format format dans le flux repr�sent� par handle. 
*/


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>sscanf():</h2>";

/*
	mixed sscanf ( string $str , string $format [, mixed &$... ] )
	
	sscanf() est l'inverse de la fonction printf(). sscanf() lit des donn�es dans la cha�ne str, et l'interpr�te en fonction du format format, qui est d�crit dans la documentation de la fonction sprintf(). 
	
	
*/

$str = '12345';

var_dump( sscanf($str, '%d') );	// array(12345)
var_dump( sscanf($str, '%d%d%d') ); // array(12345, null, null)
var_dump( sscanf($str, '%1d%1d%1d%1d%1d') ); 	// array(1, 2, 3, 4, 5)


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> trim(), ltrim(), and rtrim():</h2>";

/*
  string trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] ): Supprime les espaces (ou d'autres caract�res) en d�but et fin de cha�ne 
  string ltrim ( string $str [, string $character_mask ] ): Supprime les espaces (ou d'autres caract�res) de d�but de cha�ne
  string rtrim ( string $str [, string $character_mask ] ): Supprime les espaces (ou d'autres caract�res) de fin de cha�ne
  
  Il est aussi possible de sp�cifier les caract�res � supprimer en utilisant le param�tre character_mask. 
  Listez simplement les caract�res que vous voulez supprimer dans ce param�tre. Avec .., vous   pourrez sp�cifier des intervalles de caract�res. 
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

// compl�te la cha�ne � droite pour atteindre 20 caract�res (espace par d�faut)
var_dump( str_pad( "Hello, world!", 20) ); // 'Hello, world!       ' 
// Ici, on pr�cise le caract�re de remplissage
var_dump( str_pad( "Hello, world!", 20, '*') ); // 'Hello, world!*******' 
// par d�faut, le remplissage se fait � droite (STR_PAD_RIGHT), mais on peut le faire � gauche (STR_PAD_LEFT) ou des deux c�t�s (STR_PAD_BOTH):
var_dump( str_pad( "Hello, world!", 20, '*', STR_PAD_LEFT) ); // '*******Hello, world!'
var_dump( str_pad( "Hello, world!", 20, '*', STR_PAD_BOTH) ); // '***Hello, world!****'

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> wordwrap():</h2>";

/*
  string wordwrap ( string $str [, int $width = 75 [, string $break = "\n" [, bool $cut = false ]]] )
  
  Effectue la c�sure d'une cha�ne
  
  - width: Le nombre de caract�res � partir duquel la cha�ne sera coup�e. 
  - break: param�tre de retour ligne
  - cut: Si le param�tre cut vaut TRUE, la c�sure de la cha�ne sera toujours � la taille width ou avant. Si vous avez un mot qui est plus long que la taille de c�sure, il sera coup� en morceaux : voir le second exemple. Lorsque vaut FALSE, la fonction ne va pas couper le mot, m�me si le param�tre width est plus petit que la taille du mot. 
*/

$nuut = "Alexis a deux ans et va � la cr�che tous les jours, sauf le lundi et le mercredi.";

echo wordwrap($nuut, 20, "<br>");
echo "<br><br>";
$text = "Un mot tr�s tr�s loooooooooooooooooong.";
echo wordwrap($text, 10, "<br>");
echo "<br><br>";
echo wordwrap($text, 10, "<br>", true); // le mot long sera coup� � 10 caract�res


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> number_format():</h2>";

/*
  string number_format ( float $number [, int $decimals = 0 ] )
  string number_format ( float $number , int $decimals = 0 , string $dec_point = "." , string $thousands_sep = "," )
  
  Accepte un, deux, ou quatre param�tres (et pas trois).
*/

$nb = 12346.789132;

// Si seul le param�tre number est donn�, il sera format� sans partie d�cimale, mais avec une virgule entre chaque millier;
var_dump( number_format($nb) ); //'12,347'
// Si les deux param�tres number et decimals sont fournis, number sera format� avec decimals d�cimales, un point (".") comme s�parateur d�cimal et une virgule entre chaque millier:
var_dump( number_format($nb, 2) );  // '12,346.79'

var_dump( number_format($nb, 2, ".", "") ); // '12346.79'


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2> md5 ():</h2>";

/*
	string md5 ( string $str [, bool $raw_output = false ] )
	
	Calcule le MD5 de la cha�ne de caract�res str, sous la forme d'un nombre hexad�cimal de 32 caract�res. 
	Si le param�tre optionnel raw_output est d�fini � TRUE, alors le md5 est retourn� au format binaire brut avec une longueur de 16.  
	
*/

