<?php
// les variable doivent commencer par $ suivi d'une lettre ou d'un underscore
//$1test = 5;  //Parse error: syntax error, unexpected '1' (T_LNUMBER), expecting variable (T_VARIABLE) or '$' 
$test=1;
$Test=2;
var_dump($test, $Test);	//case-sensitive
$type;
var_dump($type);	//null (Notice: Undefined variable: type)

/*
  - 4 types scalaires: entiers; floats; string; bool
  - 2 types 'compos�s': array; objet
  - 2 types sp�ciaux: NULL, Resource (r�f � une db ou un fichier par ex)

*/
$a=5;  //101
$b=3;  //011
$a^=$b;
var_dump($a);

echo "<hr>boolval() (PHP >= 5.5)<hr>";
/*
var_dump(boolval(42), boolval(array()), boolval('0'), boolval('0.0'), boolval(0.0) );  //true, false, false, true, false
echo "<hr>floatval() (== doubleval())<hr>";
var_dump( floatval(50),floatval('13.45'),floatval('13.45abc'),floatval('abc13.45'),floatval('abc'),floatval([3.79,2]),floatval([]),floatval(new stdClass()) ); //50, 13.45, 13.45, 0, 0, 1, 0, 1
*/
echo "<hr>get_defined_vars<hr>";
/*
  retourne un tableau multidimensionnel contenant la liste de toutes les variables d�finies, qu'elles soient des variables d'environnement, 
  de serveur ou d�finies par l'utilisateur dans la port�e d'appel de la fonction get_defined_vars(). 
*/
$arr = get_defined_vars();
//var_dump($arr);

 echo "<hr>gettype <hr>";
 $nuut;
var_dump(gettype($nuut), gettype(null), gettype([]), gettype(new stdClass()));  //NUUL, NULL, array, object  
var_dump(gettype("18"), is_string("18") );  //string, true
var_dump(gettype(52.69), is_float(52.69), is_double(52.69), is_real(52.69) ); //double, true, true, true
var_dump( gettype(37), is_int(37), is_integer(37), is_long(37) );  //integer, true, true, true
var_dump(gettype(file_get_contents('include/include_vars.php'))); //string
var_dump(gettype(fopen('include/include_vars.php', 'r'))); //resource
var_dump( gettype(function() {} ) );  //object
var_dump( gettype(function() {return true;} ) );  //object
$toto = function() { return 5;};
var_dump( gettype($toto) ); //object
var_dump( gettype($toto()) ); //integer!

 echo "<hr>is_scalar <hr>";
var_dump( is_scalar(5),is_scalar("5"),is_scalar(false),is_scalar(null),is_scalar(array()) ); //true, true, true, false, false

echo "<hr>is_numeric <hr>";
var_dump(5e2);
var_dump( is_numeric("42"), is_numeric(5e2), is_numeric(pow(2,3)), is_numeric(0b101), is_numeric("45a"), is_numeric([1,4,8]) );  //true, true (5e2 = 500), true (2� = 8), true (0b101 = 5), false, false

echo "<hr>settype <hr>";
$toto = "5bar";
settype($toto, "float"); var_dump($toto);	//5
$toto = "bar5";
settype($toto, "int"); var_dump($toto);	//0
settype($toto, "string"); var_dump($toto);	//"0"
settype($toto, "bool");var_dump($toto);	//false
$toto = "0.0";
settype($toto, "bool");var_dump($toto);	//true
$toto = array();
settype($toto, "bool");var_dump($toto);	//false
$toto = array();
settype($toto, "int");var_dump($toto);	//0
$toto = array(1,10,145);
settype($toto, "bool");var_dump($toto);	//true
$toto = array(1,10,145);
settype($toto, "float");var_dump($toto);	//1
$toto = new stdClass();
settype($toto, "bool");var_dump($toto);	//true
$toto = new stdClass();
//settype($toto, "int");var_dump($toto); //Object of class stdClass could not be converted to int
$toto = new stdClass();
settype($toto, "array");var_dump($toto);	//array();
$toto = array('nom' => 'Deneumostier', 'prenom'	=> 'Alexis', 'age'	=> 2);
/*
object(stdClass)[2]
  public 'nom' => string 'Deneumostier' (length=12)
  public 'prenom' => string 'Alexis' (length=6)
  public 'age' => int 2
*/
settype($toto, "object");var_dump($toto);	//objet (stdClass) 
$toto = array("Renault", "Clio", "essence");
/*
stdClass Object
(
    [0] => Renault
    [1] => Clio
    [2] => essence
)
*/
settype($toto, "object");echo "<pre>".print_r($toto,true)."</pre>";
//settype("56","int");	//Fatal error: Only variables can be passed by reference

