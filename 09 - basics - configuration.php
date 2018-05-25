<?php
   /*
     php.ini
     
     - allow_url_fopen (default = 1): PHP_INI_SYSTEM
     - display_errors:  d�termine si les erreurs doivent �tre affich�es � l'�cran ou non. - PHP_INI_ALL
     - magic_quotes_gpc: supprim� depuis PHP 5.4 -  Lorsque magic_quotes est activ�, tous les caract�res ' (guillemets simples), " (guillemets doubles), \ (antislash) et NUL sont �chapp�s avec un antislash.
     - max_file_uploads: Le nombre maximum de fichiers pouvant �tre envoy�s simultan�ment. Ex: 20  - PHP_INI_SYSTEM
     - post_max_size: D�finit la taille maximale des donn�es re�ues par la m�thode POST. Ex: 3M - PHP_INI_PERDIR
     - upload_max_filesize: La taille maximale en octets d'un fichier � charger. Ex: 64M - PHP_INI_PERDIR  
     - register_globals: supprim� depuis PHP 5.4
     - register_argc_argv: d�clarer ou non les variables argv et argc (qui contiendront les informations GET) - PHP_INI_PERDIR
     - register_long_arrays: Dit � PHP si oui ou non il doit enregistrer les types obsol�tes $HTTP_*_VARS comme variables pr�-d�finies (ex: $HTTP_POST_VARS)  - PHP_INI_PERDIR
     - safe_mode: SUPPRIMEE depuis PHP 5.4.0
     - short_open_tag: D�finit si les balises courtes d'ouverture de PHP sont autoris�es ou non. - PHP_INI_PERDIR
     - asp_tags: Active l'utilisation des balises ASP (<% %>) - PHP_INI_PERDIR
     - track_errors: Si cette option est activ�e, le dernier message d'erreur sera plac� dans la variable $php_errormsg  - PHP_INI_ALL
     
     
     Mode 	        Signification
    PHP_INI_USER 	  La directive peut �tre modifi�e dans un script utilisateur, avec la fonction ini_set(), ou via la base de registre Windows. Depuis PHP 5.3, l'entr�e peut �tre d�finie dans .user.ini.
    PHP_INI_PERDIR 	La directive peut �tre modifi�e dans les fichiers php.ini, .htaccess httpd.conf ou .user.ini (depuis PHP 5.3).
    PHP_INI_SYSTEM 	La directive peut �tre modifi�e dans les fichiers php.ini ou httpd.conf
    PHP_INI_ALL 	  La directive peut �tre modifi�e n'importe o�
    
    ini_get(): Une directive de configuration ayant la valeur de off sera retourn� sous la forme d'une cha�ne vide ou "0" alors que la valeur on retournera "1". 
                Cette fonction peut �galement retourner la valeur litt�rale du fichier INI. 
                
    ini_set(param, value): retourne l'ancienne valeur en cas succ�s, sinon FALSE.
   */
   
   echo "<hr>php.ini</hr>";
   
   ini_set('max_file_uploads', 10);
   var_dump(ini_get('max_file_uploads')); // affiche 20 car ce param n'est pas modifiable via ini_set
   var_dump(ini_get('short_open_tag')); //  'off dans le php.init => affiche ''
   var_dump(ini_get('display_errors')); //'1'
   var_dump(ini_set('display_errors', 0));  //'1'
   var_dump(ini_get('display_errors')); // '0'
   var_dump(ini_get('fake_param')); // retourne FALSE depuis PHP 5.3 (avant, retournait une chaine vide)
   
?>
