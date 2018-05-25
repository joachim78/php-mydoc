<?php
  // Structures de contrôle
  // ----------------------
  
 echo "1. Conditions<hr>";
 
 if (1==0) echo "Test 1<br>"; echo "Test 2<br>";   // affiche "Test 2"!
 $a = 5;
 $b = 5;
 
if ($a > $b) {
    echo "a est plus grand que b<br>";
} elseif ($a == $b) {  // le if ne doit pas être spécialement collé
    echo "a est égal à b<br>";
} else {
    echo "a est plus petit que b<br>";
}

// Syntaxe alternative:
$b = 1;
if($a > $b):
    echo $a." est plus grand que ".$b."<br>";
elseif($a == $b): // Les deux mots sont collés, sinon:  Parse error: syntax error, unexpected 'if' (T_IF), expecting ':'
    echo $a." égal ".$b."<br>";
else:
    echo $a." est plus grand ou égal à ".$b."<br>";
endif;

// ceci ne fonctionne pas (Parse error: syntax error, unexpected ':' )  - on ne peut pas mélanger les syntaxes
/*
if($a):
    echo $a."<br>";
    if($b) {
      echo $b."<br>";
    }
else:
    echo $c."<br>";
endif;
*/

  //if (3 = $a) echo "a = 3<br>";  génère une erreur:  Parse error: syntax error, unexpected '='
  
  function toto1() {
    echo "toto1<br>";
    return false;
  }
  function toto2() {
    echo "toto2<br>";
    return true;
  }
  
  if (toto1() && toto2()) {  // toto2() ne sera pas appelée si toto1() renvoit false
      echo "ici<br>";
  }
  if (toto1() || toto2()) {  // toto1() et toto2() sont appelées
      echo "ici<br>";
  }
  if (toto2() || toto1()) {  // toto1() n'est pas appelée
      echo "ici<br>";
  }
  
  // comparaison alphabétique
  $a = "abc";
  $b = "abd";
  
  if ($a < $b) echo "$a < $b<br>";
  
  do if ($a)
  {
    // Do something first...
    echo "do...<br>";
    // Shall we continue with this block, or exit now?
    $quit = false;
    if ($quit) break;
    echo "continue doing something...<br>";
    // Continue doing something...
  } while (false);
  
  // expressions ternaires
   $a = "toto";
   $b = $a ? $a : "no value";
   var_dump($b);
   $b = $a ? : "no value";  // écriture simplifiée
   var_dump($b);
   echo ($a) ?: 'No Value<br>';  // affiche toto
   echo "<br>";
  //switch
  $a = 'bar'; 
  switch ($a) {      // affiche "a est une barre"
    case "apple":
        echo "a est une pomme<br>";
        break;
    case "bar":
        echo "a est une barre<br>";
        break;
    case "cake":
        echo "a est un gateau<br>";
        break;
}
  switch ($a) {      // affiche "a est une barre" et "a est un gateau". PHP affiche toutes les instructions qui suivent si on oublie le break! 
    case "apple":
        echo "a est une pomme<br>";
    case "bar":
        echo "a est une barre<br>";
    case "cake":
        echo "a est un gateau<br>";
}
   $i = 6;
  switch ($i) {
    case 0:
    case 1:
    case 2:
        echo "i est plus petit que 3 mais n'est pas négatif<br>";
        break;
    case 3:
        echo "i égal 3";
        break;
    default:
        echo "i vaut ".$i."<br>";
  }
  
  //Il est possible d'utiliser un point-virgule plutôt que deux points après un case:
  $beer = "guinness";
  switch($beer)
  {
    case 'leffe';
    case 'grimbergen';
    case 'guinness';
        echo 'Bon choix<br>';
    break;
    default;
        echo 'Merci de faire un choix...<br>';
    break;
  }
  
  $string="2string";
  switch($string)     // affiche "this is 2"
  {
    case 1:
        echo "this is 1<br>";
        break;
    case 2:
        echo "this is 2<br>";
        break;
    case '2string':
        echo "this is a string<br>";
        break;
  }
    switch($string)     // affiche "this is true"
  {
    case true:
        echo "this is true<br>";
        break;
    case 2:
        echo "this is 2<br>";
        break;
    case '2string':
        echo "this is a string<br>";
        break;
  }
 
  //syntaxe alternative:
  switch ($i):
    case 0:
        echo "i égal 0";
        break;
    case 1:
        echo "i égal 1";
        break;
    case 2:
        echo "i égal 2";
        break;
    default:
        echo "i n'est ni égal à 2, ni à 1, ni à 0<br>";
  endswitch;

  //Notice: Undefined variable: x 
  /*
  switch($x){
    case "a":
        echo "a";
        break;
    case "b":
        echo "b";
        break;
    default:
        echo "default";
        break;
  }     */
  