echo "<hr>intval <hr>";
var_dump(intval('1110', 2));  //14


echo "<hr>strval <hr>";
$toto = "42.56";
var_dump(strval($toto));	//"42.56"
$toto = true;
var_dump(strval($toto));	//"1"
/*
	Vous ne pouvez pas utiliser la fonction strval() avec des tableaux ou des objets qui n'impl�mentent pas la m�thode magique __toString(). 
*/
$toto = array(1,2,3);
//var_dump(strval($toto));	// Notice: Array to string conversion; affiche "Array"
$toto = new stdClass();
$toto->prenom = "Jules";
$toto->nom = "C�sar";
$toto->__toString = function() {echo "to string<br>";};
//var_dump(strval($toto));	//Catchable fatal error: Object of class stdClass could not be converted to string

class Voiture {
	public $marque;
	public $modele;
	
	public function __construct($marque, $modele) {
		$this->marque=$marque;
		$this->modele= $modele;
	}
	public function __toString() {
		return $this->marque." ".$this->modele;	// DOIT retourner une string
	}
}

$v = new Voiture("Lotus","Elan");
var_dump(strval($v));	//'Lotus Elan'

class Plop {
  public $toto1 = '1';
  private $toto2 = '2';
}

$a = (array) new Plop();
echo "<pre>".print_r($a,true)."</pre>";


echo "<hr>Superglobales: <hr>";
/*
  Un tableau associatif contenant les r�f�rences sur toutes les variables globales 
  actuellement d�finies dans le contexte d'ex�cution global du script. 
  Les noms des variables sont les index du tableau. 
*/
//echo "<pre>".print_r( $GLOBALS,true)."</pre>";

