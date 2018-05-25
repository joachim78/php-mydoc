<?php
   /*
     XML:
     - Extensive Markup Language
     - format structuré de données pour les échanges sur le web
     - supporte trois types de jeux de caractères différents, disponibles aussi sous PHP : US-ASCII, ISO-8859-1 et UTF-8
   */
   
  function charHandler($parser, $data)
  {
    echo utf8_decode($data);
  }
   
   $xmlParser = xml_parser_create();  //Création d'un analyseur XML (parser)
  
  xml_set_character_data_handler($xmlParser, "charHandler");  //Affecte les gestionnaires de texte littéral - retourne TRUE en cas de succès ou FALSE si une erreur survient. 
  $handler = fopen("ex1.xml", "r");
  while ($data = fread($handler, filesize("ex1.xml"))) {
     xml_parse($xmlParser, $data);  ////Retourne 1 en cas de succès ou 0 en cas d'échec
  }
  
  xml_parser_free($xmlParser); //Détruit un analyseur XML
  
  
  
  // --------------------------------------------------------------------------------------------------------------------------
  
  /*
      La fonction start_element_handler doit accepter trois paramètres : 
      - Le premier paramètre, parser, est une référence sur l'analyseur XML qui appelle cette fonction
      - Le deuxième paramètre, $elementName, contient le nom de l'élément qui a provoqué l'appel du gestionnaire. Si l'analyseur gère la casse, cet élément sera en majuscules. 
      - Le troisième paramètre, $elementAttrs, contient un tableau associatif avec les attributs de l'élément (s'il en existe). 
        Les clés de ce tableau seront les noms des attributs, et les valeurs seront les valeurs correspondantes des attributs. 
  */
  function start_element_handler($parser, $elementName, $elementAttrs) {
    switch ($elementName) {
      case 'NOM' : 
        echo 'Nom: ';
        break;
      case 'PRENOM' : 
        echo 'Prénom: ';
        break;
      case 'AGE' : 
        echo 'Age: ';
        break;        
    }
  }
  /*
    La fonction endelementhandler doit accepter deux paramètres : 
    - Le premier paramètre, parser, est une référence sur l'analyseur XML qui appelle cette fonction. 
    - Le second paramètre, name, contient le nom de l'élément qui a provoqué l'appel du gestionnaire. Si l'analyseur gère la casse, cet élément sera en majuscules. 
  */
  function end_element_handler($parser, $elementName) {
    echo "<br>";
  }
  
  $xmlParser = xml_parser_create();
  xml_set_element_handler($xmlParser, "start_element_handler", "end_element_handler");  //Affecte les gestionnaires de début et de fin de balise XML
  xml_set_character_data_handler($xmlParser, "charHandler");
  $handler = fopen("ex1.xml", "r");
  while ($data = fread($handler, filesize("ex1.xml"))) {
     xml_parse($xmlParser, $data);  ////Retourne 1 en cas de succès ou 0 en cas d'échec
  }  
  
   xml_parser_free($xmlParser); //Détruit un analyseur XML
   
// --------------------------------------------------------------------------------------------------------------------------
 echo "<hr>";
class XmlParser {
  private $parser;
  
  public function __construct() {
     $this->parser = xml_parser_create_ns();
     xml_set_object($this->parser, $this);  //Configure un objet comme analyseur XML
     xml_set_element_handler($this->parser, "startElementHandler", "endElementHandler");
     xml_set_character_data_handler($this->parser, "dataHandler"); 
  }
  
  public function parse($xmlFile) {
    $handler = fopen($xmlFile, "r");
    while ($data = fread($handler, filesize($xmlFile))) {
      xml_parse($this->parser, $data);  ////Retourne 1 en cas de succès ou 0 en cas d'échec
    } 
  }
  public function closeParser() {
      xml_parser_free($this->parser);
  }

  private function startElementHandler($parser, $elementName, $elementAttrs) {
    if (!empty($elementAttrs)) var_dump($elementAttrs);
    switch ($elementName) {
      case 'PERSONNE':
        echo 'Personne #' . $elementAttrs['ID'] . '<br>';
      case 'NOM' : 
        echo 'Nom: ';
        break;
      case 'PRENOM' : 
        echo 'Prénom: ';
        break;
      case 'AGE' : 
        echo 'Age: ';
        break;        
    }
  }
  private function endElementHandler($parser, $elementName) {
    echo "<br>";
  }
  private function dataHandler($parser, $data)
  {
    echo utf8_decode($data);
  }  
}   
   
$xmlParser = new XmlParser(); 
$xmlParser->parse("ex1.xml"); 
$xmlParser->closeParser(); 
   
?>
