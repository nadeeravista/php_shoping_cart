<?Php
/**
 * Represents the consolidatino of the entire shoping cart solution
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */


 /**
  * This header secure the application from XSS attacks
  */
header( "Set-Cookie: name=value; httpOnly" );

require_once realpath("vendor/autoload.php");

/**
 * Setting initial php settings
 */
include_once('./config.php');

/**
 * This is a vanilla php app, thus the actions.php is acting as the global route file and the controller 
 */
include_once('./actions.php');
?>