/*
  $_SERVER:
  Variables de serveur et d'ex�cution.
  Qques ex:
 
  - 'argv': Tableau des arguments pass�s au script lorsque celui-ci est appel� en ligne de commande
  - 'argc': Contient le nombre de param�tres de la ligne de commande pass�s au script (si le script fonctionne en ligne de commande).  
  - 'DOCUMENT_ROOT': La racine sous laquelle le script courant est ex�cut�, comme d�fini dans la configuration du serveur. Ex: C:/wamp-php5.5/www/
  - 'HTTP_HOST': Contenu de l'en-t�te Host: de la requ�te courante, si elle existe. Ex: localhost 
  - 'HTTP_USER_AGENT': cha�ne qui d�crit le client HTML utilis� pour voir la page courante. Ex: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0
  - 'HTTP_ACCEPT': Contenu de l'en-t�te Accept: de la requ�te courante, s'il y en a une. 
  - 'PHP_SELF' : le nom du fichier du script par rapport � la racine web. Ex: /Certif/03 - basics - variable.php
  - 'QUERY_STRING': La cha�ne de requ�te, si elle existe, qui est utilis�e pour acc�der � la page. Ex: test=5&test2=10
  - 'SCRIPT_NAME' : Contient le nom du script courant. Ex: /Certif/03 - basics - variable.php
   -'SCRIPT_FILENAME': Le chemin absolu vers le fichier contenant le script en cours d'ex�cution. Ex: C:/wamp-php5.5/www/Certif/03 - basics - variable.php. Identique �  __FILE__
  - 'SERVER_ADDR': adresse IP du serveur. Ex: 127.0.0.1
  - 'SERVER_NAME': Le nom du serveur h�te qui ex�cute le script suivant. Si le script est ex�cut� sur un h�te virtuel, ce sera la valeur d�finie pour cet h�te virtuel. Ex: localhost
  - 'SERVER_PORT': Le port de la machine serveur utilis� pour les communications. Par d�faut, c'est "80". En utilisant SSL, par exemple, il sera remplac� par le num�ro de port HTTP s�curis�. 
  - 'SERVER_SOFTWARE': Cha�ne d'identification du serveur, qui est donn�e dans les en-t�tes lors de la r�ponse aux requ�tes. Ex: Apache/2.4.9 (Win32) PHP/5.5.12 
  - 'SERVER_PROTOCOL': Nom et r�vision du protocole de communication. Ex: HTTP/1.1
  - 'REQUEST_METHOD': M�thode de requ�te utilis�e pour acc�der � la page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
  - 'REQUEST_TIME', 'REQUEST_TIME_FLOAT': Le temps Unix du d�but de la requ�te, Le timestamp du d�but de la requ�te, avec une pr�cision � la microseconde. Disponible depuis PHP 5.4.0
  - 'REQUEST_URI': L'URI qui a �t� fourni pour acc�der � cette page. Ex: /Certif/03%20-%20basics%20-%20variable.php?test=5&test2=10
  - 'REMOTE_ADDR': L'adresse IP du client qui demande la page courante. 
  - 'REMOTE_PORT': Le port utilis� par la machine cliente pour communiquer avec le serveur web. Ex:  52576
  - 'REMOTE_USER':  L'utilisateur authentifi�.

  
*/
 echo "<pre>".print_r( $_SERVER,true)."</pre>";
 
 /*
   $_GET, $_POST = superglobales - $HTTP_GET_VARS, $HTTP_POST_VARS: obsol�tes (PAS superglobales)
   $_REQUEST: contient $_GET, $_POST et $_COOKIE
   $_FILES = Variable de t�l�chargement de fichier via HTTP - $HTTP_POST_FILES => obsol�te (PAS superglobales) -> voir chap 10 
   $_SESSION - $HTTP_SESSION_VARS [obsol�te]
   $_ENV: pour qu'elle soit d�finie il faut d�finir le 'E' ds le php.ini. Ex: variables_order = "EGPCS" - $HTTP_ENV_VARS [Obsol�te] : pas superglobale
   $_COOKIE -- $HTTP_COOKIE_VARS [Obsol�te] � Cookies HTTP -> voir chap 10 
   $php_errormsg: le dernier message d'erreur - Cette variable sera uniquement accessible dans le m�me contexte d'ex�cution que celui de la ligne qui a g�n�r� l'erreur, et uniquement si la directive de configuration track_errors est activ�e (elle est d�sactiv�e par d�faut). 
   $HTTP_RAW_POST_DATA: donn�es POST brutes - always_populate_raw_post_data = On dans le php.ini (par d�faut, d�sactiv�). Ex: nom=Deneumostier&prenom=Joachim&age=37&save=save  
   $http_response_header: En-t�tes de r�ponse HTTP ) - similaire � la fonction get_headers().
 */
 
 echo "variable ENV:<pre>".print_r( $_ENV,true)."</pre>";
 // $php_errormsg
 @strpos();  //g�n�re un warning que l'on cache avec l'arobase
 echo '$strpos() => php_errormsg = ' . $php_errormsg . '<br>';  //$strpos() => php_errormsg = strpos() expects at least 2 parameters, 0 given

if (isset($_POST['save'])) {
  echo "<pre>".print_r($HTTP_RAW_POST_DATA, true) ."</pre>";  //nom=Deneumostier&prenom=Alexis&age=2&save=save
  $postdata = file_get_contents("php://input"); //nom=Deneumostier&prenom=Alexis&age=2&save=save
  echo "<pre>".print_r($postdata, true) ."</pre>";
}
 echo "<hr>";
  file_get_contents("http://example.com");
  var_dump($http_response_header);
 
 ?>
 
 <html>
  <div>
    <h1>Test POST</h1>
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nom: <input type="text" name="nom" /><br>
        Pr�nom: <input type="text" name="prenom" /><br>
        Age:  <input type="text" name="age" /><br>
        <input type="submit" name="save" value="save"/>
     </form>
  </div> 
 </html>
 
 






 

