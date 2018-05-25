<?php
/*
	Dbles quotes 
	=> les var sont pars�es et remplac�es par leur valeur
	=> on peut y inclure des car. sp�ciaux en les �chappant 
*/

$toto = "world";

echo "Hello, $toto <br>";	// affiche "Hello, world"
echo 'Hello, $toto <br>';	// affiche "Hello, $toto"

echo "<pre>Hi\tthere!</pre>";	// affiche "Hi	there!"
echo '<pre>Hi\tthere!</pre>';	// affiche "Hi\tthere!"

echo "Hello, \$toto <br>";	// affiche "Hello, $toto"	(le $ est �chapp�)


$favoriteAnimal = "chat";

echo "Mon animal pr�f�r� est le {$favoriteAnimal} <br>";	// affiche: Mon animal pr�f�r� est le chat 
echo "Mon animal pr�f�r� est le ${favoriteAnimal} <br>";	// pareil

$tab['age'] = 37;
echo "J'ai " . $tab['age'] . " ans<br>";	// J'ai 37 ans
echo "J'ai {$tab['age']} ans<br>";				// J'ai 37 ans
//echo "J'ai $tab['age'] ans<br>";	// Parse error


/*
 HEREDOC Syntax: autre fa�on de d�limiter une chaine de car.
 Commence par <<< suivi d'un identifant et se termine par cet identifiant (nouvel ligne). Cet identifiant est arbitraire. Doit commencer par une lettre ou un underscore.
 Attention! L'identifiant de fin ne doit pas �tre indent� et il ne peut y avoir d'espace ou de tab avant le ";"
 NOWDOC est identique, mais les variables ne sont pas pars�es. Attention, le d�limiteur doit �tre entour� de guillemets simples.
*/

$str = <<<EOD
Exemple de cha�ne
sur plusieurs lignes
en utilisant la syntaxe Heredoc.
EOD;
var_dump($str);

$nom = 'Alexis';
$age = 2;

// affiche: Mon nom est "Alexis". J'ai 2 ans.
echo <<<EOT
Mon nom est "$nom". J'ai $age ans.
EOT;

echo "<br>";

// l'identifiant est arbitraire:
echo <<<PLOP
Mon nom est "$nom". J'ai $age ans.
PLOP;

echo "<br>";

// Ex de syntaxe NOWDOC:

echo <<<'EOD'
Exemple de cha�ne
sur plusieurs lignes
en utilisant la syntaxe Nowdoc.
EOD;





