<?php
/**
 * @version SVN: $Id: mod_#module#.php 96 2011-08-11 06:59:32Z michel $
 * @package    Instagram
 * @subpackage Base
 * @author     Daniel Eliasson Stilero Webdesign
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die('Restricted access'); // no direct access

require_once (dirname(__FILE__).DS.'helper.php');
define('MODULEURI', JURI::root().'modules/mod_instagram/');
$modulePath = JURI::root(true).DS.'modules'.DS.'mod_instagram'.DS;
$Instagram = modInstagramHelper::getInstagramObject($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_instagram','default');
?>