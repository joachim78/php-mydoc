<?php

function __autoload($className) {
    if (!file_exists($className . '.php')) {
       throw new Exception ('__autoload: Impossible de trouver la classe ' . $className);
    }
    include $className . '.php';
}
/*
try {
  $obj1  = new MaClasse1();
  $obj2  = new MaClasse2();
  $obj3  = new MaClasse3();
} catch (Exception $e) {
  echo $e->getMessage();
*/

// autoload custom
function myAutoloader($className) {
    if (!file_exists($className . '.php')) {
       //throw new Exception ('myAutoloader: Impossible de trouver la classe ' . $className);
    } else
    include $className . '.php';
}

function myAutoloader2($className) {
    if (!file_exists($className . '.php')) {
       throw new Exception ('myAutoloader2: Impossible de trouver la classe ' . $className);
    }
    include $className . '.php';
}

/*
  bool spl_autoload_register ([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] )
  
  - enregistre une fonction dans la pile __autoload() fournie. Si la pile n'est pas encore active, elle est activée. 
  - throw: spécifie si spl_autoload_register() doit lancer des exceptions lorsque le paramètre autoload_function n'a pu être enregistré.
  - prepend: si ce paramètre vaut TRUE, spl_autoload_register() ajoutera la fonction au début de la pile de l'autoloader au lieu de l'ajouter à la fin de la pile.
*/
spl_autoload_register('myAutoloader');
spl_autoload_register('myAutoloader2');

try {
  $obj1  = new MaClasse1();
  $obj2  = new MaClasse2();
  $obj3  = new MaClasse5();
} catch (Exception $e) {
  echo $e->getMessage();  // myAutoloader: Impossible de trouver la classe MaClasse5
}