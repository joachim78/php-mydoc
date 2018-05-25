<?php
declare(strict_types = 1);
include_once("Toto.php");

try {
    $t = new \Toto();
    echo $t->plop("2");
} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage();
} catch (\TypeError $e) {
    echo "Type error: " . $e->getMessage();
} finally {
    echo "<br>Fin du try...catch";
}
