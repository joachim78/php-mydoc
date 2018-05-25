<?php
   /*
     XML:
     - Extensive Markup Language
     - format structur� de donn�es pour les �changes sur le web
     - supporte trois types de jeux de caract�res diff�rents, disponibles aussi sous PHP : US-ASCII, ISO-8859-1 et UTF-8
   */
   
  function charHandler($parser, $data)
  {
    echo utf8_decode($data);
  }
   
   $xmlParser = xml_parser_create();  //Cr�ation d'un analyseur XML (parser)
  
  xml_set_character_data_handler($xmlParser, "charHandler");  //Affecte les gestionnaires de texte litt�ral - retourne TRUE en cas de succ�s ou FALSE si une erreur survient. 
  $handler = fopen("ex1.xml", "r");
  while ($data = fread($handler, filesize("ex1.xml"))) {
     xml_parse($xmlParser, $data);  ////Retourne 1 en cas de succ�s ou 0 en cas d'�chec
  }
  
  xml_parser_free($xmlParser); //D�truit un analyseur XML
  
  
  
  // --------------------------------------------------------------------------------------------------------------------------
  
  /*
      La fonction start_element_handler doit accepter trois param�tres : 
      - Le premier param�tre, parser, est une r�f�rence sur l'analyseur XML qui appelle cette fonction
      - Le deuxi�me param�tre, $elementName, contient le nom de l'�l�ment qui a provoqu� l'appel du gestionnaire. Si l'analyseur g�re la casse, cet �l�ment sera en majuscules. 
      - Le troisi�me param�tre, $elementAttrs, contient un tableau associatif avec les attributs de l'�l�ment (s'il en existe). 
        Les cl�s de ce tableau seront les noms des attributs, et les valeurs seront les valeurs correspondantes des attributs. 
  */
  function start_element_handler($parser, $elementName, $elementAttrs) {
    switch ($elementName) {
      case 'NOM' : 
        echo 'Nom: ';
        break;
      case 'PRENOM' : 
        echo 'Pr�nom: ';
        break;
      case 'AGE' : 
        echo 'Age: ';
        break;        
    }
  }
  /*
    La fonction endelementhandler doit accepter deux param�tres : 
    - Le premier param�tre, parser, est une r�f�rence sur l'analyseur XML qui appelle cette fonction. 
    - Le second param�tre, name, contient le nom de l'�l�ment qui a provoqu� l'appel du gestionnaire. Si l'analyseur g�re la casse, cet �l�ment sera en majuscules. 
  */
  function end_element_handler($parser, $elementName) {
    echo "<br>";
  }
  
  $xmlParser = xml_parser_create();
  xml_set_element_handler($xmlParser, "start_element_handler", "end_element_handler");  //Affecte les gestionnaires de d�but et de fin de balise XML
  xml_set_character_data_handler($xmlParser, "charHandler");
  $handler = fopen("ex1.xml", "r");
  while ($data = fread($handler, filesize("ex1.xml"))) {
     xml_parse($xmlParser, $data);  ////Retourne 1 en cas de succ�s ou 0 en cas d'�chec
  }  
  
   xml_parser_free($xmlParser); //D�truit un analyseur XML
   
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
      xml_parse($this->parser, $data);  ////Retourne 1 en cas de succ�s ou 0 en cas d'�chec
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
        echo 'Pr�nom: ';
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
