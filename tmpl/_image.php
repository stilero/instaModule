<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//No direct access
defined('_JEXEC) or die;');
$document =& JFactory::getDocument();
$document->addScript($modulePath.'js'.DS.'imageloader.js');
?>
<a class="instaimage" href="<?php echo $image['full'];?>" title="<?php echo $image['caption'] ?>"><img src="<?php echo $image['thumb'] ?>" alt="image1" height="150" width="150" /></a>
