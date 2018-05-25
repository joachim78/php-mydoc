<?php
echo "<h1>SplObjectStorage</h1>";

/**
 * SplObjectStorage est un conteneur itératif d'objets. Son avantage est qu'il s'occupe de stocker et de retrouver un objet, sans que l'on ait besoin de s'occuper de cela.
 * Lorsqu'un objet contient des instances d'autres objets, SplObjectStorage est l'endroit idéal pour les stocker.
 * Plus simple qu'un tableau ou un ArrayObject, ce support de stockage s'occupe notament d'éviter de stocker 2 mêmes instances, et leur suppression est très simple
 */

class Personne {
    public $nom;
    public $prenom;
    public $age;

    public function __construct($nom, $prenom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }
}

$p1 = new Personne("Deneumostier", "Alexis", 4);
$p2 = new Personne("Deneumostier", "Joachim", 39);
$p3 = new Personne("Martin", "Valérie", 40);

$s = new SplObjectStorage();
$s->attach($p1);
$s->attach($p2);
$s->attach($p3);
// on peut ajouter des données arbitraires à un objet:
$s->attach($p3,  ['sexe' => 'f']); // Il n'est pas possible d'ajouter plusieurs fois la même instance; celle-ci écrasera la première "p3"
//$s->attach([1,5,6]); // on ne peut attacher que des objets, ceci générera un warning

echo "<pre>" . print_r($s, true) . "</pre>";

var_dump($s->count()); // 3

$s->rewind();
while ($s->valid()) {
    var_dump($s->current());
    $s->next();
}

$s2 = new SplObjectStorage();
$s2->unserialize($s->serialize()); // => $s2 est identique à $s

echo "<hr>";

echo "<h1>SplFixedArray</h1>";

/**
 * SplFixedArray permet d'utiliser un objet comme un tableau, mais avec les restrictions suivantes: la taille est fixée et les clés doivent être numériques.
 * L'avantage est alors qu'il est plus rapide que les tableaux (si on n'a pas besoin de clés litérales).
 */

try {
    $fa = new SplFixedArray(4);
    $fa[0] = 'toto'; // il faut définir les indices et non utiliser $fa[] = ... sinon erreur
    $fa[1] = 'titi';
    //$fa[2] = 'tata';
    $fa[3] = 'tutu';
    var_dump($fa);
} catch (\Exception $e) {
    echo $e->getMessage();
}

echo "<hr>";
echo "<h1>SplStack</h1>";

/**
 * Implémentation de la pile en PHP
 * Pile = structure fondamentale dans laquelle les éléments s'empilent et se dépilent "par le haut":
 * on ne peut à un moment donné qu'accéder à l'élément sur le dessus, on parle alors de LIFO (Last In First Out).
 */

$s = new SplStack();
$s[] = "toto";
$s[] = "titi";
$s[] = "tata";
$s->unshift("albert"); // ajoute un élément en début de liste (en bas de la pile)
$s->push("foo");
foreach ($s as $val) {
    echo $val . "/"; // foo/tata/titi/toto/albert
}
$elem = $s->pop(); // Dépile et retourne le dernier élément de la liste
echo $elem; // foo

echo "<hr>";
echo "<h1>SplQueue</h1>";

/**
 * implémentation de la file en PHP
 * les éléments se tassent "par le haut": on ne peut à un moment donner qu'accéder à l'élément le plus bas,
 * on parle alors de FIFO (First In First Out). Tout comme une file d'attente.
 */

$s = new SplQueue();
$s[] = "toto";
$s[] = "titi";
$s[] = "tata";
$s->push('foo');

foreach ($s as $val) {
    echo $val . "/"; // toto/titi/tata/foo
}
$elem = $s->shift(); // toto
echo "<br>"  . $elem;