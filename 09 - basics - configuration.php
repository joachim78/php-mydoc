<?php
   /*
     php.ini
     
     - allow_url_fopen (default = 1): PHP_INI_SYSTEM
     - display_errors:  détermine si les erreurs doivent être affichées à l'écran ou non. - PHP_INI_ALL
     - magic_quotes_gpc: supprimé depuis PHP 5.4 -  Lorsque magic_quotes est activé, tous les caractères ' (guillemets simples), " (guillemets doubles), \ (antislash) et NUL sont échappés avec un antislash.
     - max_file_uploads: Le nombre maximum de fichiers pouvant être envoyés simultanément. Ex: 20  - PHP_INI_SYSTEM
     - post_max_size: Définit la taille maximale des données reçues par la méthode POST. Ex: 3M - PHP_INI_PERDIR
     - upload_max_filesize: La taille maximale en octets d'un fichier à charger. Ex: 64M - PHP_INI_PERDIR  
     - register_globals: supprimé depuis PHP 5.4
     - register_argc_argv: déclarer ou non les variables argv et argc (qui contiendront les informations GET) - PHP_INI_PERDIR
     - register_long_arrays: Dit à PHP si oui ou non il doit enregistrer les types obsolètes $HTTP_*_VARS comme variables pré-définies (ex: $HTTP_POST_VARS)  - PHP_INI_PERDIR
     - safe_mode: SUPPRIMEE depuis PHP 5.4.0
     - short_open_tag: Définit si les balises courtes d'ouverture de PHP sont autorisées ou non. - PHP_INI_PERDIR
     - asp_tags: Active l'utilisation des balises ASP (<% %>) - PHP_INI_PERDIR
     - track_errors: Si cette option est activée, le dernier message d'erreur sera placé dans la variable $php_errormsg  - PHP_INI_ALL
     
     
     Mode 	        Signification
    PHP_INI_USER 	  La directive peut être modifiée dans un script utilisateur, avec la fonction ini_set(), ou via la base de registre Windows. Depuis PHP 5.3, l'entrée peut être définie dans .user.ini.
    PHP_INI_PERDIR 	La directive peut être modifiée dans les fichiers php.ini, .htaccess httpd.conf ou .user.ini (depuis PHP 5.3).
    PHP_INI_SYSTEM 	La directive peut être modifiée dans les fichiers php.ini ou httpd.conf
    PHP_INI_ALL 	  La directive peut être modifiée n'importe où
    
    ini_get(): Une directive de configuration ayant la valeur de off sera retourné sous la forme d'une chaîne vide ou "0" alors que la valeur on retournera "1". 
                Cette fonction peut également retourner la valeur littérale du fichier INI. 
                
    ini_set(param, value): retourne l'ancienne valeur en cas succès, sinon FALSE.
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
