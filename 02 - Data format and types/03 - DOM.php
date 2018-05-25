<?php
  $dom = new DOMDocument();
  $dom->load('ex2.xml');
  $personnes = $dom->getElementsByTagName('personne');
  var_dump($personnes->length); //4
  foreach ($personnes as $personne) {
    echo "Personne #" . $personne->getAttribute('id') . "<br>";  // valeur de l'attribut id 
    $nodeToAdd = $dom->createElement('zip', rand(1000, 5000));
    $personne->appendChild($nodeToAdd);    
    //var_dump($personne->hasChildNodes()); //true
    foreach ($personne->childNodes as $node) {
      if ($node->nodeType == XML_ELEMENT_NODE) {  // 1 = XML_ELEMENT_NODE = DOMElement, 2 = XML_ATTRIBUTE_NODE = DOMAttr, 3 = XML_TEXT_NODE = DOMText
         echo $node->nodeName .' = '. utf8_decode($node->nodeValue) . "<br>";
      }
    }
  }
  
  $newPersonne = $dom->createElement('personne');
  $newPersonne->setAttribute('id', 500);
  $newPersonne->appendChild($dom->createElement('nom', 'Moore'));
  $newPersonne->appendChild($dom->createElement('prenom', 'Roger'));
  $newPersonne->appendChild($dom->createElement('age', '80'));
  $dom->firstChild->appendChild($newPersonne);
  echo $dom->saveXML();
  //$dom->save('ex2.xml'); 
?>
