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
$imageThumbSize = $params->get('image_thumb_size', '150') > 600 ? 600 : $params->get('image_thumb_size', '150');
$thumbImage = $params->get('image_thumb_size', '150') > 150 ? $image['full'] : $image['thumb'];
?>
<a class="instaimage" href="<?php echo $image['full'];?>" title="<?php echo $image['caption'] ?>" ><img src="<?php echo $thumbImage ?>" alt="image1" height="<?php echo $imageThumbSize; ?>" width="<?php echo $imageThumbSize; ?>" /></a>
