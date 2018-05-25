<?php
  // echo
  
  $a = "Joachim";
  $b = "Deneumostier";
  $c = "37";
  $tab = array('toto' => 10, 'riri' => 8);
  
  echo "1 - echo<hr>";
  echo $a,$b,$c; //JoachimDeneumostier37; 
  //echo ($a,$b,$c);  //Parse error: syntax error, unexpected ',': si on passe plusieurs param, les parenthèses ne doivent pas être utilisées
  echo "<br>";
  echo ($a);  //Joachim
  echo "<br>";
  //var_dump(echo $b);  //Parse error: syntax error, unexpected 'echo' (T_ECHO) car echo() ne se comporte pas comme une fonction
  echo "$a $b a $c ans<br>";  //Joachim Deneumostier a 37 ans
  echo '$a $b a $c ans<br>';  //$a $b a $c ans
  echo "{$a} {$b} a {$c} ans<br>";  //Joachim Deneumostier a 37 ans
  //echo $tab; //Notice: Array to string conversion 
  echo "riri a " . $tab['riri'] . " ans<br>"; //riri a 8 ans 
  echo "toto a {$tab['toto']} ans<br>"; // les {} sont obligatoires sinon erreur: Parse error: syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) 
  
  // parce que echo() ne se comporte pas comme une fonction, le code suivant n'est pas valide:
  //$a ? echo "true" : echo "false";  //Parse error: syntax error, unexpected 'echo' (T_ECHO)
  echo $a ? "true<br>" : "false<br>"; //"true"
  
  echo "<hr>2 - print<hr>";
  // print: retourne tjs 1
  print($a);  //Joachim
  echo "<br>";
  //print ($a,$b,$c); // ne fonctionne pas: Parse error: syntax error, unexpected ',' 
  //print $a,$b,$c; // ne fonctionne pas: Parse error: syntax error, unexpected ','
  //print $tab; //Notice: Array to string conversion
  $a ? print "true<br>" : print "false";  //true
  print $a == 'toto' ? "true<br>" : "false<br>"; //"false"

  print print ""; //1
  print "<br>";
  //print print; // ne fonctionne pas: Parse error: syntax error, unexpected ';' 
  print "<br>";  
  print (print("bar")); //bar1
  print "<br>";
  if (print("foo") && print("bar")) {  // bar1: le premier print équivaut à print ("foo" && "bar") => 1
    // "foo" and "bar" had been printed
  } 
  print "<br>";
  if ((print "foo") && (print "bar")) {}  //foobar 
  print "<br>";
  print(1 + 2) + 3;  //6
  print "<br>";
  print(7). 'b' .print(8) . 'a'; //: print de droite à gauche: 8a7b1
  print "<br>";
  print(6). 'c' .print(7). 'b' .print(8) . 'a'; //  8a7b16c1
  print "<br>";
  print(5). 'd' .print(6). 'c' .print(7). 'b' .print(8) . 'a'; //8a7b16c15d1
  
  echo "<hr>3 - die() & exit() & return<hr>";
  //die("fin du script avec die");
  //exit("fin du script avec exit");
  //return "fin du script avec return"; // le script est arrêté mais rien n'est affiché

  echo "<hr>empty()<hr>";  
  // avant PHP 5.5, empty ne supportait que des variables!

  var_dump(empty(''));  //true
  var_dump(empty(0));   //true
  var_dump(empty('0')); //true
  var_dump(empty(0.0)); //true
  var_dump(empty(null));  //true
  var_dump(empty(false)); //true
  var_dump(empty(array())); //true
  var_dump(empty($test)); //variable non assignée => true
  var_dump(empty(new stdClass()));  //false
  var_dump(empty("0.0"));  //false

  function toto() {
    return '';
  }
  $func = 'toto';
  var_dump( empty(toto()) );  // TRUE : Avant PHP 5.5, la fonction empty() ne supportait que les variables ; tout autre type retournait une erreur d'analyse
  echo "fct variable:<br>";
  var_dump(empty($func())); // >= PHP 5.5!
  $str = "ma chaine";
  var_dump(empty($str[1]));	//false (vaut "a")
  var_dump(empty($str['1']));	//false (vaut "a")
  var_dump(empty($str[100])); //true (vaut "")
  var_dump(empty($str['position1'])); //true >= PHP 5.4
  echo 'empty( ($str) )<br>'; 
  var_dump( empty( ($str) ) );	// Parse error: syntax error, unexpected '(' => fonctionne sous PHP 5.5!
  
  $tab = array(1,2,3);
  var_dump(empty($tab[4]));	//true
  
  echo "<hr>isset()<hr>"; //Détermine si une variable est définie et est différente de NULL
  //var_dump(isset(5));  Parse error: syntax error, unexpected '5' (T_LNUMBER) => Ne fonctionne pas sous PHP 5.5!
  $a = false;
  $b = '';
  $c = 0;
  $d = '0';
  $e = null;
  $f = 10; 
  $g = "\0";	// caractère NULL

  var_dump(isset($a,$b,$c,$d));	//true
  var_dump(isset($a,$b,$c,$d,$e,$f));	//False car si plusieurs paramètres sont fournis, alors la fonction isset() retournera TRUE seulement si tous les paramètres sont définis.
  var_dump(isset($f));	//true
  unset($f);
  var_dump(isset($f));	//false
  var_dump(isset($g));	//true
  var_dump(isset($str[1]));	//true
  var_dump(isset($str[100]));	//false
  var_dump(isset($str['position1'])); //false >= PHP 5.4 
  var_dump(isset($tab[4]));	//false
  //var_dump(isset( ($tab) ));	Parse error: syntax error, unexpected '(' => A tester sous PHP 5.5! => Cannot use isset() on the result of an expression
  //var_dump(isset(toto())); //Can't use function return value in write context => ne fonctionne pas sous PHP 5.5!
	//var_dump(isset($func()));	=> ne fonctionne pas sous PHP 5.5!
  
  echo "<hr>eval()<hr>";	//Exécute une chaîne comme un script PHP; La construction de langage eval() est très dangereuse car elle autorise l'exécution de code PHP arbitraire. Son utilisation est vivement déconseillée
   /*
  eval("echo 'hello, world!<br>';");	// affiche "hello,world!"
  //eval("<?php echo 'hello, world!<br>';");	// les balises php ne doivent pas être utilisées =>  Parse error: syntax error, unexpected '<' 
  //eval('?>'.$str.'<?php;'); // affiche "test"!
  */

	echo "<hr>include / include_once<hr>";	
  include 'include/include_vars.php';	// les parenthèses ne sont pas nécessaires
  var_dump($includedVar);	//'toto is included' 
  //include 'does_not_exists.php';	// génère un warning: Warning: include(does_not_exists.php): failed to open stream; renvoit false
  var_dump(include 'include/return.php');	// 'coucou';
  var_dump(include 'include/no_return.php');	//1 car l'inclusion est réussie
	
	function apple() {
		include 'include/include_in_fct.php';
		echo "une pomme " . $color . "<br>";
	}
	apple();	//une pomme verte
	//echo "une pomme " . $color . "<br>";	//Notice: Undefined variable: color: le script étant inclus dans la fonction, la portée des var est limitée à cette fonction 
	
	for ($i=1; $i <4; $i++) {
	echo "i=".$i."<br>";
     var_dump(include_once 'include/include_once_only.php'); //renvoit 1 la première fois , true après
  }
  
  //var_dump(include_once 'include/fake.php');  //false
  //var_dump(include_once 'include/fake.php');  //false
	
	echo "<hr>require / require_once<hr>";	 // fonctionne comme include, sauf qu'il génère une fatal si le fichier n'existe pas
	
	//require 'include/fake.php';  // Fatal error: require(): Failed opening required 'include/fake.php'
	
