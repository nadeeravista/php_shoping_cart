<?Php
/**
 * Represents the consolidatino of the entire shoping cart solution
 * @author Nadeera
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

include "./config.php";

require_once realpath("vendor/autoload.php");

/**
 * This is a vanilla php app, thus the actions.php is the global route file and controller 
 */
include_once('./actions.php');

/**
 * This app has only a simple action route and one view, thus it is including directly rather 
 * render using a response class
 */
include_once('./view.php');
?>

