<?php
/*
	Dbles quotes 
	=> les var sont parsées et remplacées par leur valeur
	=> on peut y inclure des car. spéciaux en les échappant 
*/

$toto = "world";

echo "Hello, $toto <br>";	// affiche "Hello, world"
echo 'Hello, $toto <br>';	// affiche "Hello, $toto"

echo "<pre>Hi\tthere!</pre>";	// affiche "Hi	there!"
echo '<pre>Hi\tthere!</pre>';	// affiche "Hi\tthere!"

echo "Hello, \$toto <br>";	// affiche "Hello, $toto"	(le $ est échappé)


$favoriteAnimal = "chat";

echo "Mon animal préféré est le {$favoriteAnimal} <br>";	// affiche: Mon animal préféré est le chat 
echo "Mon animal préféré est le ${favoriteAnimal} <br>";	// pareil

$tab['age'] = 37;
echo "J'ai " . $tab['age'] . " ans<br>";	// J'ai 37 ans
echo "J'ai {$tab['age']} ans<br>";				// J'ai 37 ans
//echo "J'ai $tab['age'] ans<br>";	// Parse error


/*
 HEREDOC Syntax: autre façon de délimiter une chaine de car.
 Commence par <<< suivi d'un identifant et se termine par cet identifiant (nouvel ligne). Cet identifiant est arbitraire. Doit commencer par une lettre ou un underscore.
 Attention! L'identifiant de fin ne doit pas être indenté et il ne peut y avoir d'espace ou de tab avant le ";"
 NOWDOC est identique, mais les variables ne sont pas parsées. Attention, le délimiteur doit être entouré de guillemets simples.
*/

$str = <<<EOD
Exemple de chaîne
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
Exemple de chaîne
sur plusieurs lignes
en utilisant la syntaxe Nowdoc.
EOD;