echo "<hr>unset()<hr>";
$a = 5; $b = 10; $c = 15;
unset($a,$b,$c);
var_dump($a,$b,$c); //null - génère un warning:  Undefined variable: a in ...

$nuut = "plop";
function destroyVariable() {
  global $nuut;
  $nuut = 'inside';
  var_dump($nuut);
  unset($nuut); //Si une variable globale est détruite avec unset() depuis une fonction, seule la variable locale sera détruite
}

destroyVariable();
var_dump($nuut);

$bip = 'bip';
function foo() {
   unset($GLOBALS['bip']);  //Pour détruire une variable globale à l'intérieur d'une fonction
}
foo();
var_dump($bip);   //null

function destroyReferenceVar(& $var) {
  var_dump($var); //muche
  unset($var); //Si une variable qui est passée par référence est détruite à l'intérieur d'une fonction, seule la variable locale sera détruite. La variable globale conservera la même valeur qu'elle avait avant l'appel de unset(). 
  //var_dump($var); //null
  $var = "truc";
}
$var = "muche";
destroyReferenceVar($var); 
var_dump($var); //muche

//Si une variable statique est détruite à l'intérieur d'une fonction unset() détruira la variable seulement dans le contexte du reste de la fonction. 
//Les appels suivants restaureront la valeur précédente de la variable. 
function destroyStaticVar() {
  static $brol;
  $brol++;
  echo "avant unset: ".$brol."<br>";
  unset($brol);
  $brol = 100;
  echo "après unset: ".$brol."<br>";
}
 destroyStaticVar();
 destroyStaticVar();
 destroyStaticVar();
 
 $name = "Jacques";
 var_dump((unset)$name);  // transtypé en NULL
 var_dump($name); //Jacques
 
 echo "<hr>list()<hr>";
 $tab = array('Peugeot', '308 SW', '2008');
 list($marque, $modele, $annee) = $tab;
 var_dump($marque, $modele, $annee);  //'Peugeot', '308 SW', '2008' 
 unset($marque, $modele, $annee);
 list($marque) = $tab;
 var_dump($marque);  //Peugeot
 list(, , $annee) = $tab;
 var_dump($annee);  //2008
 $tab1 = array('Citroen', 'CX', '1980'); 
 list($marque, $modele, $année, $carburant) = $tab1; // Undefined offset: 3
 var_dump($marque, $modele, $année, $carburant); // Citroen, CX, 1980, null
 
 // nested list
 list($a, list($b, $c)) = array(1, array(2, 3));
 var_dump($a,$b,$c);  // 1,2,3
 
 list($tab2[0], $tab2[1], $tab2[2]) = $tab;
 var_dump($tab2); //array(2 => '2008', 1 => '308 SW', 0 => 'Peugeot') - PHP commence par assigner la valeur la plus à droite
 list($tab3[0], $tab3[1], $tab3[0]) = $tab; // array(0 => 'Peugeot', 1 => '308 SW')
 var_dump($tab3);
 // list() fonctionne uniquement avec des tableaux à indexation numérique, et suppose que l'indexation commence à 0
 $tab4 = array ("marque" => "Opel", "modele" => "Corsa", "annee" => 1987);
 //list($ma, $mo, $an) = $tab4;  //null
 $tab5 = array(1 => 'Ford', 2 => 'Taunus', 3 => 1978);
//list($ma, $mo, $an) = $tab5; // Undefined offset: 0 
//var_dump($ma, $mo, $an);  // null, Ford, Taunus
 $tab5 = array(0 => 'Ford', 2 => 'Taunus', 3 => 1978);
 //list($ma, $mo, $an) = $tab5; // Undefined offset: 1 
 //var_dump($ma, $mo, $an); //Ford, null, Taunus


?>
