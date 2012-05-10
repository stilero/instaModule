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
$item = modInstagramHelper::getItem($params);
$instagram = modInstagramHelper::connectToInstagram($params);
$images = $instagram->recentUserImages();
require(JModuleHelper::getLayoutPath('mod_instagram'));
//require_once ('helper.php');

?>