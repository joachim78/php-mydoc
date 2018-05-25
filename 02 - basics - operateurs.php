<?php

  /*
  1. Op�rateurs arithm�tiques
  ---------------------------
  */
  
  //additions
  echo "5" + "2"."<br>"; //7
  echo '5' + '2'."<br>"; //7
  echo 5 + "test" . "<br>"; //5 (la string est cast�e en int => 0)
  echo "test" + 5 . "<br>"; //5
  echo "test" + "php". "<br>"; //0 (les deux strings sont cast�es en int => 0)
  echo "test1" + "test2" ."<br>"; //0 (les deux strings sont cast�es en int => 0)
  echo "1test" + "2test" ."<br>"; //3! car les strings commencent par un chiffre...
  echo 1 + true ."<br>"; //2 car true est cast� en int (1)
  echo 1 + null ."<br>"; //1
  //echo $s = 5 + array(1);  //Fatal error: Unsupported operand types
  echo "10.25" + "5.75" ."<br>";  //16
  echo '10.25' + '5.75';  //16

  //modulos
  var_dump(50%3); //2
  var_dump(11%4); //3
  //var_dump(11%"test"); // fatal: division par 0
  var_dump(5%"2test"); //1 car "2test" => 2
  
  /*
  2. Op�rateurs de bits
  ---------------------
  */
  
  /*
    Syst�me binaire:
    Ex: 
      5 => 0101 = 0*2� + 1*2� + 0*2exp1 + 1*2exp0 = 0 + 4 + 0 + 1
      7 => 0111
      25 => 1*2exp4 + 1x2� + 0x2� + 0x2exp1 + 1*2exp0 = 11001
  */
  
   var_dump(decbin(5)); //101
   var_dump(decbin(7)); //111
   var_dump(decbin(25)); //11001
   var_dump(decbin(17)); //10001
   var_dump(0b110); //6 (notation base 2)
   var_dump(110) ;  //110
   
   /*
    Addition
     --------

     L'addition en binaire se fait avec les m�mes r�gles qu'en d�cimale :
     On commence � additionner les bits de poids faible (les bits de droite)
     puis on a des retenues lorsque la somme de deux bits de m�me poids d�passe la valeur de l'unit� la plus grande (dans le cas du binaire : 1), 
     cette retenue est report�e sur le bit de poids plus fort suivant... 
     Ex:
       10001 (=17)
     + 00101 (=5)
     -------
     = 10110 (=22)

    Soustraction
    ------------
    
    - R�gle n� 1 : 0 - 0 = 0 ;
    - R�gle n� 2 : 1 - 1 = 0 ;
    - R�gle n� 3 : 1 - 0 = 1 ;
    - R�gle n� 4 : 0 - 1 = 1 avec retenue.
    
    Ex:
    
     10001 (17)
   - 00101 (5)  
   -------
    = 1100 (12)
    
    Multiplication
    --------------
    
    - 0x0=0
    - 0x1=0
    - 1x0=0
    - 1x1=1
  */
  
  $a = 10001;
  $b = 10110;
  echo "<hr>op�rateurs de bits<hr>";
  var_dump($a & $b); // ET : les bits positionn�s � 1 dans $a ET dans $b sont positionn�s � 1 => 10000 (16)
  var_dump($a | $b); // OU : Les bits positionn�s � 1 dans $a OU $b sont positionn�s � 1  =>10111 (23)
  var_dump($a ^ $b); // OU exclusif => 111  (7)
  var_Dump("1" ^ "1"); // si 2 strings => PHP prend le PREMIER caract�re => ('1' (ascii 49)) ^ ('1' (ascii 49)) = #0 (NULL)
  var_dump(1 ^ 5);  // 001 ^ 101 => 100 == 4
  var_dump(12 ^ 9); //5 (1100 ^ 1001 = 00101)
  var_dump("12" ^ 9); //5!
  var_dump(12 ^ "9"); //5!
  var_dump("12" ^ "9");  // si 2 strings => PHP prend le PREMIER caract�re => ('1' (ascii 49)) ^ ('9' (ascii 57)) = #8
  
  var_dump(4 << 1);  //D�cale les bits de $a, $b fois sur la gauche (chaque d�calage �quivaut � une multiplication par 2).  Ici; vaut 8
  var_dump(0b100 << 0b1); // 8 (autre notation)
  var_dump(4 << 2);   // 16
  var_dump(4 >> 1);  //2: D�calage les bits de $a, $b fois par la droite (chaque d�calage �quivaut � une division par 2). 
  var_dump(0b110 >> 0b1);  // 0b110 == 6 et 0b1 == 1 =>3
  var_dump(5 >> 1);  //2!
  
  /*
    Inversion de bits:
    ------------------
    
    Le r�sultat est la n�gation du nombre auquel on soustrait 1. Ex: 2 => -3, 3 => -4, -5 => 4, etc
    Ex 1: 5 (101) => 0101 => 1010. Le premier bit est 1 == n�gatif => inverser � nouveau et ajouter 1 => 0101 + 1 = 0110 = -6
    Ex 2: -5 => 0101 => 1010 + 1 = 1011. On inverse => 0100 = 4
  */
  echo "<hr>inversion de bits:<hr>";  
  var_Dump(~5);  //-6
 //var_dump(decbin(-6));   //1111111111111111111111111111010
  var_dump(~-5);  //4
  var_dump(decbin(-5));   //11111111111111111111111111111011

	/*
		Affectations
		------------
	*/
	echo "<hr>affectations<hr>";
	$a = ($b = 4) + 5;
	var_dump($a, $b);  // $a = 9 et $b = 4
	$a = 1;
	$a +=1;
	var_dump($a);  //2
	
	$a = 10;
	var_dump($a/=2);	//5
  $a=13;
  var_dump($a&=8);  // vaut 8: 13 (1101) & 8 (1000) = 1000 (les bits positionn�s � 1 dans $a ET dans $b sont positionn�s � 1)
  var_dump($a|=13); // vaut 13 (Les bits positionn�s � 1 dans $a OU $b sont positionn�s � 1)
	var_dump($a^=8);  // vaut 5 (ou exclusif)
	
	//pr�-incr�mentation:
	$a = 5;
	var_dump(++$a);  //6
	//post-incr�mentation:
	var_dump($a++);  //tjs 6
	var_dump($a);  // vaut 7 
	
	echo "<hr>concat�nations<hr>";
	$a = 5;
	$a .= " gaufres<br>";
	echo $a; //"5 gaufres"
	$a = "Null = ";  //"Null = "
	$a .= null;
	echo $a."<br>";
	$a = "mon tableau = ";
	//$a .= array(1,2,3);
	//var_dump($a);  //'mon tableau = Array' MAIS Notice: Array to string conversion
	
	/*
		Comparaisons
		------------
	*/
	echo "<hr>Comparaisons<hr>";
	var_dump(true == 1); //true
	var_Dump(true == 0); // false
	var_dump(true == -1); //true
	var_dump(true == '0'); // false
	var_dump(true == '-1'); //true
	var_Dump(true == null); //false
	var_Dump(true == array()); // false
	var_dump(true == 'test');  //true
	var_dump(true == ''); // false
	var_dump("123" == 123); //true
	var_dump("2abc" == 2);  // true car "2abc" est cast� en int => 2
	var_dump("abc2" == 0);  // true car "abc2" est cast� en int => 0
	var_dump(null == 0); // true
	var_dump(null == ''); //true
	var_dump(null == 'test');  //false (null est converti en cha�ne vide)
	var_dump(array() == null);  //true
	var_dump(array() == false);  //true
	var_dump(array() == 0);  // FALSE !
	var_dump(0 == ''); //true;
	var_dump(false == '0');  //true
	var_dump(false == 'test'); //false
		var_dump("1" == "01"); // 1 == 1 -> true
	var_dump("5" == "101"); // 5 != 101 -> false
	var_dump(0b101 == 5);  // 0b101 repr�sente 5 en �criture binaire => true
	var_dump(10 == 1e1);  //true
	var_dump(100 == '1e2');  //true
	
	/*
		Op�rateurs de tableaux
		----------------------	
	*/
	echo "<hr>Op�rateurs de tableaux<hr>";
	$t = array(1,2,3) + array(4,5,6,7,8,9);  //L'op�rateur + retourne le tableau de gauche auquel sont ajout�s les �l�ments du tableau de droite.
	var_dump($t); //array (0 => 1, 1 => 2, 2 => 3, 3 => 7, 4 => 8, 5 => 9)
	$a = array("a" => "pomme", "b" => "banane");
	$b = array("a" =>"poire", "b" => "fraise", "c" => "cerise");
	var_dump($a+$b);  //array('a' => 'pomme', 'b' => 'banane', 'c' => 'cerise' )
	
	$c = array(0 => "kiwi", 1 => "mangue", 2 => "ananas", 'a' => 'p�che', 'b' => 'abricot');
	/*
		Pour les cl�s pr�sentes dans les 2 tableaux, les �l�ments du tableau de gauche seront utilis�s alors que les �l�ments correspondants dans le tableau de droite seront ignor�s.
		Ex: $a = array("a" => "pomme", "b" => "banane") et $c = array(0 => "kiwi", 1 => "mangue", 2 => "ananas", 'a' => 'p�che', 'b' => 'abricot'):
		$a+$c => array (
			  'a' => 'pomme'
			  'b' => 'banane'
			   0  => 'kiwi'
			   1  => 'mangue'
			   2 	=> 'ananas'
		   )
  */
	var_dump($a+$c);
	var_dump($c+$a);  //array(0 => "kiwi", 1 => "mangue", 2 => "ananas", 'a' => 'p�che', 'b' => 'abricot'); 
	
	echo "�galit�s:<br>";
	// $a == $b 	Egalit� =>	TRUE si $a et $b contiennent les m�mes paires cl�s/valeurs.
	// $a === $b 	Identique =>	TRUE si $a et $b contiennent les m�mes paires cl�s/valeurs dans le m�me ordre et du m�me type.
	
	$a = array('a' => 'pierre', 0 => 'bois');
	$b = array(0 => 'bois', 'a' => 'pierre');
	var_dump($a == $b);  // true
	var_dump($a === $b);  // false
	$b = array('a' => 'pierre', 0 => 'bois');
	var_dump($a === $b);  // true
	$a = array('a' => 10, 'b' => 20);
	$b = array('a' => '10', 'b' => 20);
	var_dump($a == $b);  //true
	var_dump($a === $b);  // false car '10' non identique � 10!
	var_dump($a != $b);  //false
	var_dump($a <> $b);  //false
	var_dump($a !== $b); //true
	$a = array(0 => 'pierre', 1 => 'bois');
	$b = array('0' => 'pierre', '1' => 'bois');	
	var_dump($a === $b);  //true! m�me si les cl�s sont des entiers entre quotes!
	
	/*
		Op�rateurs logiques
		-------------------	
	*/
	
	echo "<hr>Op�rateurs logiques<hr>";
	
	$e = false || true;
	var_dump($e);	//true: Agit comme : $e = (false || true)
	$e = false or true;
	var_dump($e);	//false: Agit comme : ($e = false) or true
	$e = true && false; // false
	$f = true and false; // true
	var_dump($e, $f);
	var_dump(true xor true);  // false: TRUE si $a OU $b est TRUE, mais pas les deux en m�me temps. 
	var_dump(true xor false);  //true
	$f = false xor true;
	var_dump($f); //false: Agit comme : ($f = false) xor true
  
  
  /*
    Pr�c�dence des op�rateurs:
    
    ++ -- (increment/decrement)
    (int) (float) (string) (array) (object) (bool) (casting)
    ! (not)
    * / % (arithmetic)
    + - . (arithmetic)
    < <= > >= <> (comparison)
    == != === !== (comparison)
    && (and)
    || (or)
    = += -= *= /= .= %= (assignment)
    and
    xor
    or
  */
	
	/*
		Op�rateur d'ex�cution
		---------------------
		
		guillemets obliques => HP essaie d'ex�cuter le contenu de ces guillemets obliques comme une commande shell.
		Utiliser les guillemets obliques revient � utiliser la fonction shell_exec()
	*/
	echo "<hr>Op�rateurs d'ex�cution<hr>";
	$output = `dir`;
	echo "<pre>$output</pre>";
	
	/*
		Structures de langage
		---------------------
	*/
	echo "<hr>structures de langage<hr>";
	echo 5 . " gaufres<br>"; //"5 gaufres"
	echo 4+2 . " chaises<br>"; //"6 chaises"
	//echo "tableau = " . array(1,2,3);  // "tableau = Array" mais g�n�re une notice: Array to string conversion 
	echo ("ma chaine entre parenth�ses<br>");  // on peut mettre les ()
	echo "mon", "vieux", "tonton", "marcel", "<br>";  // "monvieuxtontonmarcel" - Attantion! Ne pas utiliser les () dans ce cas-ci
	//$str = echo "ma string";  //fatal
	$str = print("ma string");  //fonctionne - les () ne sont pas obligatoires
	var_dump($str);  // print est une structure de langage et retourne tjs 1!
?>
