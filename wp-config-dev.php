<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'servindi_blog');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/ servicio de claves secretas de WordPress}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 's3rv1nd1-ak'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 's3rv1nd1-sak'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 's3rv1nd1-lik'); // Cambia esto por tu frase aleatoria.
define('SECRET_KEY', 's3rv1nd1'); // Cambia esto por tu frase aleatoria.

/**#@-*/

// Otras opciones de configuracion
// http://www.anieto2k.com/2008/03/23/wp-configphp-un-fichero-para-gobernarlos-a-todos/
define('WP_SITEURL', 'http://localhost/servindi/');
define('WP_HOME', 'http://localhost/servindi');
define('WP_DEBUG', false); //false para desactivar
//define('WP_MEMORY_LIMIT', '64MB'); //64MB de RAM
define('WP_CACHE', true); //Added by WP-Cache Manager
define('USER_COOKIE', 'wp-servindi-u-cookie'); //Nombre de la cookie de usuario
//define('PASS_COOKIE', 'wordpress_test_cookie'); //Nombre de la cookie de password
define('AUTH_COOKIE', 'wp-servindi-a-cookie');
//define('COOKIEPATH', 'wordpress_test_cookie'); // Path para el que será válida la cookie
//define('SITECOOKIEPATH', 'wordpress_test_cookie'); // Sitio para el que será válida la cookie
//define('COOKIE_DOMAIN', 'wordpress_test_cookie');	 //Dominio para el que será válida la cookie
//define('TEST_COOKIE', 'wordpress_test_cookie'); // Cookie de test
define('SAVEQUERIES', true);

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define ('WPLANG', 'es_PE');

/* No edites desde aquí */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
