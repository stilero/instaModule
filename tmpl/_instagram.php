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
$imageThumbSize = $params->get('image_thumb_size', '150') > 150 ? 150 : $params->get('image_thumb_size', '150');
?>
<a class="instalink" href="<?php echo $image['link'];?>" title="<?php echo $image['caption'] ?>" target="_blank"><img src="<?php echo $image['thumb'] ?>" alt="image1" height="<?php echo $imageThumbSize; ?>" width="<?php echo $imageThumbSize; ?>" /></a>