function ss() {
    switch ("bug") {
        case "bug" :
           static $test = "xyz";
           break;
        default :
           static $test = "abc";
    }
echo $test."<br>";
}
ss(); //abc => pq???

//-------------------------------------------------------------------------
echo "<hr>2. Boucles<hr>";

//While

$i = 0;
while ($i <= 10) {
  echo "i=". $i++ ."<br>";     // affiche 0...10
}
echo "<br>";
$j = 0;
do {
  echo "j=". $j++ ."<br>";  // affiche 0....10
} while ($j <= 10);

echo "<br>";

$k = 0;
while ($k > 0) {
  echo "test while<br>";  // ne s'affichera pas
}
do {
  echo "test do ... while<br>";   // s'affiche car la première itération de la boucle do-while est toujours exécutée (l'expression n'est testée qu'à la fin de l'itération), ce qui n'est pas le cas lorsque vous utilisez une boucle while (la condition est vérifiée dès le début de chaque itération, et si elle s'avère FALSE dès le début, la boucle sera immédiatement arrêtée). 
}  while ($k > 0);  

for ($i=0; $i<=10; $i++) {
  echo "i=". $i ."<br>";   // affiche 0...10
}  

echo "<br>";
 // Ceci fonctionnne:
$i = 0;
for (; ; ) {
    if ($i > 10) {
        break;
    }
    echo "i=". $i++ ."<br>";   // affiche 0...10
}
echo "<br>";
for ($i=0; $i<=10;) {
  echo "i=". $i++ ."<br>";   // affiche 0...10
}

// Boucle sur des lettres: ne fonctionne pas ave "<". Attention! ne pas mélanger minuscules et majuscules, sinon boucle infinie!
// affiche: A B C D E F G H I J K L M N O P Q R S T U V W X Y Z AA AB AC
for ($i = 'A'; $i != 'AD'; $i++) {
  echo $i .' ';
}
echo "<br>";
for ($i=0, $j=1; $i<=10; $i++,$j*=2) {
     echo "i=". $i ." - j = ". $j ."<br>";
}
echo"<br>";
$str = 'Joachim';
for ($i=0; $i<strlen($str); $i++) {
 echo $str[$i] . ' ';
}
 echo "<br>";
//foreach ($str as $key => $val) {}  //Warning: Invalid argument supplied for foreach() : foreach ne fonctionne qu'avec des tableaux ou des objets
$tab = array('a' => 'banane', 'b' => 'pomme', 'c' => 'poire');
$tab2 = array('x' => 'pêche', 'y' => 'fraise', 'z' => 'framboise');
foreach ($tab as $key => $val);
var_dump($key,$val);     // c, poire
foreach($tab as $key => &$val) {  // utiliser le "&" pour utiliser la valeur par référence et non par copie
    $val .= 's';
}
unset($val);

//Lorsque foreach démarre, le pointeur interne du tableau est automatiquement ramené au premier élément du tableau. Cela signifie que vous n'aurez pas à faire appel à reset() avant foreach. 
foreach ($tab2 as $key => $val) {}
//La référence de $value et le dernier élément du tableau sont conservés après l'exécution de la boucle foreach. Il est recommandé de les détruire en utilisant la fonction unset(). 
var_dump($tab);  //affiche array('a' => 'bananes', 'b' => 'pommes', 'c' => 'framboise') si on fait un foreach sur le tab 2!!! => utiliser unset()
var_dump($tab2); 

// le foreach est équivalent à:
reset($tab);  //Remet le pointeur interne de tableau au début
while (list($key, $value) = each($tab)) { //each retourne chaque paire clé/valeur d'un tableau
    echo "Clé : $key; Valeur : $value<br />";
}

//PHP 5.5 => possibilité d'itérer dans un tableau de tableaux, et d'en extraire les tableaux internes dans des variables, en fournissant une liste list() comme valeur. 
$tab = array(
  0 => array('Joachim', 'Deneumostier', 37),
  1 => array('Alexis', 'Deneumostier', 2),
  2 => array('Cédric', 'Etienne', 36)
) ;

foreach ($tab as list($prenom, $nom, $age)) {   // Attention! si par ex list($prenom, $nom, $age, $addresse) => Notice: Undefined offset: 3
  echo $prenom .' ' .$nom .' : ' . $age .' ans<br>'; 
}
foreach ($tab as list(, $nom, $age)) {
  echo $nom .' : ' . $age .' ans<br>'; 
}   

// Pour des tableaux multidimensionnels, on peut imbriquer des list():
$array = [
    [1, 2, array(3, 4)],
    [3, 4, array(5, 6)],
];
 // affiche: A= 1; B= 2; C= 3; D= 4; 
 // A= 3; B= 4; C= 5; D= 6;
foreach ($array as list($a, $b, list($c, $d))) {
    echo "A= $a; B= $b; C= $c; D= $d;<br>"; 
};

?>